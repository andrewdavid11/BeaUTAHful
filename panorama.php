<?php 
    include("Includes/inc_db.php");
    $ID = $_GET['ID_num'];
    $DBTap = mysql_query("SELECT * FROM images WHERE ID_num=$ID");
    $ThisPic = mysql_fetch_array($DBTap, MYSQL_BOTH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>HikePhotos.com Panorama Image Viewer and Order Page</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1401px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="keywords" content="Utah, Grand Canyon, Sawtooths, Wasatch, GNP, National Park, Rocky Mountains, mountain, photography, fine art, prints, Andrew David" />
  <meta name="description" content="Adventure and Wilderness Panorama Galleries from Utah, the Pacific Northwest, the Grand Canyon, and the Rocky Mountains and Canyons of the West: prints for sale by Andrew David." />
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
    <a class="buy_now" href="#buy_now">Buy This Pic</a></p>
    <div class="bigPicWrapPan">
	  <img src="Pictures/<?=$ThisPic['image'] ?>" alt="<?=$ThisPic['keyword'] ?>" />
    </div>
	<div id="DBTap" class="redtear">
	  <h1><?=$ThisPic['title'] ?></h1>
	  <h2><?=$ThisPic['location'] ?></h2>
	  <p><?=$ThisPic['description'] ?></p>
	</div>
	<hr />
	<div class="orderForms">
	   <a name="buy_now"></a>
	   <h3>A Note About Buying My Panoramas</h3>
	     <p>I love long sweeping panorama prints. Some of my favorite pictures over the years have been this type of shot.
	     They do, of course, run in different proportions and sizes than standard prints . Many frame or art shops
	     will carry 10" X 20", 12" X 24" or 12" X 36" frames.</p>
	     <p>Please read the description I have provided for each panorama print. I included a note about what size to order 
	     for each particular photo. Some are 2:1 length to height and some are 3:1. I do also have a very few extra wide
	     panoramas that are in 4:1 ratio. Those extra long panoramas will come as 2 separate 2:1 prints, so that
	     no special-order frame will be required. This also allows for "cornering" the panorama, putting each half on a different wall.</p>
	     <p>If you have any questions, of course, <a href="contact.php">contact me</a></p>
	   <h3>Order a Print of This Panorama</h3>
		   <p>All panoramas are printed on premium paper with a matte finish at a professional studio.<br />
		   Panoramas are then rolled in a protective plastic poster sleeve and shipped in a sturdy tube, insured.<br />
		   The back of each photo is signed.</p>
		  <form method="post" action="cart.php" >
			<p>
			<select name="BuyPano" class="button_left">
			  <option value="" selected="selected">Panorama Print Options</option>
			  <option value="<?=$ThisPic['ID_num']?> | Pan1 |">12" X 24" Print : $75.00</option>
			  <option value="<?=$ThisPic['ID_num']?> | Pan2 |">12" X 36" Print : $100.00</option>
			  <option value="<?=$ThisPic['ID_num']?> | Pan3 |">12" X 48" Print : $200.00</option>
			</select>&nbsp;
			<input type="hidden" name="pano-submitted" value="yes" />
			<input type="submit" name="submit-pano" value="Add to Cart" class="button_right" />
			<br /></p>
		  </form>
	  <h3>Order a Canvas of this Panorama</h3>
		   <p>All canvas panoramas are printed on premium thick-weave fiber board.<br />
		   Canvases are shipped in a solid box, insured.<br />
		   The back of each canvas is signed along the edge.</p>
		  <form method="post" action="cart.php" >
			<p>
			<select name="BuyCanPan" class="button_left">
			  <option value="" selected="selected">Canvas Panorama Options</option>
			  <option value="<?=$ThisPic['ID_num']?> | CanPan1 |">16" X 32" Canvas : $150.00</option>
			  <option value="<?=$ThisPic['ID_num']?> | CanPan2 |">16" X 48" Canvas : $200.00</option>
			</select>&nbsp;
			<input type="hidden" name="canpan-submitted" value="yes" />
			<input type="submit" name="submit-canpan" value="Add to Cart" class="button_right" />
			<br /></p>
		  </form>
	 <h3>Order a Metal Print of this Panorama</h3>
	       <p>All metal prints are done on a single sheet of aluminum.<br />
	       The print is not "painted" onto the metal, so the entire sheet can be dry or wet washed as needed.<br />
	       This is a premium look, suitable with frame, or unframed.<br />
		   Metal prints will ship in a solid box, insured.<br />
		   The back of each metal print is signed.</p>
		  <form method="post" action="cart.php" >
			<p>
			<select name="BuyMetPan" class="button_left">
			  <option value="" selected="selected">Metal Panorama Options</option>
			  <option value="<?=$ThisPic['ID_num']?> | MetPan1 |">10" X 20" Metal : $150.00</option>
			  <option value="<?=$ThisPic['ID_num']?> | MetPan2 |">12" X 36" Metal : $250.00</option>
			</select>&nbsp;
			<input type="hidden" name="metpan-submitted" value="yes" />
			<input type="submit" name="submit-metpan" value="Add to Cart" class="button_right" />
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
