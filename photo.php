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
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Ordering page for all photos on hikephotos.com. Title, description, location, details, price and size options for photos populated dynamically using php and AJAX." />
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
	<div class="cart_icon">
	  <p><?=displayCartCount()?></p>
	  <a href="cart.php"><img src="Thumbs/cart1.png" width="75" height="75" /></a>
 	</div>  
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
	   <h3>Order This Photo on a 4" X 6" Postcard</h3>
	   <p>I print postcards at home. This is my most affordable option, and is a great way to share my nature photography
	   with your friends and family.<br />
	   Postcards are $1.50 each, and are discounted when bought in larger numbers.<br />
	   Check out the <a href="Quick">Quick Order</a> Page for variety packs and savings.
	   </p>
	   <form method="post" action="cart.php">
	     <p>
	     <select name="BuyPostCard" id="BuyPostCard" class="button_left">
	       <option value="" selected="selected">PostCard Options</option>
	       <option value="<?=$ThisPic['ID_num'] ?> | PostCard |">Single PostCard: $1.50</option>
	     </select>&nbsp;
	     <input type="hidden" name="postcard-submitted" value="yes" /> 
		 <input type="submit" name="submit-postcard" value="Add to Cart" class="button_right" />
	     <br /></p>
	   </form>
	   <h3>Order This Photo On a 5" X 7" Flip Card</h3>
	    <p>Many colors are available. This is a great way to sample or share a large number of photos.<br />
	    Flip cards come on heavyweight premium cardstock paper, with one envelope included for each card.<br />
	    They can be mailed with a standard stamp, or frame and hang them. No really. They are that nice!<br />
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
	   <h3>Order a Mounted Print of This Photo</h3>
	   <p>All photos are printed on premium Kodac Luster paper with a matte finish at a local, independent, professional studio. <br />
	   Prints are mounted to hard board and corners are padded and protected during shipping. The back of each photo is signed.<br />
	   These traditional prints should be framed before hanging to protect them and extend their life.</p>
	  <form method="post" action="cart.php">  
	  	<p>
	    <select name="BuyPrint" class="button_left">
	      <option value="" selected="selected">Print Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt1 |">8" X 10" Print : $40.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt2 |">11" X 14" Print : $60.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt3 |">12" X 18" Print: $75.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt4 |">16" X 20" Print : $100.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt5 |">18" X 24" Print : $125.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt6 |">20" X 30" Print: $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt7 |">24" X 36" Print : $200.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Pnt8 |">30" X 40" Print: $250.00</option>
		</select>&nbsp;
		<input type="hidden" name="print-submitted" value="yes" />
		<input type="submit" name="submit-print" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form>
	  <h3>Order a Canvas Gallery Wrap of This Photo</h3>
	   <p>All canvas prints are produced as gallery wraps on Epson Canvas at a local, independent, professional studio.<br />
	   With a gallery wrap, no frame is needed, and the photo "wraps" around the edges, meeting the wall.<br />
	   Each canvas gallery wrap will stand approximately 1" out from the wall.
	   The back of each canvas is signed.</p>
	  <form method="post" action="cart.php">
	  	<p>
	    <select name="BuyCanvas" class="button_left">
	      <option value="" selected="selected">Canvas Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can1 |">8" X 12" Canvas : $75.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can2 |">11" X 17" Canvas : $125.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can3 |">12" X 18" Canvas : $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can4 |">16" X 24" Canvas : $200.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can5 |">24" X 36" Canvas : $300.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Can6 |">30" X 40" Canvas : $400.00</option>
		</select>&nbsp;
		<input type="hidden" name="canvas-submitted" value="yes" />
		<input type="submit" name="submit-canvas" value="Add to Cart" class="button_right"/>
		<br /></p>
	  </form>
	  <h3>Order A Metallic Gallery Wrap Print of This Photo</h3>
	    <p>All metallic prints are produced as gallery wraps at a local, independent, professional studio.<br />
	    With a gallery wrap, no frame is needed, and the photo "wraps" around the edges of the print, meeting the wall.
	    Each gallery wrap will stand approximately 1" out from the wall.
		The back of each metallic gallery wrap is signed.</p>
	     <form method="post" action="cart.php">
	  	<p>
	    <select name="BuyMetal" class="button_left">
	      <option value="" selected="selected">Metal Options</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met1 |">8" X 12" Metallic : $75.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met2 |">11" X 17" Metallic : $125.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met3 |">12" X 18" Metallic : $150.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met4 |">16" X 24" Metallic : $200.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met5 |">24" X 36" Metallic : $300.00</option>
		  <option value="<?=$ThisPic['ID_num']?> | Met6 |">30" X 40" Metallic : $400.00</option>
		</select>&nbsp;
		<input type="hidden" name="metal-submitted" value="yes" />
		<input type="submit" name="submit-metal" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form>
	  <div class=" centerfloatDetails redgreytearReverse">
	    <h3>Additional Details</h3>
		  <p>Free shipping on orders in the United States.</p> 
		  <p>Most orders will be completed and shipped within 7 days.</p>
		  <p>Please allow 2-3 weeks for production and delivery of large orders or those that include metallic prints.</p>
	  </div>
	</div>
  </div>
  <?php 
	include("Includes/inc_quotes_plus.php");
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
  ?>
</div>
</body>
</html>
