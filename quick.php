 <?php
  session_start();
  include("Includes/inc_functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Quick Order Page for Gift Shops or The Discount or Hurried Shopper</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Quick order forms for hikephotos.com, best for returning customers, gift shops, and visitors in a hurray to check out." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/randomquotes.js"></script>
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
    <h1>Quick Ordering</h1>
      <p>This page is best for return customers already familiar with my products and in a hurry. For more details about my products, or to leisurely view individual photos, try the 
      <a href="search.php">Search</a> or <a href="galleries.php">Galleries</a> pages.</p>
    <h3>5" X 7" Flip Cards</h3>
      <img src="Pictures/CardsOnWall.jpg" alt="A variety of print sizes and styles hanging on a wall, including many flip cards."/>
      <p>Flip Cards are hand-cut, glued, and folded by yours truly, Andrew David. I use sturdy good quality card-stock in a variety of colors.<br />
      Below are preset options for them packs. If you do not see exactly what you want, yes you can <a href="contact.php">contact me</a>.<br />
      Card packs come without duplicates, so if you order a 25 card pack, you will receive 25 unique cards with 25 different photos.
      Background colors will be varied, unless you message me before I complete your order with a special request, such as, "put all the cards on black".<br />
      I choose colors carefully to accent the particular photo, and you can trust my good eye and judgement, in my humble opinion.
      </p>
      <p>I will likely offer post cards soon.</p>
      <img src="Pictures/CardsLayedOut.jpg" />
      <hr />
      <h3>10 Card Packs</h3>
        <p>10 Unique Cards from the theme of your choice. Lots of options. Packs are $25.00, for a price of $2.50 per card.</p>
	      <form method="post" action="cart.php">
			<p>
			  <select name="BuyCard10" class="button_left">
				  <option value="" selected="selected">10 Card Value Packs: $25.00 ($2.50 per card)</option>
				  <option value="1001 | Card10 | Utah">Utah Pack</option>
				  <option value="1001 | Card10 | Colorado">Colorado Pack</option>
				  <option value="1001 | Card10 | Sawtooths">Idaho Sawtooths Pack</option>
				  <option value="1001 | Card10 | Glacier NP">Glacier National Park Pack</option>
				  <option value="1001 | Card10 | Arizona">Arizona Pack</option>
				  <option value="1001 | Card10 | Washington">Washington Pack</option>
				  <option value="1001 | Card10 | Oregon">Oregon Pack</option>
				  <option value="1001 | Card10 | Nevada">Nevada Pack</option>
				  <option value="1001 | Card10 | Wind River">Wind River Pack</option>
				  <option value="1001 | Card10 | Tetons">Teton Pack</option>
				  <option value="1001 | Card10 | Wildlife">Wildlife Pack</option>
				  <option value="1001 | Card10 | Sunset">Sunset Pack</option>
				  <option value="1001 | Card10 | Desert">Desert Pack</option>
				  <option value="1001 | Card10 | Waterfall">Waterfall Pack</option>
				  <option value="1001 | Card10 | Icefall">Icefall Pack</option>
				  <option value="1001 | Card10 | Reflections">Reflections Pack</option>
				  <option value="1001 | Card10 | Wildflower">Wildflower Pack</option>
				  <option value="1001 | Card10 | Tulip">Tulip Pack</option>
				  <option value="1001 | Card10 | Forest">Forest Pack</option>
				  <option value="1001 | Card10 | Autumn">Autumn Pack</option>
				  <option value="1001 | Card10 | Winter">Winter Pack</option>
				  <option value="1001 | Card10 | Summits">Summit View Pack</option>
				  <option value="1001 | Card10 | Sunrise/Sunset">Sunrise/set Pack</option>
			  </select>&nbsp;
				<input type="hidden" name="card10-submitted" value="yes" /> 
				<input type="submit" name="submit-card10" value="Add to Cart" class="button_right"/>
			</p>
		  </form>
		<h3>25 Card Packs</h3>  
		   <p>25 unique cards from the category of your choice. These packs are $50 each, or $2 per card. Still many options.</p>
		   <form method="post" action="cart.php">
			<p>
			  <select name="BuyCard25" class="button_left">
				  <option value="" selected="selected">25 Card Value Pack Options: $50.00 ($2 per card)</option>
				  <option value="1001 | Card25 | Utah">Utah Pack</option>
				  <option value="1001 | Card25 | Colorado">ColoradoPack</option>
				  <option value="1001 | Card25 | Sawtooths">Sawtooths Pack</option>
				  <option value="1001 | Card25 | Glacier NP">Glacier NP Pack</option>
				  <option value="1001 | Card25 | Southwest">Southwest Pack</option>
				  <option value="1001 | Card25 | Pac NW">Pacific Northwest Pack</option>
				  <option value="1001 | Card25 | Wyoming">Wyoming Pack</option>
				  <option value="1001 | Card25 | Wildlife">Wildlife Pack</option>
				  <option value="1001 | Card25 | Wildflower">Wildflower Pack</option>
				  <option value="1001 | Card25 | Reflections">Reflections Pack</option>
				  <option value="1001 | Card25 | Waterfall/Icefall">Waterfall and Icefall Pack</option>
				  <option value="1001 | Card25 | Desert">Desert Pack</option>
				  <option value="1001 | Card25 | Autumn/Winter">Autumn/Winter Pack</option>
			  </select>&nbsp;
				<input type="hidden" name="card25-submitted" value="yes" /> 
				<input type="submit" name="submit-card25" value="Add to Cart" class="button_right"/>
			</p>
		  </form>
		   
	   <h3>50 Card Packs</h3>	
	     <p>50 unique cards in the category of your choice.
	     I have fewer options on these listed, due to my no duplicates policy. These are $75, or $1.50 per card.</p>	
	     <p>For larger orders, or special instructions,<a href="contact.php">contact me</a> for now. I will improve this page to allow for further discounts and custom options in the future, but 
	     that will get complicated and for now, an old-fashioned phone call or email makes more sense for my business.</p>	  
		 <form method="post" action="cart.php">
			<p>
			  <select name="BuyCard50" class="button_left">
				  <option value="" selected="selected">50 Card Value Pack Options: $75.00 ($1.50 each)</option>
				  <option value="1001 | Card50 | Utah">Utah Pack</option>
				  <option value="1001 | Card50 | Rockies">Rocky Mountain Pack</option>
				  <option value="1001 | Card50 | Southwest">Southwest Pack</option>
				  <option value="1001 | Card50 | Pacific NW">Pacific NW Pack</option>
				  <option value="1001 | Card50 | Wildflower">Wildflower Pack</option>
				  <option value="1001 | Card50 | Autumn/Winter">Autumn/Winter Pack</option>
				  <option value="1001 | Card50 | Desert">Desert Pack</option>
			  </select>&nbsp;
				<input type="hidden" name="card50-submitted" value="yes" /> 
				<input type="submit" name="submit-card50" value="Add to Cart" class="button_right"/>
			</p>
		  </form>
		 
	   <h3>Collage Poster Bundles</h3>	
	     <img src="Pictures/PosterPack.jpg" alt="A trio of rolled, wrapped collage posters laid out." />
	     <p>These collage posters are printed on premium thick paper with black border and trim.<br />
	     My in-stock designs have 25-30 unique photos arranged to show a theme or location to maximum impact.
	     To peruse the posters in my lineup for this year, check out the <a href="poster.php">Poster Gallery Page</a>.</p>
		 <p>Posters are on sale until I clear out my stock. Then I will offer custom designs.These just have not been a great seller for me.
		 They look great on any wall though, and are a very affordable way to enjoy a broad spectrum of my nature photography.</p>
		 <form method="post" action="cart.php">
		   <p>
			   <select name="BuyPoster3" class="button_left">
				  <option value="" selected="selected">Collage Poster Bundle Options</option>
				  <option value="1002 | Pstr3 | Utah">20" X 30" Collage 3 Pack, Utah Theme: $20</option>
				  <option value="1002 | Pstr3 | Southwest">20" X 30" Collage 3 Pack, Southwest Theme: $20</option>
				  <option value="1002 | Pstr3 | Wasatch">20" X 30" Collage 3 Pack, Wasatch Mountains: $20</option>
		       </select>&nbsp;
		        <input type="hidden" name="poster3-submitted" value="yes" /> 
				<input type="submit" name="submit-poster3" value="Add to Cart" class="button_right"/>
		  </p>
		</form>
		<div class="centerfloat redgreytear">
		  <h3>Additional Details</h3>
			<p>Free shipping on orders in the United States.</p> 
		    <p>Most orders will be completed and shipped within 7 days.</p>
		    <p>Please allow 2-3 weeks for production and delivery of large orders or those that include metallic prints.</p>
	    </div>
  </div>
  <div id="quotenotes">
	  <p>"To be sinless is to be small."</p>
  </div>
  <hr width="20%" align="right" class="hidesmall" />
  <hr width="40%" align="right" class="hidesmall" />
  <hr width="60%" align="right" class="hidesmall" />
  <hr width="80%" align="right" class="hidesmall" />
    <div class="smallnav">
		&nbsp;
		<nav>
		  <ul>
		   <li><a href="index.php">Home</a></li>
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
	<?php 
		//define('thefooter', TRUE);
		include("Includes/inc_footer.php"); ?>
</div>
</body>
</html>  
