<?php
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://tiktok12.p.rapidapi.com',
    // You can set any number of default request options.
    'timeout'  => 20,
    'headers' => [
        'x-rapidapi-host' => 'tiktok12.p.rapidapi.com',
        'x-rapidapi-key' => 'YOUR-RAPID-API-KEY' // get your key on https://rapidapi.com/restyler/api/tiktok12
    ]
]);


try {
    #########################
    ### get user info
    #########################
    $response = $client->get('user-info', ['query' => [
        'username' => 'realmadrid'
    ]]);

    $jsonBody = json_decode($response->getBody(), true);
    
    echo '<h2>Real Madrid user info:</h2><pre>';
    print_r($jsonBody);
    echo '</pre>';

    #########################
    ### get user feed
    #########################
    $response = $client->get('user-feed', ['query' => [
        'limit' => '5',
        'username' => 'realmadrid'
    ]]);

    $jsonBody = json_decode($response->getBody(), true);
    
    echo '<h2>Real Madrid feed:</h2><pre>';
    print_r($jsonBody);
    echo '</pre>';


    #########################
    ### get video description
    #########################
    $response = $client->get('video-info', ['query' => [
        'url' => 'https://www.tiktok.com/@tuzelitydance/video/6867065857240026369?sender_device=pc&sender_web_id=6842368731214956037&is_from_webapp=1'
    ]]);

    $jsonBody = json_decode($response->getBody(), true);
    
    echo '<h2>Video metadata by URL:</h2><pre>';
    print_r($jsonBody);
    echo '</pre>';


    #########################
    ### get music information
    #########################
    $response = $client->get('music-info', ['query' => [
        'url' => 'https://www.tiktok.com/music/Bad-Liar-6613051741099280390?lang=en'
    ]]);

    $jsonBody = json_decode($response->getBody(), true);
    
    echo '<h2>Music metadata by URL:</h2><pre>';
    print_r($jsonBody);
    echo '</pre>';




    


    
} catch (GuzzleHttp\Exception\ClientException $e) {

    $response = $e->getResponse();

    $jsonBody = json_decode($response->getBody(), true);

    echo 'Status code: ' . $response->getStatusCode() . '<br />';
    echo 'Err message: ' . $jsonBody['message'];

    

}



