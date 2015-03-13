<?php 
   include("Includes/inc_db.php"); 
   include("Includes/inc_functions.php");
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Order Completion: Thank you for your Order</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
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
	<h2>This is a <span class="warning">Payment Verification</span> Page</h2>
<?php
	require_once('Extras/config.php');
	  //echo "<p>Checkpoint 2 reached</p>";
	$token = isset($_POST['stripeToken']) ? $_POST['stripeToken'] : '';
	$email = isset($_POST['stripeEmail']) ? $_POST['stripeEmail'] : '';
	$amount = isset($_POST['stripeAmount']) ? $_POST['stripeAmount'] : '';
<<<<<<< HEAD
		
=======
		//echo "<p>Amount is equal to " . $amount . " cents and the stripe token is set to  " . $token . " while customer email is " .$email ."</p>";
>>>>>>> live_site
	if(empty($token)) {
		echo "<h3>You have not gone through checkout.</h3>";
		echo "<p>Check out the <a style='color: yellow' href='galleries.php'>Galleries</a>, <a style='color: yellow' href='quick.php'>Quick Orders</a> or <a style='color: yellow' href='search.php'>Search</a> pages to find great products!</p>";
	}
	else {
<<<<<<< HEAD
		//echo "<p>Checkpoint 1 reached</p>";
=======
		//echo "<p>Checkpoint 3 reached </p>";
	$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card' => $token
	));
	   //echo "<p>Checkpoint 4 reached</p>";
	$charge = Stripe_Charge::create(array(
	'customer' => $customer->id,
	'amount' => $amount,
	'currency' => 'usd'
	));
	  
	  $amountFixed = $amount / 100;
	  $amountFixed = number_format($amountFixed, 2);
	  echo '<h2>Your card has been successfully charged $' . $amountFixed . '.</h2>';
	  echo '<h3>You will receive an email shortly to confirm your order, and another with a tracking number when your fine art prints 
	  are on their way by post.<br />';
	  echo 'Call <span class="warning">801-300-5549</span> anytime with questions. Thank you for your business!<br />
	  Please come again, and tell your friends.</h3>';
	} //end the else
?>
    <p>I am on Tumblr under the handle "ActiveGourmet", where my wife and I post some free preview outdoor pics, and a lot of good recipes.</p>
    <p>Or check out my blog here on site, <a href="http://www.hikephotos.com/blog">"The Still Wild West"</a>, 
    where I write stories and articles about wild places, mountains, camping, and climbing. I aim to add some new content every week
    when I am not out in the middle of nowhere.</p>
 <!--
	$token = isset($_POST['stripeToken']) ? $_POST['stripeToken'] : '';
	$email = isset($_POST['stripeEmail']) ? $_POST['stripeEmail'] : '';
	$amount = isset($_POST['stripeAmount']) ? $_POST['stripeAmount'] : '';
	$customer = '';
	$charge = '';
	$amountFixed = '';
		
	if(empty($token)) {
		echo "<h3>You have not gone through checkout, or there was a problem. Please verify that you have javascript enabled in your browser.</h3>";
		echo "<p>Check out the <a style='color: yellow' href='galleries.php'>Galleries</a>, <a style='color: yellow' href='quick.php'>Quick Orders</a> or <a style='color: yellow' href='search.php'>Search</a> pages to find great products!</p>";
	}
	else {
		require_once('Extras/config.php');
		// Set your secret key: remember to change this to your live secret key in production
        
		// Get the credit card details submitted by the form
	$token = $_POST['stripeToken'];	
	$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card' => $token
	));

		// Create the charge on Stripe's servers - this will charge the user's card
	try {
	$charge = Stripe_Charge::create(array(
	 "customer" => $customer->id,
	  "amount" => $amount,
	  "currency" => "usd",
	 )
	);
	  echo "Charged " . $amount . " like a charm!";
	} 
	catch(\Stripe\Error\Card $e) {
		// The card has been declined
		echo "<p>Hurts don't it?</p>";
	}
		
	}
	
	
>>>>>>> live_site
	$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card' => $token
	));
	   //echo "<p>Checkpoint 2 reached</p>";
	$charge = Stripe_Charge::create(array(
	'customer' => $customer->id,
	'amount' => $amount,
	'currency' => 'usd'
	));
	  
	  $amountFixed = $amount / 100;
	  $amountFixed = number_format($amountFixed, 2);
	  echo '<h2>Successfully charged $' . $amountFixed . '.</h2>';
	  echo '<h3>You will receive an email shortly to confirm your order, and another with a tracking number when your fine art prints 
	  are on their way by post.<br />';
	  echo 'Call <span class="warning">801-300-5549</span> anytime with questions. Thank you for your business!<br />
	  Please come again, and tell your friends.</h3>';
	//} end the alt else block that was not working on the live server
 -->
		
	
  <?php include("Includes/inc_footer.php"); ?>
 </div>	
</body>
</html>
