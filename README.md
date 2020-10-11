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
    // 'second-proxy' => '1',  - use fallback proxy in case you see weird errors like 404 for existing accounts. Every method supports this.
]);

print_r($response);
// response now contains array of user info.
/*
Array
(
    [secUid] => MS4wLjABAAAAdi4wJZtAiIre_rQ1KiFteDmtrGBDIyoleHRNsjL14-Enf8aVfkLUJ0l_LcJPZkiv
    [userId] => 6693776501107033094
    [isSecret] => 
    [uniqueId] => realmadrid
    [nickName] => Real Madrid C.F.
    [signature] => ⚽️ The official Real Madrid C.F. account
🏆 13 times European Champions
    [covers] => Array
        (
            [0] => https://p77-sign-sg.tiktokcdn.com/imgurl
            [1] => https://p77-sign-sg.tiktokcdn.com/imgurl2
        )

    [coversMedium] => Array
        (
            [0] => https://p77-sign-sg.tiktokcdn.com/imgurl3
            [1] => https://p77-sign-sg.tiktokcdn.com/imgurl4
        )

    [following] => 8
    [fans] => 3800000
    [heart] => 28900000
    [video] => 338
    [verified] => 1
    [digg] => 0
    [ftc] => 
    [relation] => -1
    [openFavorite] => 
) */
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

## Proxy Fallback
This RapidAPI API uses fastest proxy available for the moment. It is problematic to detect when Tiktok bans some ip address, so if you use the API heavily Tiktok may start throwing 404 responses for existing resources. This can be mitigated by using distributed proxy network via `&second-proxy=1` query param (available for all library public methods). Distributed proxy network is typically slower but ipractically impossible to ban.

## Examples, Error Handling
See full example file [here](examples/index.php).


