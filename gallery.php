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
            <li class="current"><a href="index.html">Home</a></li>
            <li><a href="newcastle.php">Newcastle</a></li>
			<li><a href="atlanta.php">Atlanta</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="gallery.php">Gallery</a></li>
          </ul>
         </nav>
	   </div>
	</header>
	
		<section id="middlesection">
		<div class="container">


<?php
//Using Flickr API to pull some photos(Atlanta)
if ($_GET){
    if($_GET['city'] == 'Atlanta'){
        $url = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=0789c087897a586d5ebea50283746f0e&tags=City+of+Atlanta&format=json&nojsoncallback=1&auth_token=72157713448145593-f5e1f99c3204eda6&api_sig=f05f7fa0c1561b42545c5935b27a430d';  
    }elseif($_GET['city'] == 'Newcastle'){
        $url = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=0789c087897a586d5ebea50283746f0e&text=Newcastle+Upon+Tyne&per_page=&page=&format=json&nojsoncallback=1&auth_token=72157713448145593-f5e1f99c3204eda6&api_sig=c234fb0f9a34cc2a0607f5520fa48149';
    }else{
        $url = 'Nothing';
    }
    
    if($url != 'Nothing'){
            //echo $_GET['city'];
        echo '<h1>Flickr - '.$_GET['city'].'</h1>';

        $data = json_decode(file_get_contents($url));

        $photos = $data->photos->photo;

        foreach ($photos as $photo){
	
	        $url2 = 'https://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
	        echo '<div style="margin:3%; display: inline-block"><img style="box-shadow: 10px 10px 5px grey" src="'.$url2.'"></div>';
        }
    }else{
        echo '<h1>City does not exist!!!</h1>';
    }
}
else{
    echo '<div style="font-size: 36px; display: inline-block; width: 30vw; text-align: center; margin-top: 10%"><a href="gallery.php?city=Newcastle"><img width="500" src="newcastle1.jpg"><br><span>Newcastle</span></a></div>';
    
    echo '<div style="font-size: 36px; display: inline-block; width: 30vw; text-align: center; margin-top: 10%"><a href="gallery.php?city=Atlanta"><img width="500" src="atlanta1.jpg"><br><span>Atlanta</span></a></div>';
}

?>
<p></p>
		</div>	
	
	
	</section>
	
	<footer>
	<p>Twin Cities Project Developed by Satpal Singh, Jeff Loh Zhi Wei, Pak Long Ung, Joao Victor Bezerra &copy; 2019</p>
	</footer>
</body>
</html>

