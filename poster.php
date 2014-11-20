<?php 
    include("Includes/inc_db.php");
    $ID = $_GET['ID'];
    $DBTap = mysql_query("SELECT * FROM posters WHERE ID LIKE '%$ID%'");
    $ThisPoster = mysql_fetch_array($DBTap, MYSQL_BOTH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>HikePhotos.com Collage Poster Viewer and Order Page</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1301px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="keywords" content="Utah, Grand Canyon, Sawtooths, Wasatch, Pacific Northwest, Southwest, collage, Rocky Mountains, mountain, photography, fine art, prints, Andrew David" />
  <meta name="description" content="Adventure and Wilderness Poster Gallery from Utah, Idaho, Washington, Nevada, the Pacific Northwest, the Grand Canyon, and the Rocky Mountains and Canyons of the West: prints for sale by Andrew David." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  </head>
<body onload="displayQuote();">
<div class="container">
 <div class="leftColumn">
 	<div class="logo">
      <a href="index.php"><img src="Thumbs/ShadowLogoSep.jpg" width="100" height="75" /></a>
    </div>
   <nav>
	  <ul>
	   <li class="onlymedium"><a href="home.php">Home</a></li>
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
    <p><span class="return" onclick="history.go(-1);return true;">Go Back</span>
    <a class="buy_now" href="#buy_now">Buy This Poster</a></p>
    <div class="bigPicWrap">
	  <img src="Pictures/<?=$ThisPoster['image'] ?>" alt="<?=$ThisPoster['description'] ?>" />
    </div>
	<div id="DBTap" class="redtear">
	  <h1><?=$ThisPoster['title'] ?></h1>
	  <p><?=$ThisPoster['description'] ?></p>
	</div>
	<hr />
	<div class="orderForms">
	   <a name="buy_now"></a>
	   <h3>Order a Print of This Collage</h3>
		   <p>These 20" X 30" collages come on a premium thick paper, with black border. <br />
		   Collage posters come rolled in plastic and are mailed in a protective tube.</p>
	       <p>No photo appears on more than one poster. There is no repetition.</p>
	       <p>Collage Posters sell for $20 each. Or order a set of 3 for only $40 through the <a href="quick.php">Quick Order</a>Page.
	       </p>
           <p>New collage designs will be available after I reduce my backstock. Custom posters are available. Contact me with your idea or request.</p>
	  <form method="post" action="cart.php" >   ?> 
	  	<p>
	    <select name="BuyPoster" class="button_left">
	      <option value="">Collage Options</option>
		  <option value="<?=$ThisPoster['ID']?> | Pstr |">20" X 30" Collage, This Poster Only : $20.00</option>
		</select>&nbsp;
		<input type="hidden" name="poster-submitted" value="yes" />
		<input type="submit" name="submit-poster" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form> 
	  <div class="centerfloat redgreytear">
	    <h3>Additional Details</h3>
		  <p>Free shipping on orders in the United States.</p> 
		  <p>Please allow 3-4 weeks for production and delivery of canvas and metal orders.</p>
	      <p>Paper prints, posters, and cards will be processed faster and may ship earlier.</p>
	  </div>   
	</div>
  </div>
    <div id="quotenotes">
	  <p>"Life without ropes."</p>
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
  <?php include("Includes/inc_footer.php"); ?>
</div>
</body>
</html>
