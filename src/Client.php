<?php

namespace TiktokScraper;

use GuzzleHttp\Client as GuzzleClient;

class Client {
    private $guzzleClient;
    public function __construct(array $config = [])
    {
        if (!isset($config['apiroad_key'])) {
            throw new \Exception('apiroad_key must be set');
        }
        
        $this->guzzleClient = new GuzzleClient([
            // Base URI is used with relative requests
            'base_uri' => 'https://tiktok.apiroad.net',
            // You can set any number of default request options.
            'timeout'  => 30,
            'headers' => [
                'x-apiroad-host' => 'tiktok.apiroad.net',
                'x-apiroad-key' => $config['apiroad_key'] // get your key on https://rapidapi.com/restyler/api/tiktok12
            ]
        ]);

    }

    public function getUserInfo(array $params = []) {
        if (!isset($params['username'])) {
            throw new \Exception('params[username] is required!');
        }
        
        $response = $this->guzzleClient->get('user-info', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    public function getUserFeed(array $params = []) {
        if (!isset($params['username'])) {
            throw new \Exception('params[username] is required!');
        }

        $response = $this->guzzleClient->get('user-feed', ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    public function getVideoInfo($params) {
        if (!isset($params['url'])) {
            throw new \Exception('params[url] is required!');
        }

        $response = $this->guzzleClient->get('video-info', ['query' => [
            'url' => $params['url']
        ]]);
    
        return json_decode($response->getBody(), true);

    }

    public function getMusicInfo($params) {
        if (!isset($params['url'])) {
            throw new \Exception('params[url] is required!');
        }

        $response = $this->guzzleClient->get('music-info', ['query' => [
            'url' => $params['url']
        ]]);
    
        return json_decode($response->getBody(), true);
    }


}