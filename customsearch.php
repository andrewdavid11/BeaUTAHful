<?php 
  include("Includes/inc_db.php");
  include("Includes/inc_functions.php");
  
  $x = isset($_GET['simple-search-value']) ? mysql_real_escape_string($_GET['simple-search-value']) : '';
  
  $y = isset($_GET['ad-locate']) ? mysql_real_escape_string($_GET['ad-locate']) : '';

  
  $z = isset($_GET['ad-animal']) ? mysql_real_escape_string($_GET['ad-animal']) : '';

  
  $v = isset($_GET['ad-key']) ? mysql_real_escape_string($_GET['ad-key']) : '';
  


  
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
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">
	<div class="cart_icon">
	  <p><?=displayCartCount()?></p>
	  <a href="cart.php"><img src="Thumbs/cart1.png" width="75" height="75" /></a>
 	</div>
	<h1>Photography Search</h1>
    <div id="searchBar">
      <h2>Simple Custom Search</h2>
      <p>Enter any single term or location to create a custom gallery.<br />
      Or try a more <span onclick="displayAdvancedSearchForm()" style="cursor: default; text-decoration: underline;">Advanced Search</span>.
      </p>
      <form method="get" action="customsearch.php" name="searchForm">
	    <p><input type="text" name="simple-search-value" class="input" placeholder="Your search term here"> 
		<input type="submit" name="simple-search-submit" value="Search" class="button"></p>
      </form>
    </div>
    
    <?php if(isset($_GET['simple-search-submit'])) {  
		//everything meant to happen when the simple search bar is used is contained within this if block
		    if (empty($x)) { ?>
				
				<div class="advancedSearchDiv">
					<h4 class="warning">You must enter a search term to use the Simple Search Tool Bar.</h4>
					<p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
				</div>
				
	<?php   } //closes the control block for when x is empty
	        else {
				 $CustomGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$x%' OR keyword LIKE '%$x%' OR description LIKE '% $x %' OR title LIKE '%$x %') AND orientation NOT LIKE 'W'");
				 $CustomPanGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$x%' OR keyword LIKE '%$x%' OR description LIKE '% $x %' OR title LIKE '%$x %') AND orientation = 'W'");
			     $TF = mysql_data_seek($CustomGallery, 0); //will be true or false
			     $TFpan = mysql_data_seek($CustomPanGallery, 0); //will be true or false
			     if($TF == false && $TFpan == false) { //works!!
			
	?> 
				
				<div class="advancedSearchDiv">
				  <h1><?= ucfirst($x) ?> Gallery</h1>
		          <h4 class="warning">No results found. Try a new search above.</h4>
		          <p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
		        </div>
		
	<?php       } //ends the if for an empty query resultset return
		        else {
	?>
	     <!-- Everything below in this html will display positive simple search gallery returns just like on the original search page -->
			   <div class="noTable">
				 <h1><?= ucfirst($x) ?> Gallery</h1>
	
	<?php while ($row = mysql_fetch_array($CustomGallery, MYSQL_ASSOC)) {
	         ?>
	
	    <div class='thumBox'>
		    <a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
			<p><strong><?=$row['title']?></strong><br />
			<?=$row['location']?></p>
			<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
		</div> <!-- ends the 'thumBox' div -->
		
	<?php
	   } // ends the while loop for non-panoramas ?>
	   <br />
	</div>
	   
	<div class="noTable">   
	   
	<?php while ($row = mysql_fetch_array($CustomPanGallery, MYSQL_ASSOC)) { ?>
			
	    <div class='thumBoxPan'>
		  <a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image']?>" alt="<?=$row['description'] ?>"/></a> 
		  <p><strong><?=$row['title']?></strong><br />
		  <?=$row['location']?></p>
		  <a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
		</div> <!-- ends the 'thumBox' div -->
	  
	 <?php 
	     } // ends the second while loop for panoramas ?>
		<br />
	</div> <!--ends the noTable div-->
	
	<?php		} //ends the else for positive returned gallery sets
		     } //ends the else for properly submitted forms where $x is not empty
          } //closes the isset control structure for the simple search form
          if (isset($_GET['advanced-search-submit'])) { //advanced search form follows
		    if(empty($y) && empty($z) && empty($v)) { 
	 ?>
				
				<div class="advancedSearchDiv">
					<h4 class="warning">You must enter at least one search term to use the Advanced Search Tool.</h4>
					<p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
				</div>
				
	<?php	} //closes the if block for a submitted advanced form with no values at all
	        else {
				//the following mess of 7 scenarios should be changed to a case at some point so there could be breaks built in, but I don't know how to do that when feeding from a form just yet
			  if(!empty($y) && empty($z) && empty($v)) {
				 $AdvancedGallery = mysql_query("SELECT * from images WHERE location LIKE '%$y%' OR title LIKE '%$y %' OR description LIKE '% $y %' AND orientation NOT LIKE 'W'");
				 $AdvancedPanGallery = mysql_query("SELECT * from images WHERE location LIKE '%$y%' OR title LIKE '%$y %' OR description LIKE '% $y %' AND orientation = 'W'");
			  } //close the block for location only -debugged, working
			  elseif(!empty($y) && !empty($z) && empty($v)) {
				$AdvancedGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND orientation NOT LIKE 'W'");
				$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND orientation = 'W'"); 
			  } //close the block for location and animal, no keyword or color -debugged, working
			  elseif(!empty($y) && empty($z) && !empty($v)) {
				 $AdvancedGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (title LIKE '%$v %' OR description LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation NOT LIKE 'W'");
				 $AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE location LIKE '%$y%' AND (title LIKE '%$v %' OR description LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation = 'W'");
			  } //close the block for location, no animal, and keyword or color
			  elseif(empty($y) && !empty($z) && empty($v)) {
				$AdvancedGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND orientation NOT LIKE 'W'");
				$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND orientation = 'W'");
			  } //close the block for no location, an animal, and no keyword or color
			  elseif(empty($y) && !empty($z) && !empty($v)) {
				$AdvancedGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$v %' OR description LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation NOT LIKE 'W'");
				$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$v %' OR description LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation = 'W'");
			  } //close the block for nothing entered but a keyword or color
			  elseif(empty($y) && !empty($z) && !empty($v)) {
				$AdvancedGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND (title LIKE '% $v %' OR description LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation NOT LIKE 'W'");
				$AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND (title LIKE '% $v %' OR descrption LIKE '% $v %' OR keyword LIKE '%$v%') AND orientation = 'W'");
		      } //close the block for no location, an animal, and a keyword or color
		      elseif (!empty($y) && !empty($z) && !empty($v)) {
				 $AdvancedGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$y%' AND (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND (title LIKE '%$v %' OR description LIKE '% $v %' or keyword LIKE '%$v%')) AND orientation NOT LIKE 'W'");
				 $AdvancedPanGallery = mysql_query("SELECT * FROM images WHERE (location LIKE '%$y%' AND (title LIKE '%$z %' OR description LIKE '% $z %' OR keyword LIKE '%$z%') AND (title LIKE '%$v %' OR description LIKE '% $v %' or keyword LIKE '%$v%')) AND orientation = 'W'");
			  } //final block where every field has been given a value- complicated, very specific, a string of ANDs
			  $TF = mysql_data_seek($AdvancedGallery, 0);
			  $TFpan = mysql_data_seek($AdvancedPanGallery, 0);
			  if($TF == false && $TFpan == false){
				  
	?> 
				
				<div class="advancedSearchDiv">
				  <h1>Your Advanced Search Gallery</h1>
		          <h4 class="warning">No results found. Try a new search above.</h4>
		          <p>Or browse many galleries organized by <a href="search.php">Locations and Themes.</a></p>
		        </div>
		
	<?php    
				  
			  } //closes the if for false $TF and $TFpan- meaning empty returnsets
			  else {
	?>
	
	         <!-- Everything below in this html will display positive simple search gallery returns just like on the original search page -->
			   <div class="noTable">
				 <h1>Your Advanced Search Gallery</h1>
				 
	<?php
	          while ($row = mysql_fetch_array($AdvancedGallery, MYSQL_ASSOC)) {
	?>
	
	
			<div class='thumBox'>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['description'] ?>" /></a>
				<p><strong><?=$row['title']?></strong><br />
				<?=$row['location']?></p>
				<a href="photo.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
		
	<?php
		   } // ends the while loop for non-panoramas ?>
		   
			   <br />
			</div>
			   
			<div class="noTable">   
	   
	<?php 
		  while ($row = mysql_fetch_array($AdvancedPanGallery, MYSQL_ASSOC)) { 
			  
	?>
			
			<div class='thumBoxPan'>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>"><img src="Thumbs/<?=$row['image']?>" alt="<?=$row['description'] ?>"/></a> 
			  <p><strong><?=$row['title']?></strong><br />
			  <?=$row['location']?></p>
			  <a href="panorama.php?ID_num=<?=$row['ID_num']?>">View Full Size Now</a>
			</div> <!-- ends the 'thumBox' div -->
	  
	 <?php 
			 } // ends the second while loop for panoramas 
			 
	?>
				<br />
			</div> <!--ends the noTable div-->
			
	
	<?php
			     } //closes the else block for positive results (non empty sets)  
			  } //closes the else block that controls all advanced searches run with at least one value properly entered
			} //closes the isset for all advanced search forms- last brace for advanced searches
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
