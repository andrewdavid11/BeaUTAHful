<?php 
   include("Includes/inc_db.php"); 
   include("Includes/inc_functions.php");
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Checkout: Provide Shipping Information</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:800px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1401px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Order Completion Page." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>
 <div class="container">

<?php
	require_once(dirname(__FILE__) . '/config.php');
	
	$token = $_POST['stripeToken'];
	$email = $_POST['stripeEmail'];
	$amount = $_POST['stripeAmount'];
	$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card' => $token
	));
	$charge = Stripe_Charge::create(array(
	'customer' => $customer->id,
	'amount' => $amount,
	'currency' => 'usd'
	));
	
	if($charge) {
		$amountFixed = $amount / 100;
	  echo '<h3>Successfully charged $' . $amountFixed . '.</h3> 
	  <p>You will receive an email shortly
	  to confirm your order, and another with a tracking number when your fine art prints 
	  are ready to ship.<br />
	  Call 801-300-5549 anytime with questions. Thank you for your business!<br />
	  Please come again, and tell your friends.</p>';
    }
    else {
	  echo '<h2>Whoops! There was an error with your payment. Please verify that you have Javascript enabled and try again.</h2>';
	}
	
?>
  <?php //include("Includes/inc_footer.php"); ?>
  <?php include(dirname(__FILE__) . "/inc_footer.php"); ?>
 </div>	
</body>
</html>
