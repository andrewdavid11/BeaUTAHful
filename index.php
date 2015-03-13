<?php
  include("Includes/inc_db.php"); 
  include("Includes/inc_functions.php");
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Hiking and Adventure Photography from the mountains and canyons of the West: prints for sale by Andrew David. Photograpthy e-commerce solutions and design by Andrew David." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/slideshow.js"></script>
  </head>
<body>
<body onload="setInterval('SlideshowLaunch()', 2000)">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">
	<?php include("Includes/inc_cart_counter.php"); ?> 
	<h1>HikePhotos.com</h1>
    <h2>Hiking and Adventure Photography By Web Designer Andrew David</h2>
    <div id="slideshow">
	    <a id="slideshowLink" href="photo.php?ID_num=320"><img src="Pictures/ShadowLogoSep.jpg" alt="A rolling slideshow of images from around the Western United States." /></a>
    </div>
     <p><span style='color: yellow'>This site is now fully operational! Secure checkout with credit cards works! Sorry to anyone who noticed for all the delays, but I was working a lot,
     got engaged, and had a move and wedding to plan. Enter the code 'friend' in your shopping cart before checkout for a 25% discount while we fulfill our first orders.</span></p>
     <p>Isn't this a Bea-UTAH-ful world we live in?! I'm a photographer, and a web designer and developer based near
      Salt Lake City, Utah.</p>
      <p>I spend some of each year out in wild places, sleeping on the ground, getting wet, climbing mountains, hiking, and taking pictures.<br />
      I created this site all by my lonesome to document my adventures, and to display my coding and Web design skills.</p>
      <p>Love my site and my style? Want to hire me? Then start at the <a href="about.php">About Page</a>.</p>
      <a href="http://www.tumblr.com/share" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:81px; height:20px; background:url('https://platform.tumblr.com/v1/share_1T.png') top left no-repeat transparent; position: relative; left: 20px; top: 4px;">Share on Tumblr</a>
      <div class="fb-like" data-href="http://www.hikephotos.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
  </div>
  <?php 
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
  ?>
</div>
<script src="http://platform.tumblr.com/v1/share.js"></script>

</body>
</html>
