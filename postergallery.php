<?php 
  include("Includes/inc_db.php");
  include("Includes/inc_functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Bea-UTAH-ful Poster Viewer and Order Page</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <meta name="description" content="Detailed collage poster viewing gallery for Andrew David. Collage themes include Wasatch Mountains, beautiful Utah, and the American Southwest." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  </head>
<body onload="displayQuote();">
<div class="container">
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">
	<div class="cart_icon">
	  <p><?=displayCartCount()?></p>
	  <a href="cart.php"><img src="Thumbs/cart1.png" width="75" height="75" /></a>
 	</div>
  	<p><span class="return" onclick="history.go(-1);return true;">Return to Last Page</span></p>

    <?php
	  
      $PosterGallery = mysql_query("SELECT * FROM posters");
      
    ?>

      <div class="noTable">
      <h1>Collage Fine Art Poster Gallery</h1>

    <?php while ($row = mysql_fetch_array($PosterGallery, MYSQL_BOTH)) { ?>
	
	    <div class='thumBox'>
		  <a href="poster.php?ID=<?=$row['ID'] ?>"><img src="Thumbs/<?=$row['image'] ?>" alt="<?=$row['title'] ?>" /></a>
		  <p><strong><?=$row['title']?></strong></p>
          <p><?= $row['description'] ?></p>
		</div> <!-- ends the 'thumBox' div -->

	<?php } ?>
	
	  </div> <!--ends the noTable div-->
	  
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
