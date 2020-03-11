 
 
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
            <li class="current"><a href="newcastle.php">Newcastle</a></li>
			<li><a href="atlanta.php">Atlanta</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="gallery.php">Gallery</a></li>
          </ul>
         </nav>
	   </div>
	</header>
	
		<section id="middlesection">
		<div class="container">
			<h1>Newcastle</h1>
			<p>Newcastle upon Tyne is to a more common name for their football team Newcastle is a city within Tyne and Wear being the most populated city in the north east of England. Newcastle are known for a wide variety of entertainment and cultural experiences.   </p>
			
			<img src="newcastle.jpg" alt="Newcastle" width="600" height="500">
			<br>
			<h2>Current Weather</h2>
			<?php 
require("wdllib.php"); 

//main 
  //$site = $_REQUEST["http://www.alvestonweather.co.uk/"]; 
  //$rawdatafile = $site . "/clientraw.txt"; 
  $csv = file_get_contents("https://www.north-seaton.co.uk/clientraw.txt"); 
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

var newcastle_castle = {lat: 54.968813, lng: -1.610450};
var gh_bridge = {lat: 54.969885, lng: -1.599216};
var angel_of_the_north = {lat: 54.9141128, lng: -1.5895022};
var hadrain_Wall_Path  = {lat: 54.9711275, lng: -1.5955962};
var discovery_Museum  = {lat: 54.9691124, lng: -1.6248638};
var tyne_Bridge  = {lat: 54.9679878, lng: -1.6061614};
var tynemouth_Priory_and_Castle  = {lat: 55.0177251, lng: -1.4179219};
var stMarys_Lighthouse = {lat: 55.0718540, lng: -1.4495730};

var info_newcastle_castle = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Newcastle Castle</h2>'+
'<div id="bodyContent">'+
'<p>The Castle, Newcastle, is a medieval fortification in Newcastle upon Tyne, England, built on the site of the fortress that gave the City of Newcastle its name. The most prominent remaining structures on the site are the Castle Keep, the castle main fortified stone tower, and the Black Gate, its fortified gatehouse.</p>'+
'</div>'+
'</div>';
var info_gh_bridge = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Gateshead Millenium Bridge</h2>'+
'<div id="bodyContent">'+
'<p>The Gateshead Millennium Bridge is a pedestrian and cyclist tilt bridge spanning the River Tyne in North East England between Gatesheads Quays arts quarter on the south bank, and the Quayside of Newcastle upon Tyne on the north bank.</p>'+
'</div>'+
'</div>';
var info_angel_of_the_north = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Angel of the North</h2>'+
'<div id="bodyContent">'+
'<p>The Angel of the North is a contemporary sculpture, designed by Antony Gormley, located in Gateshead, Tyne and Wear, England. Completed in 1998, it is a steel sculpture of an angel, 20 metres tall, with wings measuring 54 metres across.</p>'+
'</div>'+
'</div>';
 
var info_hadrain_wall_path = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Hadrain Wall Path</h2>'+
'<div id="bodyContent">'+
'<p>The Hadrians Wall Path is a long-distance footpath in the north of England, which became the 15th National Trail in 2003. It runs for 84 miles, from Wallsend on the east coast of England to Bowness-on-Solway on the west coast. </p>'+
'</div>'+
'</div>';
var info_discovery_museum = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Discovery Museum</h2>'+
'<div id="bodyContent">'+
'<p>The Discovery Museum is a science museum and local history museum situated in Blandford Square in Newcastle upon Tyne, England. It displays many exhibits of local history, including the ship, Turbinia. It is managed by Tyne & Wear Archives & Museums.</p>'+
'</div>'+
'</div>';
var info_tyne_bride = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Tyne Bridge</h2>'+
'<div id="bodyContent">'+
'<p>The Tyne Bridge is a through arch bridge over the River Tyne in North East England, linking Newcastle upon Tyne and Gateshead. The bridge was designed by the engineering firm Mott, Hay and Anderson, who later designed the Forth Road Bridge, and was built by Dorman Long and Co. of Middlesbrough. </p>'+
'</div>'+
'</div>';
var info_tynemouth_priory_and_castle = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">Tynemouth Priory and Castle</h2>'+
'<div id="bodyContent">'+
'<p>Tynemouth Castle is located on a rocky headland, overlooking Tynemouth Pier. The moated castle-towers, gatehouse and keep are combined with the ruins of the Benedictine priory where early kings of Northumbria were buried.</p>'+
'</div>'+
'</div>';
var info_stmarrys_lighthouse = '<div id ="content">' +
'<div id="siteNotice">'+
'</div>'+
'<h2 id="heading1" class="heading1">St Marrys Lighthouse</h2>'+
'<div id="bodyContent">'+
'<p>St Marys Lighthouse is on the tiny St Marys Island, just north of Whitley Bay on the coast of North East England. The small rocky tidal island is linked to the mainland by a short concrete causeway which is submerged at high tide.</p>'+
'</div>'+
'</div>';

var mapProp= {
  center:new google.maps.LatLng(54.97794,-1.61162),
  zoom:10,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker1 = new google.maps.Marker({position: newcastle_castle, map: map});
var iw_newcastle_castle = new google.maps.InfoWindow({content: info_newcastle_castle});
marker1.addListener('mouseover', function(){
	iw_newcastle_castle.open(map, marker1);
});
marker1.addListener('mouseout', function() {
    iw_newcastle_castle.close();
});
marker1.addListener('click', function() {
    window.location.href = 'newcastle_castle.php';
});


var marker2 = new google.maps.Marker({position: gh_bridge, map: map});
var iw_gh_bridghe = new google.maps.InfoWindow({content: info_gh_bridge});
marker2.addListener('mouseover', function(){
	iw_gh_bridghe.open(map, marker2);
});
marker2.addListener('mouseout', function() {
    iw_gh_bridghe.close();
});
marker2.addListener('click', function() {
    window.location.href = 'gateshead_bridge.php';
});

var marker3 = new google.maps.Marker({position: angel_of_the_north, map: map});
var iw_angel_of_the_north = new google.maps.InfoWindow({content: info_angel_of_the_north});
marker3.addListener('mouseover', function(){
	iw_angel_of_the_north.open(map, marker3);
});
marker3.addListener('mouseout', function() {
    iw_angel_of_the_north.close();
});
marker3.addListener('click', function() {
    window.location.href = 'angel_of_the_north.php';
});


var marker4 = new google.maps.Marker({position: hadrain_Wall_Path, map: map});
var iw_hadrain_wall_path = new google.maps.InfoWindow({content: info_hadrain_wall_path});
marker4.addListener('mouseover', function(){
	iw_hadrain_wall_path.open(map, marker4);
});
marker4.addListener('mouseout', function() {
    iw_hadrain_wall_path.close();
});
marker4.addListener('click', function() {
    window.location.href = 'hadrians_wall.php';
});

var marker5 = new google.maps.Marker({position: discovery_Museum, map: map});
var iw_discovery_museum = new google.maps.InfoWindow({content: info_discovery_museum});
marker5.addListener('mouseover', function(){
	iw_discovery_museum.open(map, marker5);
});
marker5.addListener('mouseout', function() {
    iw_discovery_museum.close();
});
marker5.addListener('click', function() {
    window.location.href = 'discovery_museum.php';
});



var marker6 = new google.maps.Marker({position: tyne_Bridge, map: map});
var iw_tyne_bridge = new google.maps.InfoWindow({content: info_tyne_bride});
marker6.addListener('mouseover', function(){
	iw_tyne_bridge.open(map, marker6);
});
marker6.addListener('mouseout', function() {
    iw_tyne_bridge.close();
});
marker6.addListener('click', function() {
    window.location.href = 'tyne_bridge.php';
});


var marker7 = new google.maps.Marker({position: tynemouth_Priory_and_Castle, map: map});
var iw_tynemoth_priory_and_castle = new google.maps.InfoWindow({content: info_tynemouth_priory_and_castle});
marker7.addListener('mouseover', function(){
	iw_tynemoth_priory_and_castle.open(map, marker7);
});
marker7.addListener('mouseout', function() {
    iw_tynemoth_priory_and_castle.close();
});
marker7.addListener('click', function() {
    window.location.href = 'tynemouth_priory.php';
});


var marker8 = new google.maps.Marker({position: stMarys_Lighthouse, map: map});
var iw_stmarrys_lighthouse = new google.maps.InfoWindow({content: info_stmarrys_lighthouse});
marker8.addListener('mouseover', function(){
	iw_stmarrys_lighthouse.open(map, marker8);
});
marker8.addListener('mouseout', function() {
    iw_stmarrys_lighthouse.close();
});
marker8.addListener('click', function() {
    window.location.href = 'stmarrys_lighthouse.php';
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