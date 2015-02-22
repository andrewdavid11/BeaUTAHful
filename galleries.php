<?php 
  include("Includes/inc_db.php");
  include("Includes/inc_static_galleries.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Favorite Hiking, Mountain, Canyoneering, and Adventure Photo Galleries by Web Designer Andrew David</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Hiking, Adventure, and Wilderness Photo Galleries from the mountains, canyons, forests, deserts and National Parks of Utah, Washington, Idaho, Nevada, Montana, Wyoming, Oregon. Includes the Pacific Northwest, Southwest, and Rocky Mountains: prints for sale by web designer Andrew David." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/randomquotes.js"></script>
  </head>
<body onload="displayQuote();">
<div class="container">
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">
  	<h1>My Favorite Galleries</h1>
  	  <p>The top gallery on this page will always be my most recently added photos.<br />
  	  You can also use the <a href="search.php">search page</a> to view many more galleries, run your own searches by keyword or location, and view the more than 600 photos I have on this site.<br />
  	  Hundreds more will be coming each and every year. Thanks for looking.</p>
  <div id="Utah">
    <h2>Newest Photos</h2>
      <p>This gallery will always display my most recent photos.</p>
       <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($NewestGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=Newest">View all photos in the Newest Photos Gallery>></a>
	  <hr />
    <h2>Wasatch Mountains</h2>
	  <p>The Wasatch Mountains are my "home" range, towering over Salt Lake City, a mecca of hiking, climbing
	  camping, and skiing with beautiful sunrises, sunsets, and rocks of many colors. I have stood atop most of the popular
	  and best summits in the range, including the Pfeifferhorn, Broads Forks Twin Peaks, Dromedary Peak, the Sundial, Mount Superior, The Obelisk, 
	  Lone Peak, Box Elder Peak, Mount Olympus, Mount Timpanogos, and more. This gallery has pictures from Lake Blanche, Broads Forks, Lake Hardy, Bell's Canyon,
	  Big Cottonwood Canyon, Little Cottonwood Canyon, Millcreek Canyon, Brighton Lakes, and more.</p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($WasGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=Wasatch%20Mountains">View all photos in the Wasatch Mountains Gallery>></a>
	  <hr />
	<h2>Deserts</h2>
	  <p>It seems more people can appreciate the beauty of forests, beaches, and mountains, than can savor a desert. 
	  Here in Utah, home to five national parks and a national monument in the Southern deserts, the beauty of narrow canyons,
	  dry wind-swept rock patterns, striated cliffs, and hot sun-bleached days below cloudless blue skies, we know how to treasure a dry zone.
	  We even go out of our way to visit deserts in neighboring states, to pick out lean beauty in the strain of ingenious shrubs and cacti, and lizards.
	  This gallery collects pictures from Zion National Park, Capitol Reef, Bryce Canyon, Escalante, Canyonlands, and the Arches area of Utah. Some highlights include 
	  Sunrise Point, Sunset Point and the Fairyland Loop, and spots and canyons along the Highway 12 and Hole in the Rock Road. Also mixed in are
	  Valley of Fire State Park, Cathedral Gorge, and Great Basin National Park of Nevada, the Grand Canyon, Sedona, Antelope Canyon, and other hot spots
	  in Arizona, and a few other pictures from other deserts.
	  </p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($DesertsGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?d=Utah&e=Desert">View all photos in the the Utah Deserts Gallery>></a>
	  <hr />
  </div>
  <div id="Glacier National Park">
  <h2>Glacier National Park</h2>
	  <p>My home away from home is Glacier National Park.  With over 750 miles of trail, and hundreds of shocking
	  sheer peaks carved out by ancient ice, left towering under dew and vertical miles over meadows of wildflowers, animals
	  of every shape and size still roam wild along with hikers and a few hearty climbers.  A summer is never complete
	  for me without a little run up to "the land of shining mountains" as the Natives called it. I have been atop
	  nearly 30 peaks in the park and covered roughly 500 miles of ground so far. My favorite summits and views include
	  Mount Reynolds, Bearhat Mountain, Mount Oberlin, the Dragon's Tail, Logan Pass, Mount Logan, Mount Merritt,
	  Mount Ipasha, Iceberg Peak, Shangri La, the Ptarmigan Goat Trail, Almost-A-Dog Peak, Triple Divide Peak,
	  Mount Gould, the Angel's Wing, and Mount Siyeh.
	  </p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($GNPGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=Glacier%20National%20Park">View all the photos in the Glacier National Park Gallery>></a>
	  <hr />
  </div>
  <div id="Northwest">
  <h2>The Pacific Northwest</h2>
	  <p>I would love to travel the Pacific Northwest more. Beautiful rainforests yield after hours of fine hiking
      to high jagged peaks, hanging with crystaline glaciers.  Vibrant colors and charming sunbeams shake hands with cool crisp air.
      These are some of my favorite memories from the flower-kissed Cascades and Olympic mountains, as well as from intimate tidepools on shivering
      beaches with crashing waves. I have had fun visiting Iron Creek Falls, Mount Rainier, Pinnacle Peak, the Tatoosh Range,
      the Mount Baker Highway, Mount Shuksan, Fisher Towers, Lake Anne, Heart Lake, Sol Duc Forest, Appleton Pass,
      The Secret Garden, the Catwalk, Trapper Peak, Easy Pass, Saddle Mountain, Arizona Beach, Rialto Beach, Haystack Rock, redwood forests,
      Hoh Rainforest, and more.	Salt Lake City is a great place to live, with wonderful adventures less than 7 hours away in any direction.
      The worst thing about life in SLC is that I am 20 hours of driving from spots like those in this gallery.
	  </p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($PacNWGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=Pacific%20Northwest" >View all the photos in the Pacific Northwest Gallery>></a>
	  <hr />
  </div>
  <div id="Sawtooths">
  <h2>The Sawtooth Mountains of Idaho</h2>
	  <p>The Sawtooth Mountains of Idaho stretch more than 40 miles, a scarred smile discovered by far too few.
	  This is a great place to fish, ride horses, or climb technical vertical rock, with summit views incomparable in America.
	  At lower elevations than many of the Rocky Mountains, the Sawtooths thaw earlier and make a great spring
	  training ground every year, also thanks to plentiful lakes for base-camps and level, short approach trails.  
	  I try to go for a week each year.  Take a look and you'll see why. Favorite spots
	  include The Finger of Fate, Warbonnet Peak, Packrat Peak, the Mayan Temple, Feather Lakes, Shangri La Lakes,
	  Mount Cramer, Hell Roaring Lake, the Upper Redfish Lakes, Mount Alpen, Goat's Perch, Sawtooth Lake, and Mount Heyburn.
	  </p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($IdGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=Sawtooth">View all the photos in the Sawtooth Mountains Gallery>></a>
	  <hr />
  </div>
  <div id="panoramas">
    <h2>Panoramic Gallery</h2>
	  <p>I love panoramas, even if they are a lot of work to produce. Digital technology has helped, but the easier
	  the process gets, the lower the image quality seems to go. In a few years, this may be resolved and you'll see ever 
	  bigger and more beautiful panoramas, achieved with just one click of a button, but for now, just know I put a lot of editting
	  into each of these wide views from around my travels. Glacier National Park fills much of this gallery, 
	  where 360 degree views of mountains in all directions, and swirling storm clouds make for magnificent captures,
	  but there are also choice shots from the Idaho Sawtooths, the Grand Canyon, the Cascades of Washington, the Wind River
	  Mountains of Wyoming, and my home state of Utah. I will be adding many more options to this gallery in the coming months
	  I hope. Several promising panoramas still need editing, and to be "stitched" together. I get to that whenever I find
	  a few free hours.
	  </p>
	  <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 6) {
		        $row = mysql_fetch_assoc($PanoGallery);
		  ?>
		
			<div class='thumBoxPan'>
				<a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	  <br />
	  <a href="search.php?q=panorama">View all the photos in the Sawtooth Mountains Gallery>></a>
	  <hr />
  </div>
  <div id="posters">
    <h2>Fine Art Collage Poster Gallery</h2>
      <p>These 20" X 30" posters come on a premium thick paper, with black border. Custom posters are available. There are no repeated photos on any poster, so you can collect them all if you want. These look very posh
    	mixed in with larger framed prints and display the variety of different locations. These are not a flimsy poster
    	from a record store!</p>
      <div class="noTable">
		  
		  <?php 
		      $h = 0;
		      while ($h < 4) {
		        $row = mysql_fetch_assoc($PosterGallery);
		  ?>
		
			<div class='thumBox'>
				<a href="poster.php?ID=<?=$row['ID']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				</p>
				<a href="poster.php?ID=<?=$row['ID']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->

		  <?php 
		      ++$h;
		      } // ends the while loop
		  ?>
	   
	  </div> <!-- ends the "noTable div" -->
	<br />
	<a href="postergallery.php">View all the available collage posters>></a>
    <hr />
  </div>
  <p>These are only some of many great photographs available on this site.  Don't hesitate to check the <a href="search.php">search page</a>
	  for many more galleries and options to find just what you are looking for.</p>
  </div> <!-- ends the right column -->
  <?php 
	include("Includes/inc_quotes_plus.php");
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
 ?>
</div>
</body>
</html>
