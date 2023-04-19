# CEX Stock Checker! 

The code for a site to query the CEX API to find stock of a specified product within the CEX infrastructure across the UK.

At the time of writing this, it is hosted on [kdjames.co.uk](https://www.kdjames.co.uk). 

### Using

1. Find the product you want to find through CEX, for example

   ```
   https://uk.webuy.com/product-detail/?id=sdv2gare002&categoryName=dvd-kids&superCatName=film-tv&title=garfield-the-movie-%28u%29-2004&referredFrom=search&queryID=336712abc832536d5f44a803165f0737&position=1
   ```

2. Paste this URL into the site to and submit

3. Get a UK map output of all the CEX stores that have stock of this item!

### Demo

See below for a GIF of the site being used, showing the statistic output, marker creation and heatmap.

![garfield-gif](https://github.com/KieranJamess/CEX-Stock-Checker/blob/master/demo.gif)

### Limitations

- Currently the CEX API has blocked my home IP (ha) so it could happen to where I'm hosting the site. 
- CEX API returns a number of '4+' if the store has 5 or more of those items. There isn't a way for us to get further confirmation of more stock than 5.