<?php

namespace App;

use GuzzleHttp\Client;

class FsApi
{
    private $client_id;
    private $client_secret;

    const CATEGORIES_URL = 'https://api.foursquare.com/v2/venues/categories';
    const EXPLORE_URL = 'https://api.foursquare.com/v2/venues/explore';

    public function __construct()
    {
        $this->client_id = env('FS_CLIENT_ID');
        $this->client_secret = env('FS_CLIENT_SECRET');
    }

    public function categories() {
        try {
            $client = new Client();
            $params = [
                'query' => [
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'v' => '20120609'
                ]
            ];
            $result = $client->request('GET',self::CATEGORIES_URL, $params);
            $categories = json_decode($result->getBody()->getContents());
            $cats = [];
            foreach ($categories->response->categories as $category) {
                $cats[] = ['id' => $category->id,'value' => $category->pluralName];
            }
            return $cats;
        }
        catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function explore(string $category) {
        try {
            $client = new Client();
            $params = [
                'query' => [
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'near' => 'valletta', //hardcoded since we will only fetch venues nearby to 'valletta'
                    'query' => $category,
                    'v' => '20120609'
                ]
            ];
            $result = $client->request('GET',self::EXPLORE_URL, $params);
            $result = json_decode($result->getBody()->getContents());
            $venues = [];
            foreach ($result->response->groups[0]->items as $locations) {
                $venues[] = $locations->venue->name;
            }
            return $venues;
        }
        catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
