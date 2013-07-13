<?php
//
include 'simple_html_dom.php';

//$html = file_get_html('http://www.google.com/');
//$html = file_get_html('test.txt');
$html = file_get_html('http://www.youbike.com.tw/info04.php');

// Find all images 
//foreach($html->find('img') as $element) 
//      echo $element->src . '<br>';

$con = mysql_connect("localhost", "root", "1234");
mysql_select_db("my_db", $con);

mysql_query("TRUNCATE TABLE UbikeInfo");

// Find all links 
foreach($html->find('td.point01') as $element){
	if($element->first_child()->plaintext){
		$site_name = $element->first_child()->plaintext . ": ";
		$ava_bikes = $element->next_sibling()->plaintext . " ";
		$ava_parks = $element->next_sibling()->next_sibling()->plaintext . "\n";

        if(mysql_query("INSERT INTO UbikeInfo(SiteName,AvaBikes,AvaParks)
            VALUES('$site_name', '$ava_bikes', '$ava_parks')"))
        {
            echo "Insert Success!\n";
        }
        else
            echo mysql_error();
	}

}


//print_r(file("test.txt"));
//echo gettype(file_get_contents("test.txt"));








mysql_close($con);

?>
