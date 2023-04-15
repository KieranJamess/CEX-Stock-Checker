<?php
// ini_set('max_execution_time', 300);

// $url = $_POST['inputData'];

// // Input variable
// // $url = "https://uk.webuy.com/product-detail/?id=sdv2gare002&categoryName=dvd-kids&superCatName=film-tv&title=garfield-the-movie-%28u%29-2004&referredFrom=search&queryID=336712abc832536d5f44a803165f0737&position=1";

// // Parse the URL to extract the query string
// $queryString = parse_url($url, PHP_URL_QUERY);

// // Parse the query string to extract the individual parameters
// parse_str($queryString, $params);

// // Extract the 'id' parameter from the params array
// $cexSKU = isset($params['id']) ? $params['id'] : null;

// // Output the extracted ID
// echo "ID: " . $cexSKU;

$arr = array(
    array(
        "storeName" => "Harrow",
        "latitude" => 51.582259560888,
        "longitude" => -0.33251152227164,
        "stock" => "1"
    ),
    array(
        "storeName" => "dd",
        "latitude" => 52.582259560888,
        "longitude" => -0.33251152227164,
        "stock" => "1"
    )
);
$arr= json_encode($arr, true);
print_r($arr);
?>