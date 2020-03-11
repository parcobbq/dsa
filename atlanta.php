 
 
 <!DOCTYPE html>
<html>
<head>
<title>Twin Cities</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
	  <div class="container">
		<div id="top">
			<h1><a href="index.html"><span class="highlight">Twin Cities</span></a></h1>
		</div>
		 <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="newcastle.php">Newcastle</a></li>
			<li class="current"><a href="atlanta.php">Atlanta</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="gallery.php">Gallery</a></li>
          </ul>
         </nav>
	   </div>
	</header>
	
		<section id="middlesection">
		<div class="container">
			<h1>Atlanta</h1>
			<p>Atlanta is the capital of the U.S. state of Georgia, Atlanta being placed on the foothills of the Appalachian mountains has the highest elevations within the category of the major cities east of Mississippi river.   </p>
			
			<img src="Atlanta.jpg" alt="Newcastle" width="500" height="500">
			<br>
			<h2>Current Weather</h2>
			<?php 
require("wdllib.php"); 

//main 
  //$site = $_REQUEST["http://www.alvestonweather.co.uk/"]; 
  //$rawdatafile = $site . "/clientraw.txt"; 
  $csv = file_get_contents("http://www.deputydawgwx.com/clientraw.txt"); 
  $data = explode(' ',$csv); 
    
// generate the RSS  
print <<<EOT
<?xml version="1.0"?>  
<rss version="2.0"> 
  <channel> 
      <title>{$data[STATION]}</title> 
      
      <item> 
         <title>Weather at {$data[TIMEHH]}:{$data[TIMEMM]}</title> 
         
		 <description>{$data[SUMMARY]}</description>
		 <br>
		 <description>Wind speed: {$data[WINDSPEED]} </description>
		 <br>
		 <description>Knots from: {$data[WINDDIRECTION]} degrees </description>
		 <br>
		 <description>Temperature: {$data[TEMPERATURE]} &#0176;C. </description>
	  </item> 
  </channel> 
 </rss> 
EOT;
?>

	<h2>Map - Places of interest</h2>
	
	<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {

//These containt the latitude and longitudes for each place of interest
var center_for_civil_humand_rights = {lat: 33.764056, lng: -84.393083};
var the_king_center = {lat: 33.755250, lng: -84.373028};
var technology_square = {lat: 33.776056, lng: -84.388833};
var georgia_aquarium  = {lat: 33.763417, lng: -84.395083};
var atlanta_white_house  = {lat: 33.843702, lng: -84.289236};
var little_five_points  = {lat: 33.764254, lng: -84.349663};
var mercedes_benz_stadium  = {lat: 33.755515, lng: -84.400866};
var centennial_olympic_park = {lat: 33.761819, lng: -84.394429};

//these string hold the short descriptions for each place
var info_center_civil = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Center for Civil human rights</h2>'+
'<div id="bodyContent">'+
'<p>The National Center for Civil and Human Rights is a museum dedicated to the achievements of both the civil rights movement in the United States and the broader worldwide human rights movement. Located in downtown Atlanta, Georgia, the museum opened to the public on June 23, 2014.</p>'+
'</div>'+
'</div>';
var info_the_king_center = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">The King Center</h2>'+
'<div id="bodyContent">'+
'<p>The King Library and Archives in Atlanta is the largest repository of primary source materials on Dr. Martin Luther King, Jr. and the American Civil Rights Movement in the world</p>'+
'</div>'+
'</div>';
var info_technology_square = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Technology Square</h2>'+
'<div id="bodyContent">'+
'<p>Technology Square, commonly called Tech Square, is a multi-block neighborhood located in Midtown Atlanta, Georgia, United States. Tech Square is bounded by 8th Street on the north, 3rd Street on the south, West Peachtree Street to the east, and Williams Street to the west.</p>'+
'</div>'+
'</div>';
 
var info_georgia_aquarium = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Georgia Aquarium</h2>'+
'<div id="bodyContent">'+
'<p>Georgia Aquarium is a public aquarium in Atlanta, Georgia, United States. Georgia Aquarium is home to hundreds of species and thousands of animals across its seven major galleries, all of which reside in more than 10 million US gallons of fresh and salt water.</p>'+
'</div>'+
'</div>';
var info_altanta_white_house = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Atlanta White House</h2>'+
'<div id="bodyContent">'+
"<p>Atlanta's White House is the brain child of Fred Milani, an Iranian refugee who arrived in the United States in 1979 and proceeded to build himself a booming real-estate business in the Atlanta Area.</p>"+
'</div>'+
'</div>';
var info_little_five_points = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Little Five Points</h2>'+
'<div id="bodyContent">'+
"<p>Little Five Points (also L5P or LFP or Little Five or Lil' Five) is a famous district on the east side of Atlanta, Georgia, United States, 2 1⁄2 miles (4.0 km) east of downtown</p>"+
'</div>'+
'</div>';
var info_mercedes_benz = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Mercedes Benz Stadium</h2>'+
'<div id="bodyContent">'+
'<p>Mercedes-Benz Stadium is a multi-purpose stadium located in Atlanta, Georgia, United States. Opened in August 2017 as a replacement for the Georgia Dome, it serves as the home stadium of the Atlanta Falcons of the National Football League (NFL) and Atlanta United FC of Major League Soccer (MLS).</p>'+
'</div>'+
'</div>';
var info_centennial_olympic_park = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Centennial Olympic Park</h2>'+
'<div id="bodyContent">'+
'<p>Centennial Olympic Park is a 22-acre (89,000 m2) public park located in downtown Atlanta, Georgia owned and operated by the Georgia World Congress Center Authority. </p>'+
'</div>'+
'</div>';

//This sets the map to zoom in to the appropriate city
var mapProp= {
  center:new google.maps.LatLng(33.74831, -84.39111),
  zoom:12,
};

//This places the map
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

//These handle placing the markers onto the map as well as, 
//adds mouse_over and mouse_outs listeners to open and close the information window
//Also includes the the click listeners that links the places to the appropriate pages.
var marker9 = new google.maps.Marker({position: center_for_civil_humand_rights, map: map});
var iw_center_civil = new google.maps.InfoWindow({content: info_center_civil});
marker9.addListener('mouseover', function(){
	iw_center_civil.open(map, marker9);
});
marker9.addListener('mouseout', function() {
    iw_center_civil.close();
});
marker9.addListener('click', function() {
    window.location.href = 'center_for_civil_and_human_rights.php';
});


var marker10 = new google.maps.Marker({position: the_king_center, map: map});
var iw_the_king_center = new google.maps.InfoWindow({content: info_the_king_center});
marker10.addListener('mouseover', function(){
	iw_the_king_center.open(map, marker10);
});
marker10.addListener('mouseout', function() {
    iw_the_king_center.close();
});
marker10.addListener('click', function() {
    window.location.href = 'the_king_center.php';
});

var marker11 = new google.maps.Marker({position: technology_square, map: map});
var iw_technology_square = new google.maps.InfoWindow({content: info_technology_square});
marker11.addListener('mouseover', function(){
	iw_technology_square.open(map, marker11);
});
marker11.addListener('mouseout', function() {
    iw_technology_square.close();
});
marker11.addListener('click', function() {
    window.location.href = 'technology_square.php';
});


var marker12 = new google.maps.Marker({position: georgia_aquarium, map: map});
var iw_georgia_aquarium = new google.maps.InfoWindow({content: info_georgia_aquarium});
marker12.addListener('mouseover', function(){
	iw_georgia_aquarium.open(map, marker12);
});
marker12.addListener('mouseout', function() {
    iw_georgia_aquarium.close();
});
marker12.addListener('click', function() {
    window.location.href = 'georgia_aquarium.php';
});

var marker13 = new google.maps.Marker({position: atlanta_white_house, map: map});
var iw_atlanta_white_house = new google.maps.InfoWindow({content: info_altanta_white_house});
marker13.addListener('mouseover', function(){
	iw_atlanta_white_house.open(map, marker13);
});
marker13.addListener('mouseout', function() {
    iw_atlanta_white_house.close();
});
marker13.addListener('click', function() {
    window.location.href = 'atlanta_white_house.php';
});

var marker14 = new google.maps.Marker({position: little_five_points, map: map});
var iw_little_five_points = new google.maps.InfoWindow({content: info_little_five_points});
marker14.addListener('mouseover', function(){
	iw_little_five_points.open(map, marker14);
});
marker14.addListener('mouseout', function() {
    iw_little_five_points.close();
});
marker14.addListener('click', function() {
    window.location.href = 'little_five_points.php';
});

var marker15 = new google.maps.Marker({position: mercedes_benz_stadium, map: map});
var iw_mercedes_benz_stadium = new google.maps.InfoWindow({content: info_mercedes_benz});
marker15.addListener('mouseover', function(){
	iw_mercedes_benz_stadium.open(map, marker15);
});
marker15.addListener('mouseout', function() {
    iw_mercedes_benz_stadium.close();
});
marker15.addListener('click', function() {
    window.location.href = 'mercedes_benz_stadium.php';
});

var marker16 = new google.maps.Marker({position: centennial_olympic_park, map: map});
var iw_centennial_olympic_park = new google.maps.InfoWindow({content: info_centennial_olympic_park});
marker16.addListener('mouseover', function(){
	iw_centennial_olympic_park.open(map, marker16);
});
marker16.addListener('mouseout', function() {
    iw_centennial_olympic_park.close();
});
marker16.addListener('click', function() {
    window.location.href = 'centennial_olympic_park.php';
});


}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhDiJNAc1e8FGl4yKfnTudmSM_-tRgEVk&callback=myMap"></script>
			
			<p></p>
		</div>	
	
	
	</section>
	
	<footer>
	<p>Twin Cities Project Developed by Satpal Singh, Jeff Loh Zhi Wei, Pak Long Ung, Joao Victor Bezerra de Melo &copy; 2020</p>
	</footer>
</body>
</html>