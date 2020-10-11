<?php
ini_set('display_errors', '1');
require __DIR__ . '/../vendor/autoload.php';

use TiktokScraper\Client;

$client = new Client([
        'rapidapi_key' => 'YOUR-RAPID-API-KEY' // get your key on https://rapidapi.com/restyler/api/tiktok12
    ]
);


try {
    #########################
    ### get user info
    #########################
    $response = $client->getUserInfo([
        'username' => 'realmadrid'
    ]);

    
    
    echo '<h2>Real Madrid user info:</h2><pre>';
    print_r($response);
    echo '</pre>';
    
    #########################
    ### get user feed
    #########################
    $response = $client->getUserFeed([
        'limit' => '5',
        'username' => 'realmadrid'
    ]);
    
    echo '<h2>Real Madrid feed:</h2><pre>';
    print_r($response);
    echo '</pre>';


    #########################
    ### get video description
    #########################
    $response = $client->getVideoInfo([
        'url' => 'https://www.tiktok.com/@tuzelitydance/video/6867065857240026369?sender_device=pc&sender_web_id=6842368731214956037&is_from_webapp=1'
    ]);

    echo '<h2>Video metadata by URL:</h2><pre>';
    print_r($response);
    echo '</pre>';


    #########################
    ### get music information
    #########################
    $response = $client->getMusicInfo([
        'url' => 'https://www.tiktok.com/music/Bad-Liar-6613051741099280390?lang=en'
    ]);

    
    echo '<h2>Music metadata by URL:</h2><pre>';
    print_r($response);
    echo '</pre>';




    


    
} catch (GuzzleHttp\Exception\ClientException $e) {
    var_dump($e->getRequest());
    $response = $e->getResponse();

    $jsonBody = json_decode($response->getBody(), true);

    echo 'Status code: ' . $response->getStatusCode() . '<br />';
    echo 'Err message: ' . $jsonBody['message'];

    

}



