<?php 
    include("Includes/inc_db.php");
    include("Includes/inc_functions.php");
    $ID = $_GET['ID_num'];
    $DBTap = mysql_query("SELECT * FROM images WHERE ID_num=$ID");
    $ThisPic = mysql_fetch_array($DBTap, MYSQL_BOTH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>HikePhotos.com Image Viewer and Order Page</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1401px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="keywords" content="Utah, Idaho, Sawtooths, Wasatch, Glacier, GNP, Rockies, Rocky Mountains, mountain, photography, fine art, prints, Andrew David" />
  <meta name="description" content="Ordering page for all photos on hikephotos.com by Web Designer Andrew David. Title, description, location, details, price and size options for photos populated dynamically using php and AJAX." />
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
    <div class="bigPicWrap">
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
	   <h3>Order a Print of This Photo</h3>
	   <p>All photos are printed on premium paper with a matte finish at a professional studio. A matte finish helps reduce glare,
	   especially when framed.<br />
	   The back of each photo is signed. These cards are cut, glued, and assembled by hand.</p>
	  <form method="post" action="cart.php">  
	  	<p>
	    <select name="BuyPrint" class="button_left">
	      <option value="" selected="selected">Print Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt1 |">8" X 10" Print : $25.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt2 |">11" X 14" Print : $40.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt3 |">12" X 16" Print: $50.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt4 |">16" X 20" Print : $75.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt5 |">18" X 24" Print : $100.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt6 |">20" X 30" Print: $125.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt7 |">24" X 32" Print : $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt8 |">30" X 40" Print: $200.00</option>
		</select>&nbsp;
		<input type="hidden" name="print-submitted" value="yes" />
		<input type="submit" name="submit-print" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form>
	  <h3>Order a Canvas of This Photo</h3>
	   <p>All canvas prints are done on premium thick weave fiber board. These can be framed, but are typically hung without framing, so the cost of the canvas can be somewhat offset by saving on framing.<br />
	   Canvases will ship in a solid box, insured.<br />
	   The back of each canvas is signed,along the edge. The photo will wrap around, so the edges contain part of the print.</p>
	  <form method="post" action="cart.php">
	  	<p>
	    <select name="BuyCanvas" class="button_left">
	      <option value="" selected="selected">Canvas Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can1 |">12" X 16" Canvas : $75.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can2 |">16" X 20" Canvas : $100.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can3 |">18" X 24" Canvas : $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can4 |">20" X 30" Canvas : $200.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can5 |">24" X 32" Canvas : $250.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can6 |">30" X 40" Canvas : $350.00</option>
		</select>&nbsp;
		<input type="hidden" name="canvas-submitted" value="yes" />
		<input type="submit" name="submit-canvas" value="Add to Cart" class="button_right"/>
		<br /></p>
	  </form>
	  <h3>Order A Metal Print of This Photo</h3>
	    <p>All metal prints are done on a single sheet of aluminum.<br />
	    The print is not "painted" onto the metal, so the entire sheet can be dry or wet washed as needed.<br />
	    This is a premium look, suitable with frame, or unframed.<br />
	    Metal prints will ship in a solid box, insured.<br />
		The back of each metal print is signed.</p>
	     <form method="post" action="cart.php">
	  	<p>
	    <select name="BuyMetal" class="button_left">
	      <option value="" selected="selected">Metal Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met1 |">8" X 10" Metal : $100.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met2 |">11" X 14" Metal : $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met3 |">16" X 20" Metal : $200.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met4 |">24" X 30" Metal : $350.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met5 |">30" X 40" Metal : $500.00</option>
		</select>&nbsp;
		<input type="hidden" name="metal-submitted" value="yes" />
		<input type="submit" name="submit-metal" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form>
	  <h3>Order This Photo On a 5" X 7" Flip Card</h3>
	    <p>Many colors are available. This is a great way to sample or share a large number of photos.<br />
	    Flip cards come on heavyweight premium cardstock paper, with one envelope included for each card.<br />
	    They can be mailed with a standard stamp, or frame and hang them. No really. They are that nice.<br />
	    <a href="Pictures/CardFramed.jpg"><img src="Thumbs/CardFramed.jpg" alt="A 5" X 7" flip card hung on the wall above a lamp to good effect." /></a><br />
	    Single cards are <strong>$3.00 each</strong>. Or check out the <a href="Quick">Quick Order</a> Page for value pack options.<br />
	    Quick Order Value packs offer further discounts per card. The more you order, the more you save.</p>
	    <form method="post" action="cart.php"> 
	  	 <p>
	     <select name="BuyCard" id="BuyCard" class="button_left">
	      <option value="" selected="selected">Card Color Options</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Black">Black</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Red">Red</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Burgundy">Burgundy</option>		  
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | BtOrange">Bright Orange</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Orange">Crushed Orange</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Yellow">Yellow</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | DkGreen">Dark Green</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | LtGreen">Light Green</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Dkblue">Dark Blue</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Ltblue">Light Blue</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Purple">Purple</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | White">White</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Silver">Silver</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Grey">Grey</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Brown">Brown</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Tan">Tan</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | HotPink">Hot Pink</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | LtPink">Light Pink</option>
		  <option value="<?=$ThisPic['ID_num'] ?> | Card | Wild">Surprise Me!</option>
		</select>&nbsp;
		<input type="hidden" name="card-submitted" value="yes" /> 
		<input type="submit" name="submit-card" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form>
	  <div class=" centerfloatDetails redgreytearReverse">
	    <h3>Additional Details</h3>
		  <p>Free shipping on orders in the United States.</p>
	      <p>Please allow 3-4 weeks for production and delivery of canvas and metal orders.</p>
	      <p>Paper prints, posters, and cards will be processed faster and may ship earlier.</p>
	  </div>
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
  <?php include("Includes/inc_footer.php"); ?>
</div>
</body>
</html>
