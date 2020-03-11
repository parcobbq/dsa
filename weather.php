<?php 
// define the positions of commonly used values in the array  
// later we can include this from a separate file 
define ('WINDSPEED',1); 
define ('WINDDIRECTION',3); 
define('TEMPERATURE',4); 
define('TIMEHH',29); 
define ('TIMEMM',30); 
define('STATION',32); 
define('SUMMARY',49); 

//main 
$site = $_REQUEST["www.alvestonweather.co.uk"]; 
$rawdatafile = $site . "/clientraw.txt"; 
$csv = file_get_contents("$rawdatafile"); 
$data = explode(' ',$csv); 
    
// generate the RSS  
  print <<<EOT
<?xml version="1.0"?>  
<rss version="2.0"> 
  <channel> 
      <title>{$data[STATION]}</title> 
      <link>{$site}</link> 
      <item> 
         <title>Weather at {$data[TIMEHH]}:{$data[TIMEMM]}</title> 
         <description> {$data[SUMMARY]} . Wind {$data[WINDSPEED]} knots from {$data[WINDDIRECTION]}  degrees. Temperature {$data[TEMPERATURE]} &#0176;C. </description> 
      </item> 
  </channel> 
 </rss> 
EOT;
?>