<?php
ini_set('max_execution_time', 300);

$url = $_POST['inputData'];

// Input variable
//$url = "https://uk.webuy.com/product-detail/?id=sdv2gare002&categoryName=dvd-kids&superCatName=film-tv&title=garfield-the-movie-%28u%29-2004&referredFrom=search&queryID=336712abc832536d5f44a803165f0737&position=1";

// Parse the URL to extract the query string
$queryString = parse_url($url, PHP_URL_QUERY);

// Parse the query string to extract the individual parameters
parse_str($queryString, $params);

// Extract the 'id' parameter from the params array
$cexSKU = isset($params['id']) ? $params['id'] : null;

// Endpoint URLs
$storesEndpoint = 'https://wss2.cex.uk.webuy.io/v3/stores';
$nearestStoresEndpoint = 'https://wss2.cex.uk.webuy.io/v3/boxes/' . strtoupper($cexSKU) . '/neareststores';

// Fetch store data from the first endpoint
$storesResponse = file_get_contents($storesEndpoint);

// Check for errors
if ($storesResponse === false) {
    echo 'Error fetching store data: ' . $http_response_header[0];
    exit;
}

// Decode the store data as JSON
$storesData = json_decode($storesResponse, true);

// Loop through each store, and get the stock level for the SKU
$storesWithStock = [];
foreach ($storesData['response']['data']['stores'] as $store) {  
    $nearestStoresUrl = $nearestStoresEndpoint . '?latitude=' . $store['latitude'] . '&longitude=' . $store['longitude'];
    $stockLevelJson = file_get_contents($nearestStoresUrl);
    if (json_decode($stockLevelJson, true)['response']['data']['nearestStores'][0]['storeName'] === $store['storeName']) {
        $stockLevel = json_decode($stockLevelJson, true)['response']['data']['nearestStores'][0]['quantityOnHand'];
        $store['stock'] = $stockLevel;
        if ($stockLevel > 0) {
            unset($store['storeId']);
            unset($store['regionName']);
            unset($store['regionImageUrls']);
            unset($store['phoneNumber']);
            if ($stockLevel === "4+") {
                $store['stock'] = "5";
            }
            array_push($storesWithStock, $store);
        }
    }
}

$storesWithStock = json_encode($storesWithStock, true);
print_r($storesWithStock);

?>

