<?php
//http://data.taipei.gov.tw/opendata/apply/query/NzExNEIyRUQtRDhFNS00OUZELTgxRjktRjQ3OTgwNkRCNjM1?$format=json&$filter=
require 'vendor/autoload.php';
use Guzzle\Http\Client;

$client = new Client('http://data.taipei.gov.tw');
//$client = new Client('http://www.google.com');

$request = $client->get('/opendata/apply/query/NzExNEIyRUQtRDhFNS00OUZELTgxRjktRjQ3OTgwNkRCNjM1?$format=json&$filter=');
//$request = $client->get();

$response = $request->send()->json();
//echo $response["district"] . " \n";
//echo $response->getBody();
//echo $response.getStatusCode();
//echo $response = $request->getResponseBody();

//$a = array(
//    "one" => 1,
//    "two" => 2,
//    "three" => 3,
//    "seventeen" => 17
//);

//foreach ($response as $k => $i) {
//  echo "$k: $i\n";
//}

foreach ($response as $location) {
    foreach ($location as $key => $val){
        echo $location["$key"] . "\n";
        //echo "$key" . "$val" . "\n"; 
    }
} 
