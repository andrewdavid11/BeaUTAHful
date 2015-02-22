<?php 
  include("Includes/inc_db.php");
  
  $x = isset($_POST['simple-search-value']) ? htmlspecialchars($_POST['simple-search-value']) : '';
  $x = trim($x);
  $x = stripslashes($x);
  $x = str_replace(",", "", $x);
  
  $y = isset($_POST['ad-locate']) ? htmlspecialchars($_POST['ad-locate']) : '';
  $y = trim($y);
  $y = stripslashes($y);
  $y = str_replace(",","", $y);
  
  $z = isset($_POST['ad-color']) ? htmlspecialchars($_POST['ad-color']) : '';
  if (!empty($z)) {
    $z = trim($z);
    $z = stripslashes($z);
    $z = str_replace(",","", $z);
    } 
  else 
    $z = 99;
  
  $w = isset($_POST['ad-animal']) ? htmlspecialchars($_POST['ad-animal']) : '';
  if (!empty($w)) {
    $w = trim($w);
    $w = stripslashes($w);
    $w = str_replace(",","", $w);
  }
  else
    $w = 88;
  
  $v = isset($_POST['ad-key']) ? htmlspecialchars($_POST['ad-key']) : '';
  if (!empty($v))
    $v = trim($v);
    $v = stripslashes($v);
    $v = str_replace(",","", $v);
  }
  else
    $v = 77;
  
  $CustomGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$x%' OR keyword LIKE '%$x%' OR description LIKE '%$x%' OR title LIKE '%$x%') AND orientation NOT LIKE '%W%'");
  $CustomPanGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$x%' OR keyword LIKE '%$x%' OR description LIKE '%$x%' OR title LIKE '%$x%') AND orientation = 'W'");
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Custom Search Page for all Pictures and Prints by Web Designer Andrew David</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Custom Search Returns of Hiking, Adventure, and Wilderness Photo Galleries from Utah, Idaho, Washington, Oregon, Arizona, and Nevada, including the Rocky Mountains, Cascades, mountains, canyons and National Parks of the West: prints for sale by Andrew David." />
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
      <form method="post" action="customsearch.php" name="searchForm">
	    <p><input type="text" name="simple-search-value" class="input" placeholder="Your search term here"> 
		<input type="submit" name="simple-search-submit" value="Search"></p>
      </form>
    </div>
    
    <?php if(isset($_POST['simple-search-submit'])) {  
		//everything meant to happen when the simple search bar is used is contained within this if block
		    if (empty($x)) { ?>
				
				<div class="advancedSearchDiv">
					<h4 class="warning">You must enter a search term to use the Simple Search Tool Bar.</h4>
					<p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
				</div>
				
	<?php   } //ends the if block for an empty search submission
		    else if(is_null($CustomGallery) && is_null($CustomPanGallery)) { 
			  //can also try empty() but is_null seems to be most official in documentation
	?> 
				
				<div class="advancedSearchDiv">
				  <h1><?= ucfirst($x) ?> Gallery</h1>
		          <h4 class="warning">No results found. Try a new search above.</h4>
		          <p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
		        </div>
				
	<?php   } //ends the else if block for empty gallery returns
			else { 
	?>
			  <div class="noTable">
		<h1><?= ucfirst($x) ?> Gallery</h1>
	
	<?php while ($row = mysql_fetch_array($CustomGallery, MYSQL_BOTH)) {
		
	 ?>
	
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
		
	<?php } 
	   // ends the php script that holds the first while loop for non-panoramas 
	?>
			
			   <br />
			</div> <!-- ends the first noTable div -->
			   
			<div class="noTable">   
	   
	<?php while ($row = mysql_fetch_array($CustomPanGallery, MYSQL_BOTH)) { ?>
			
			<div class='thumBoxPan'>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image']?>" alt="<?=$row['description'] ?>"/></a> 
			  <p><strong><?=$row['title']?></strong><br />
			  <?=$row['location']?></p>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
	  
	 <?php } 
	   // ends the block that holds the second while loop for panoaramas only
	 ?>
	 
		  <br />
	   </div> <!--ends the second noTable div-->
		
				
	<?php	} //ends the else block for all other conditions, specifically positive returns to a custom simple search
			  //will display the gallery called by the custom search form
		
          } //ends the if block holding everything related to the simple search bar form
	      else if (isset($_POST['advanced-search-submit'])) { 
		  //everything meant to happen when the advanced search form is used is contained within this else if block
		    if(empty($y) && empty($z) && empty($w) && empty($v)) { 
	?>
				
				<div class="advancedSearchDiv">
					<h4 class="warning">You must enter at least one search term to use the Advanced Search Tool.</h4>
					<p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
				</div>
				
	<?php	} //closes the else if block for a submitted advanced form with no values at all
			else {
				if(is_null($y)) { //if a location was not entered, then the queries below should be called
					$AdvancedGallery = mysql_query("SELECT * FROM images WHERE (description LIKE '%$z%' OR description LIKE '%$w%' OR keyword LIKE '%$w%' OR description LIKE '%$v%' OR keyword LIKE '%$v%') AND orientation NOT LIKE 'W'");
					$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE (description LIKE '%$z%' OR description LIKE '%$w%' OR keyword LIKE '%$w%' OR description LIKE '%$v%' OR keyword LIKE '%$v%') AND orientation = 'W'");
				} //close the if block for no location entered
			    else if(!empty($y) { //if a location was entered, then the queries below should be called
					$AdvancedGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (description LIKE '%$z%' OR description LIKE '%$w%' OR description LIKE '%$v%' OR keyword LIKE '%$v%') AND orientation NOT LIKE 'W'");
					$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (description LIKE '%$z%' OR description LIKE '%$w%' OR description LIKE '%$v%' OR keyword LIKE '%$v%') AND orientation = 'W'");
				} //close the else if block for a location entered
				if(is_null($AdvancedGallery) && is_null($AdvancedPanGallery)) {
				//controls cases where the advanced search form is submitted with proper entries but the result set is empty
			 
	?>
	
				<div class="advancedSearchDiv">
				  <h1>Advanced Custom Gallery</h1>
		          <h4 class="warning">No results found. Try a new search above.</h4>
		          <p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
		        </div>
	        
	
	<?php      } //ends the if block to control empty result sets from correctly submitted advanced searches
			   else if(!is_null($AdvancedGallery) && !is_null($AdvancedPanGallery)){
		        //this else if block controls all gallery image displays
		        //below this line there is an open else block containing the last above else if, and this else if block
	
	?>
	
			<div class="noTable">
				<h1><?= ucfirst($) ?> Gallery</h1>
	
	<?php 			while ($row = mysql_fetch_array($AdvancedGallery, MYSQL_BOTH)) {
		              //this is contained within the else if block
	 ?>
	
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
		
	<?php
					} // ends the first while loop for non-panoramas 
	 ?>
			 
			   <br />
			</div>
			   
			<div class="noTable">   
	   
	<?php 			while ($row = mysql_fetch_array($AdvancedPanGallery, MYSQL_BOTH)) { 
						//this second while loop is contained within an else if block
	?>
			
			<div class='thumBoxPan'>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image']?>" alt="<?=$row['description'] ?>"/></a> 
			  <p><strong><?=$row['title']?></strong><br />
			  <?=$row['location']?></p>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
	  
	 <?php 			} // ends the second while loop for only panoramas 
	 ?>
			 
				<br />
			</div> <!--ends the second noTable div for only panoramas-->
	
	<?php   } //ends the else if block for advanced searches not producing empty sets
	      } //ends the else block for advanced searches that are properly submitted
	    } //closes the entire else if statement for the advanced search bar
	    else {
		  echo "Happy Holidays.";	
		}
	?>
		  
  </div> <!-- ends my 'rightColumn' -->
  <?php 
	include("Includes/inc_quotes_plus.php");
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
  ?>
</div>
</body>
</html>
