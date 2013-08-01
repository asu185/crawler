<?php
$con = mysql_connect("localhost", "root", "1234");
if(!$con){
    die('Could not connect: ' . mysql_error());
}

if(mysql_query("CREATE DATABASE my_db", $con))
{
    echo "Database created\n";
}
else
{
    echo "Database existed!\n";
    //echo "Error creating database: " . mysql_error() . "\n";
}

mysql_query("SET NAMES 'utf8'");
mysql_select_db("my_db", $con);
//$sql = "CREATE TABLE ubikes
//(
//ID int NOT NULL AUTO_INCREMENT,
//PRIMARY KEY(ID),
//站點名稱 varchar(15),
//可借車輛 int,
//可停空位 int
//)";
$sql = "CREATE TABLE UbikeInfo
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
SiteName varchar(15),
SitePosition varchar(15),
AvaBikes int,
AvaParks int,
Lat float,
Lng float
)";
if(mysql_query($sql,$con)){
    echo "create success!\n";
}
else
    echo "failed!\n" . mysql_error();

mysql_close($con);

?>
