<?php 
   include("Includes/inc_db.php"); 
   include("Includes/inc_functions.php");
   
   while ($row = $_SESSION['cart'] {
   var_dump($row]) ;
   }
   
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>All About Andrew David, This Site, and Web Design or Guiding for Photographers</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1401px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="keywords" content="Andrew David, Web Design, Web Development, Photography, E-Commerce, Shopping Carts, Web Programming, Online Pictures, selling photography, money from photography" />
  <meta name="description" content="Background and bio information for Web Designer and Developer Andrew David. Basic information about hikephotos.com, and how to hire Andrew David to program and build a similar e-commerce shopping cart solution for other photographers. Info on selling photography, prints, and pictures on the world wide web." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>
 <div class="container">
  <form method="post" name="ShippingInfoForm">
	<p>
	  <strong>Full Name:</strong><br />
	  <input type="text" /><br />
	  <strong>Address Line 1:</strong><br />
	  <input type="text" /><br />
	  <strong>Address Line 2 (optional):</strong><br />
	  <input type="text" /><br />
	  <strong>City:</strong>
	  <input type="text" />
	  <input type="button" value="Return to Cart" />
	  <input type="submit" value="Next"  />
	</p>
  </form>
  <?php include("Includes/inc_footer.php"); ?>
 </div>	
</body>
</html>
