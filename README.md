# Simple PHP Tiktok scraper API
This library is a Guzzle-based wrapper around RapidAPI solution which scrapes Tiktok.

Get your access key here:
https://rapidapi.com/restyler/api/tiktok12

See /examples folder for examples

## Installation
```
composer require restyler/tiktok-simple-scraper
```

## Quick example:
### getUserInfo(): Get user info by username
```php
use TiktokScraper\Client;

$tiktokClient = new Client([
        'rapidapi_key' => 'YOUR-RAPID-API_KEY'
    ]
);

$response = $tiktokClient->getUserInfo([
    'username' => 'realmadrid',
    // 'second-proxy' => true,  - use fallback proxy in case you see weird errors like 404 for existing accounts. Every method supports this.
]);

print_r($response);
// response now contains array of user info.
```


### getUserFeed(): Get user feed by username
```php
use TiktokScraper\Client;

$tiktokClient = new Client([
        'rapidapi_key' => 'YOUR-RAPID-API_KEY'
    ]
);

$response = $tiktokClient->getUserFeed([
    'username' => 'realmadrid',
    'limit' => '10'
]);

print_r($response);
// response now contains array of user feed items.

```


### getVideoInfo(): Get video info by video url
```php
use TiktokScraper\Client;
$tiktokClient = new Client([
        'rapidapi_key' => 'YOUR-RAPID-API_KEY'
    ]
);
$response = $tiktokClient->getVideoInfo([
    'url' => 'https://www.tiktok.com/@tuzelitydance/video/6867065857240026369?sender_device=pc&sender_web_id=6842368731214956037&is_from_webapp=1'
]);

print_r($response);
// response now contains video result.

```


### getMusicInfo(): Get music info by video url
```php
use TiktokScraper\Client;
$tiktokClient = new Client([
        'rapidapi_key' => 'YOUR-RAPID-API_KEY'
    ]
);
$response = $tiktokClient->getMusicInfo([
    'url' => 'https://www.tiktok.com/music/Bad-Liar-6613051741099280390?lang=en'
]);

print_r($response);
// response now contains music result.

```


