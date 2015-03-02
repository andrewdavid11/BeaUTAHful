<?php 
    include("Includes/inc_db.php");
    include("Includes/inc_functions.php");
    $ID = $_GET['ID'];
    $DBTap = @mysql_query("SELECT * FROM posters WHERE ID LIKE '%$ID%'");
    $ThisPoster = @mysql_fetch_array($DBTap, MYSQL_BOTH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>HikePhotos.com Collage Poster Viewer and Order Page</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Adventure and Wilderness Poster Gallery from Utah, Idaho, Washington, Nevada, the Pacific Northwest, the Grand Canyon, and the Rocky Mountains and Canyons of the West: prints for sale by Andrew David." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  </head>
<body onload="displayQuote();">
<div class="container">
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">
	<?php include("Includes/inc_cart_counter.php"); ?> 
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
	       <p>No photo appears on more than one poster.</p>
	       <p>I have marked these posters down to only $10 each. Or order a set of 3 for only $20 through the <a href="quick.php">Quick Order</a>Page.
	       With a set of 3, you get 1 poster free! 
	       </p>
           <p>Custom posters are available. Contact me with your idea or request.</p>
	  <form method="post" action="https://hikephotos.com/cart.php" >   ?> 
	  	<p>
	    <select name="BuyPoster" class="button_left">
	      <option value="">Collage Options</option>
		  <option value="<?=$ThisPoster['ID']?> | Pstr |">20" X 30" Collage, This Poster Only : $10.00</option>
		</select>&nbsp;
		<input type="hidden" name="poster-submitted" value="yes" />
		<input type="submit" name="submit-poster" value="Add to Cart" class="button_right" />
		<br /></p>
	  </form> 
	  <div class="centerfloat redgreytear">
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
