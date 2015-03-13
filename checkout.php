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
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="Page to collect shipping information." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>
 <div class="container">
  
<?php 

  $DisplayShippingForm = TRUE;
  $errorCount = 0;
  $customerFirst = isset($_POST['ship-name-first']) ? $_POST['ship-name-first'] : '';
  $customerLast = isset($_POST['ship-name-last']) ? $_POST['ship-name-last'] : '';
  $shipAddress = isset($_POST['ship-address']) ? $_POST['ship-address'] : '';
  $shipCity = isset($_POST['ship-city']) ? $_POST['ship-city'] : '';
  $shipState = isset($_POST['ship-state']) ? $_POST['ship-state'] : '';
  $shipZip = isset($_POST['ship-zip']) ? $_POST['ship-zip'] : '';
  $shipSpecial = isset($_POST['ship-special']) ? $_POST['ship-special'] : '';
  $sessionID = session_id();

  if (isset($_POST['shipping-submit'])) {
      $customerFirst = validateInfo($_POST['ship-name-first'], 'Your First Name');
      $customerLast = validateInfo($_POST['ship-name-last'], 'Your Last Name');
      $shipAddress = validateInfo($_POST['ship-address'], 'Your Address');
      $shipCity= validateInfo($_POST['ship-city'], 'Your City');
      $shipState = validateInfo($_POST['ship-state'], 'Your State');
      $shipZip = validateZip($_POST['ship-zip'], 'Your Zip Code');
      $shipSpecial = validateSpecial($_POST['ship-special']);
      
      if ($errorCount == 0 AND empty($_POST['fix-shipping-submitted'])) {  
        $DisplayShippingForm = FALSE; 
      }
      else {
        $DisplayShippingForm = TRUE; 
      }
    }

    if ($DisplayShippingForm == TRUE) {
		if(empty($_SESSION['cart'])){
			echo "<h3 class='warning'>Your cart is empty, so you cannot checkout!</h3>";
			echo "<p>Check out the <a style='color: yellow' href='galleries.php'>Galleries</a>, <a style='color: yellow' href='quick.php'>Quick Orders</a> or <a style='color: yellow' href='search.php'>Search</a> pages to find great products!</p>";
		}
		else{

?>

  <h2>Please provide your shipping address where you would like to receive your order.</h2>
  <p>(This does not need to be your billing address. Post Office Boxes are fine.)</p>
  
  <form method="post" action="https://www.hikephotos.com/checkout.php" >
	<p>
	  <strong>First Name:</strong><br />
	  <input type="text" name="ship-name-first" maxlength="20" size="20" value="<?= $customerFirst; ?>"/><br />
	  <strong>Last Name:</strong><br />
	  <input type="text" name="ship-name-last" maxlength="30" size="20" value="<?= $customerLast; ?>"/><br />
	  <strong>Address Line 1:</strong><br />
	  <input type="text" name="ship-address" maxlength="100" size="50" value="<?= $shipAddress; ?>"/><br />
	  <strong>City:</strong><br />
	  <input type="text" name="ship-city" maxlength="20" value="<?= $shipCity; ?>"/><br />
	  <strong>State</strong><br />
	  <input type="text" name="ship-state" maxlength="2" size="1" value="<?= $shipState; ?>"/><br />
	  <strong>Zip:</strong><br />
	  <input type="text" name="ship-zip" maxlength="11" size="7" value="<?= $shipZip; ?>"/><br />
	  <strong>Special Instructions (if any): </strong><br />
	  <input type="text" name="ship-special" maxlength="100" size="50" value="<?= $shipSpecial; ?>"/><br /><br />
	  <input type="hidden" name="shipping-submitted" value="yes" />
	  <input type="submit" value="Submit" name="shipping-submit" class="button" />
	</p>
  </form>
  
  <p>Or if you wish to <span class="warning">return to your cart</span>, use the button below.</h2>
  <div class="centralize">
	 <form method="post" action="cart.php">
		<input type="submit" value="Return to Cart" class="button" />
	 </form>
	 <p>&nbsp;</p>
  </div>
 
  
  
  <?php
		if ($errorCount > 0) {
			echo "<h4>Please make any <span class='warning'>corrections</span> and then <span class='warning'>Submit the form again.</span></h4>";
		}
	}
  }
  else {
	  require_once('Extras/config.php'); //adding this here for the stripe payment button
	  
	$customerFirst = ucwords(strtolower(stripslashes($customerFirst)));
    $customerLast = ucwords(strtolower(stripslashes($customerLast)));
	$shipAddress = stripslashes($shipAddress);
	$shipCity = ucwords(strtolower(stripslashes($shipCity))); 
	$shipState = strtoupper(stripslashes($shipState)); 
	$shipZip = stripslashes($shipZip);   
	  
	$to = "andrewdavid@hikephotos.com"; //change all the line breaks back to newlines \n for the email or they will not work
    $subject = "New Order";
    $date = date("F j, Y, g:i a");
    $totalBucks = $_SESSION['orderTotal'] / 100 ;

    $msg = "Congratulations Andrew and Sarah, you just got a new order through your website, hikephotos.com.\n";
    $msg .= "This order was placed on " . $date . ".\n";
    $msg .= "The order total is $" . $totalBucks . ".\n";
    $msg .= "This order will ship to : " . $customerFirst . " " . $customerLast . ".\n";
    $msg .= "The destination street address to ship to is : " . $shipAddress . "\n";
    $msg .= "The city, state, and zip code to ship to are: " .$shipCity . ", " . $shipState . " " . $shipZip .".\n";
    $msg .= "The special instructions, if any, read:\n";
    $msg .= "\"" . $shipSpecial. ".\"\n\n";
    $msg .= "And the details for the customer's shopping cart to print and deliver are below: \n\n";
    
    $max = count($_SESSION['cart']);
    for($i=0; $i<$max; $i++){
		$j = $i +1;
		$pid = $_SESSION['cart'][$i]['pid'];
		$picID = $_SESSION['cart'][$i]['picID'];
		$prodID = $_SESSION['cart'][$i]['prodID'];
		$color = $_SESSION['cart'][$i]['color'];
		$quant = $_SESSION['cart'][$i]['qty'];
		$date = date('Y-m-d');
		$QueryString1 = "INSERT INTO order_details (session_id, date, pic_id, prod_id, color, qty) VALUES ('$sessionID', '$date', '$picID', '$prodID', '$color', '$quant')";
		$QueryStuff = @mysql_query("SELECT size, category FROM products WHERE prodID = '$prodID'");
		$QueryReturn = @mysql_fetch_row($QueryStuff);
		
		$AddtoDB1= @mysql_query($QueryString1, $DBTap);
		$msg .= "Item Number " . $j . ": \n";
		$msg .= "Photo Number " . $picID . "\n";
		$msg .= "As a " . $QueryReturn[0] . " " . $QueryReturn[1] . "\n";
		$msg .= "The color, if specified, is: " . $color . "\n\n";
		
	} //end my for loop
		
		$msg .= "Log into your Stripe account to find the customer's email address and verify proper payment.
			 If this shopping cart was not dumped, remember to email an order confirmation pronto, and a tracking number 
			 and shipping alert when the prints are on their way by post. \n\n
			 Good customer service and good photography will keep your
			 customers coming back!\n\n";
    $result = mail($to, $subject, $msg);
    /* all this below was used for testing and display in the browser
    $result = true;
    if ($result) {
		echo "<p>" .$subject . "</p>";
		echo "<p>" .$msg . "</p>";
      //echo "<h4 class='warning'>A new order went through. Check email. Hurray! </h4>";
    }
    else {
      echo "<h4 class='warning'>There was a problem sending the new order message. Sigh. Back to coding.</h4>";
    }
    */
    $QueryString2 = "INSERT INTO shipAddresses (session_id, firstName, lastName, address, city, state, zip) 
		VALUES ('$sessionID', '$customerFirst', '$customerLast', '$shipAddress','$shipCity', '$shipState', '$shipZip')";
    $AddtoDB2= @mysql_query($QueryString2, $DBTap);
    mysql_close($DBTap);
    $Backup = fopen("Extras/shipAddresses.txt", "ab");
    if (is_writeable("Extras/shipAddresses.txt")) {
		//echo "<p>The backup file is writeable.</p>";
      fwrite($Backup, "\n" .$customerFirst . " " .$customerLast . "\n" .$shipAddress . "\n" .$shipCity 
      . ", " .$shipState . " " .$shipZip . "\n");
    }
    /*else {
     * this is used for testing the backup system- does not work on local due to permissions
		//echo "<p>This backup file is not writeable!</p>";
	}*/
    fclose($Backup);
    $addressDisplay = $customerFirst . " " . $customerLast . "<br />";
    $addressDisplay .= $shipAddress . "<br />";
    $addressDisplay .= $shipCity . ", " . $shipState . " " . $shipZip;
    echo "<h3>" . $addressDisplay . "</h3>";
    
?>
	<h4 class='warning'>Thank you. If the shipping address above is correct, 
    let's complete your order with a credit card below!</h4>
     <div id="stripecheckout"> 
		  
		 <!--moved above <?php //require_once('Extras/config.php'); ?> moved above--> 
		  
<<<<<<< HEAD
		  <form action="charge.php" method="POST">
=======
		  <form action="https://www.hikephotos.com/charge.php" method="POST">
>>>>>>> live_site
			  <input type="hidden" id="stripeAmount" name="stripeAmount" value="<?php echo $_SESSION['orderTotal'] ?>" />
			  <script
				src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				data-key="<?php echo $stripe['publishable_key']; ?>"
				data-amount="<?php echo $_SESSION['orderTotal']; ?>"
				data-name="HikePhotos.com"
				data-description="Your Prints Order"
				data-image="Thumbs/ShadowLogoSep.jpg"
				data-zip-code="true">
			  </script>
		  </form>
    </div>
    <h4>Or, if you need to make corrections to your shipping address before continuing, use this button.</h4>
    <div class="centralize">
	  <form method="post" action="https://www.hikephotos.com/checkout.php">
		<input type="submit" value="Correct Shipping" class="button" />
		<input type="hidden" name="fix-shipping-submitted" value="yes" /> 
		<br />
		&nbsp;
	  </form>
    </div>

<?php     
    
} //end the else clause for properly submitted forms

?>

  <?php include("Includes/inc_footer.php"); ?>
 </div>	
</body>
</html>

