<?php
//
include 'simple_html_dom.php';

//$html = file_get_html('http://www.google.com/');
//$html = file_get_html('test.txt');
$html = file_get_html('http://www.youbike.com.tw/info04.php');

$con = mysql_connect("localhost", "root", "1234");
mysql_select_db("my_db", $con);

mysql_query("SET NAMES 'UTF8'");
mysql_query("ALTER TABLE UbikeInfo MODIFY SiteName VARCHAR(15) CHARACTER SET UTF8");

mysql_query("TRUNCATE TABLE UbikeInfo");

// Find all links 
foreach($html->find('td.point01') as $element){
	if($element->first_child()->plaintext){
		$site_name = $element->first_child()->plaintext;
		$ava_bikes = $element->next_sibling()->plaintext;
		$ava_parks = $element->next_sibling()->next_sibling()->plaintext;
        $href = $element->first_child()->href;
        $map = file_get_html('http://www.youbike.com.tw/' . $href);
        //$lat = $map->find('input#lat')[0]->value;
        //$lng = $map->find('input#lng')[0]->value;
        foreach($map->find('input.textinfo') as $site_position){
            $site_position = $site_position->value;
        }

        foreach($map->find('input#lat') as $lat){
            $lat = $lat->value;
        }
        foreach($map->find('input#lng') as $lng){
            $lng = $lng->value;
        }
        echo $site_name . ": " . $ava_bikes . " " . $ava_parks;
        //echo $site_position . ": " . $ava_bikes . " " . $ava_parks;
        echo " " . $lat . " " . "$lng" . "\n";

        if(mysql_query("INSERT INTO UbikeInfo(SiteName,SitePosition,AvaBikes,AvaParks,Lat,Lng)
            VALUES('$site_name', '$site_position', '$ava_bikes', '$ava_parks', '$lat', '$lng')"))
        {
            //echo "Insert Success!\n";
        }
        else
            echo mysql_error();
	}

}


//print_r(file("test.txt"));
//echo gettype(file_get_contents("test.txt"));








mysql_close($con);

?>
