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
		//echo "<p>Amount is equal to " . $amount . " cents and the stripe token is set to  " . $token . " while customer email is " .$email ."</p>";
	if(empty($token)) {
		echo "<h3>You have not gone through checkout.</h3>";
		echo "<p>Check out the <a style='color: yellow' href='galleries.php'>Galleries</a>, <a style='color: yellow' href='quick.php'>Quick Orders</a> or <a style='color: yellow' href='search.php'>Search</a> pages to find great products!</p>";
	}
	else {
		//echo "<p>Checkpoint 3 reached </p>";
	$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card' => $token,
	));
	try{
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
	} //end the try
	catch (Stripe_ApiConnectionError $e) {
    // Network problem, perhaps try again.
      echo "<h3 class='warning'>Network down. This may be an issue with your internet provider, or with my mine. Wait a moment, and then try your purchase again please.</h3>";
	} 
	catch (Stripe_InvalidRequestError $e) {
    // You screwed up in your programming. Shouldn't happen!
    echo "<h3 class='warning'>Uh oh. Andrew David messed up his coding. Please check back. An email has been sent notifying him of his coding boo-boo!</h3>";
	} 
	catch (Stripe_ApiError $e) {
    // Stripe's servers are down!
    echo "<h3 class='warning'>The Stripe servers are down. Trust me, this concerns me more than you, and Stripe more than me! In California, many people are furiously working on this problem.
    Please come back and try your purchase again sometime soon!</h3>";
	} 
	catch (Stripe_CardError $e) {
    // Card was declined.
    $e_json = $e->getJsonBody();
    $error = $e_json['error'];
    // Use $error['message'].
    echo "<h3 class='warning'>" . $error['message'] ."</h3>";
    echo "<h3>If you like, you can return to your <a href='cart.php'>Shopping Cart</a> and try to checkout again.</h3>";
	}
	} //end the else that holds all the try and catch statements
?>
    <br />
    <br />
    <p>I am on Tumblr under the handle "ActiveGourmet", where my wife and I post some free preview outdoor pics, and a lot of good recipes.</p>
    <p>Or check out my blog here on site, <a href="http://www.hikephotos.com/blog">"The Still Wild West"</a>, 
    where I write stories and articles about wild places, mountains, camping, and climbing. I aim to add some new content every week
    when I am not out in the middle of nowhere.</p>
		
<?php include("Includes/inc_footer.php"); ?>
 </div>	
</body>
</html>

