<?php 
  include("Includes/inc_db.php");
  $q = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
  
  $Gallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$q%' OR keyword LIKE '%$q%') AND orientation NOT LIKE '%W%'");
  $PanGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$q%' OR keyword LIKE '%$q%') AND orientation = 'W'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Photography Search Page for all Pictures and Prints by Web Designer Andrew David</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Search Options through Hiking, Adventure, and Wilderness Photo Galleries from Utah, Idaho, Washington, Oregon, Arizona, and Nevada, including the Rocky Mountains, Cascades, mountains, canyons and National Parks of the West: prints for sale by Andrew David." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/randomquotes.js"></script>
  <script src="Scripts/AdvancedSearch.js"></script>
  </head>
<body onload="displayQuote();">
<div class="container">
  <div class="leftColumn">
  	<div class="logo">
 	  <a href="index.php"><img src="Thumbs/ShadowLogoSep.jpg" width="100" height="75" /></a>
 	</div>
    <nav>
	  <ul>
       <li class="onlymedium"><a href="index.php">Home</a></li>
	   <li><a href="about.php">About</a></li>
	   <li><a href="galleries.php">Galleries</a></li>
	   <li><a href="licensing.php">License/Prints</a></li>
	   <li><a href="blog" target="_blank">Blog</a></li> 
	   <li><a href="contact.php">Contact</a></li>
	   <li><a href="search.php">Search</a></li>
	   <li><a href="quick.php">Quick Orders</a></li>
	  </ul>	
    </nav>
  </div>
  <div class="rightColumn">
	<h1>Photography Search</h1>
    <div id="searchBar">
      <h2>Simple Custom Search</h2>
      <p>Enter any single term or location to create a custom gallery.<br />
      Or try a more <span onclick="displayAdvancedSearchForm()" style="cursor: default; text-decoration: underline;">Advanced Search</span>.
      </p>
      <form method="get" action="customsearch.php" name="searchForm">
	    <p><input type="text" name="simple-search-value" class="input" placeholder="Your search term here"> 
		<input type="submit" name="simple-search-submit" value="Search"></p>
      </form>
    </div>
	
	<?php if(empty($_GET['q']) ) { ?>
	<h2>Browse Galleries By Place or Theme</h2>
    <div id="places">
	  <div id="placesInner">
		  <h2>Places</h2>
		  <ul>
			<li><a href="search.php?q=Utah">Utah</a></li>
			  <ul>
				<li><a href="search.php?q=Wasatch%20Mountains">Wasatch Mountains</a></li>
				<li><a href="search.php?q=Zion%20National%20Park">Zion National Park</a></li>
				<li><a href="search.php?q=Escalante">Escalante</a></li>
				<li><a href="search.php?q=Bryce%20Canyon">Bryce Canyon</a></li>
				<li><a href="search.php?q=Capitol%20Reef">Capitol Reef National Park</a></li>
				<li><a href="search.php?q=Uinta%20Mountains">Uinta Mountains</a></li>
				<li><a href="search.php?q=Goblin%20Valley">Goblin Valley State Park</a></li>
			  </ul>
			<li><a href="search.php?q=Sawtooth%20Mountains">Sawtooths of Idaho</a></li>
			<li><a href="search.php?q=Pacific%20Northwest">Pacific Northwest</a></li>
			  <ul>
				<li><a href="search.php?q=Washington">Washington</a></li>
				  <ul>
					<li><a href="search.php?q=North%20Cascades">North Cascades</a></li>
					<li><a href="search.php?q=Olympic%20National%20Park">Olympic National Park</a></li>
					<li><a href="search.php?q=Mount%20Saint%20Helens">Mount Saint Helens</a></li>
					<li><a href="search.php?q=Mount%20Rainier">Mount Rainier</a></li>
				  </ul>
				<li><a href="search.php?q=Oregon">Oregon</a></li>
			  </ul>
			<li><a href="search.php?q=Glacier%20National%20Park"> Glacier National Park</a></li>
			<li><a href="search.php?q=Nevada">Nevada</a></li>
			  <ul>
			    <li><a href="search.php?q=Cathedral%20Gorge">Cathedral Gorge State Park</a></li>
				<li><a href="search.php?q=Great%20Basin">Great Basin National Park</a></li>
				<li><a href="search.php?q=Valley%20of%20Fire">Valley of Fire State Park</a></li>
			  </ul>
			<li><a href="search.php?q=Colorado">Colorado</a></li>
			<li><a href="search.php?q=Arizona">Arizona</a></li>
			  <ul>
				<li><a href="search.php?q=Grand%20Canyon">Grand Canyon</a></li>
				<li><a href="search.php?q=Antelope%20Canyon">Antelope Canyon</a></li>
			  </ul>
			<li><a href="search.php?q=Wyoming">Wyoming</a></li>  
			  <ul>
				<li><a href="search.php?q=Wind%20River%20Mountains">Wind River Mountains</a></li>
				<li><a href="search.php?q=Teton%20Mountains">Teton Mountains</a></li>
			  </ul>
			</ul>
			&nbsp;
		</div>
	</div>
    <div id="themes">
		<div id="themesInner">
		  <h2>Themes</h2>
		  <ul>
			<li><a href="search.php?q=Panorama"> Panoramas</a></li>
			<li><a href="search.php?q=Sunrise">Sunrise</a></li>
			<li><a href="search.php?q=Sunset">Sunset</a></li>
			<li><a href="search.php?q=Summit">Summit Views</a></li>
			<li><a href="search.php?q=Waterfall">Waterfalls</a></li>
			<li><a href="search.php?q=Icefall">Ice Falls</a></li>
			<li><a href="search.php?q=Flower">Wildflowers</a></li>
			  <ul>
				<li><a href="search.php?q=Tulip">Tulips</a></li>
			  </ul>
			<li><a href="search.php?q=Autumn">Autumn</a></li>
			<li><a href="search.php?q=Winter">Winter</a></li>
			<li><a href="search.php?q=Slot">Slot Canyons</a></li>
			<li><a href="search.php?q=Wildlife">Wildlife</a></li>
			  <ul>
				<li><a href="search.php?q=Goat">Mountain Goats</a></li>
				<li><a href="search.php?q=Butterfly">Butterflies</a></li>
				<li><a href="search.php?q=Deer">Deer</a></li>
			  </ul>
			<li><a href="search.php?q=Desert">Desert</a></li>
			<li><a href="search.php?q=Beach">Beaches</a></li>
			<li><a href="search.php?q=Forest">Forests</a></li>
			<li><a href="search.php?q=Lake">Lakes</a></li>
			  <ul>
				<li><a href="search.php?q=Reflection"> Reflections</a></li>
			  </ul>
			<li><a href="search.php?q=Black%20&%20White">Black and White</a></li>
			<li><a href="search.php?q=Storm">Stormy Weather</a></li>
			<li><a href="search.php?q=Text">Text, Quotes and Scriptures</a></li>
			<li><a href="postergallery.php">Collage Posters</a></li>
		  </ul>
		  &nbsp;
		</div>
	</div>

	<?php } else { ?>
	
	<div class="noTable">
		<h1><?= $q ?> Gallery</h1>
	
	<?php while ($row = mysql_fetch_array($Gallery, MYSQL_BOTH)) {
	         ?>
	
	    <div class='thumBox'>
		    <a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
			<p><strong><?=$row['title']?></strong><br />
			<?=$row['location']?></p>
			<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
		</div> <!-- ends the 'thumBox' div -->
		
	<?php
	   } // ends the php script that holds the first foreach loop for non-panoramas ?>
	   <br />
	</div>
	   
	<div class="noTable">   
	   
	<?php while ($row = mysql_fetch_array($PanGallery, MYSQL_BOTH)) { ?>
			
	    <div class='thumBoxPan'>
		  <a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image']?>" alt="<?=$row['description'] ?>"/></a> 
		  <p><strong><?=$row['title']?></strong><br />
		  <?=$row['location']?></p>
		  <a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
		</div> <!-- ends the 'thumBox' div -->
	  
	 <?php // }// ends the if clause for the second foreach loop to catch and display panoramas
	     } // ends the php script that holds the second foreach loop for panoarams ?>
		<br />
	</div> <!--ends the noTable div-->
	
	<?php } ?> <!-- ends the else clause that displays when q has a value -->
	
</div> <!-- ends my 'rightColumn' -->
  
	
<?php 
	include("Includes/inc_quotes_plus.php");
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
 ?>
</div>
</body>
</html>
