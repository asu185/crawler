<?php
$ch = curl_init();
//$options = array(CURLOPT_URL =>'140.113.179.233:10080/protect/',
//$options = array(CURLOPT_URL =>'http://data.taipei.gov.tw/opendata/apply/query/NzExNEIyRUQtRDhFNS00OUZELTgxRjktRjQ3OTgwNkRCNjM1?$format=json&$filter=',
$options = array(CURLOPT_URL =>'localhost/protect/data3.txt',
CURLOPT_USERPWD => 'test:1234',
CURLOPT_HEADER => false,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_USERAGENT => "Json Crawler",
CURLOPT_FOLLOWLOCATION => true
);
curl_setopt_array($ch, $options);
$response = curl_exec($ch);
$output = json_decode($response);
curl_close($ch);
//echo $response;
//var_dump($output);
echo $output->address;
?>
