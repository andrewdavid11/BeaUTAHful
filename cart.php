<?php 
   include("Includes/inc_db.php"); 
   include("Includes/inc_functions.php");

    $next = '';
    $msg = '';
    $panos = isset($_POST['pano-submitted']) ? $_POST['pano-submitted'] : '';
    $posters = isset($_POST['poster-submitted']) ? $_POST['poster-submitted'] : '';
    $prints= isset($_POST['print-submitted']) ? $_POST['print-submitted'] : '';
    $canvases = isset($_POST['canvas-submitted']) ? $_POST['canvas-submitted'] : '';
    $metals = isset($_POST['metal-submitted']) ? $_POST['metal-submitted'] : '';
    $cards = isset($_POST['card-submitted']) ? $_POST['card-submitted'] : '';
    $postcards = isset($_POST['postcard-submitted']) ? $_POST['postcard-submitted'] : '';
    $canpanos = isset($_POST['canpan-submitted']) ? $_POST['canpan-submitted'] : '';
    $metpanos = isset($_POST['metpan-submitted']) ? $_POST['metpan-submitted'] : '';
    $card10 = isset($_POST['card10-submitted']) ? $_POST['card10-submitted'] : '';
    $card25 = isset($_POST['card25-submitted']) ? $_POST['card25-submitted'] : '';
    $card50 = isset($_POST['card50-submitted']) ? $_POST['card50-submitted'] : '';
    $postcard10 = isset($_POST['postcard10-submitted']) ? $_POST['postcard10-submitted'] : '';
    $postcard25 = isset($_POST['postcard25-submitted']) ? $_POST['postcard25-submitted'] : '';
    $postcard50 = isset($_POST['postcard50-submitted']) ? $_POST['postcard50-submitted'] : '';
    $posters3= isset($_POST['poster3-submitted']) ? $_POST['poster3-submitted'] : '';
    $command = isset($_POST['command']) ? $_POST['command'] : '';
    $discount = isset($_POST['discountCode']) ? $_POST['discountCode'] : '';

    if($panos == "yes") 
      $pid = $_POST['BuyPano'];
    elseif($posters == "yes") 
      $pid = $_POST['BuyPoster'];
    elseif($prints == "yes")
       $pid = $_POST['BuyPrint'];
    elseif($canvases == "yes")
      $pid = $_POST['BuyCanvas'];
    elseif($metals == "yes")
      $pid = $_POST['BuyMetal'];
    elseif($cards == "yes")
      $pid = $_POST['BuyCard'];
    elseif($postcards == "yes")
	  $pid = $_POST['BuyPostCard'];
    elseif($canpanos == "yes")
      $pid = $_POST['BuyCanPan'];
    elseif($metpanos == "yes")
      $pid = $_POST['BuyMetPan'];
    elseif($card10 == "yes")
      $pid = $_POST['BuyCard10'];
    elseif($card25 == "yes")
      $pid = $_POST['BuyCard25']; 
    elseif($card50 == "yes")
      $pid = $_POST['BuyCard50']; 
     elseif($postcard10 == "yes")
      $pid = $_POST['BuyPostCard10'];
    elseif($postcard25 == "yes")
      $pid = $_POST['BuyPostCard25']; 
    elseif($postcard50 == "yes")
      $pid = $_POST['BuyPostCard50']; 
      
    elseif($posters3 == "yes")
      $pid = $_POST['BuyPoster3'];
    else
      $pid = '';

    if($pid != '') {
      $split = explode('|', $pid);
      $picID = trim($split[0]);
      $prodID = trim($split[1]);
      $color = trim($split[2]);

      if(empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['pid'] = $pid;
        $_SESSION['cart'][0]['picID'] =  $picID;
        $_SESSION['cart'][0]['prodID'] = $prodID;
        $_SESSION['cart'][0]['color'] = $color;
        $_SESSION['cart'][0]['qty'] =    1;
      }
      else {
        $next=count($_SESSION['cart']);
        $_SESSION['cart'][$next]['pid'] = $pid;
        $_SESSION['cart'][$next]['picID'] =  $picID;
        $_SESSION['cart'][$next]['prodID'] = $prodID;
        $_SESSION['cart'][$next]['color'] = $color;
        $_SESSION['cart'][$next]['qty'] =    1;
      }
    } //closes out the control structure for filtering out empty $pid

    if($command =='empty'){
        unset($_SESSION['cart']);
      }
    else if($command =='update'){
      $next=count($_SESSION['cart']);
      for($j=0; $j<$next; $j++){
        $k = $j +1;
        $newqty = isset($_POST['qty_box'.$k]) ? $_POST['qty_box'.$k] : ''; //example I went off used $_REQUEST
        $newqty = intval($newqty);
        if($newqty>=0 && $newqty<=999){
          $_SESSION['cart'][$j]['qty']=$newqty;
          /*
           * could not get this block below to work in all cases; prefer to not use it anyway and leave the cart
           * with entries of zero showing so the customer still has a record of what they originally selected
           * more likely to rechange their mind and protects against accidental letter entries unsetting from
           * the cart!
           * if($newqty == 0) {
            unset($_SESSION['cart'][$j]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
          }*/
        }
        else{
          $msg='Some products not updated!, quantity must be a number between 0 and 999';
        }
      } //closes the for loop
		//$discount = isset($_POST['discountCode']) ? $_POST['discountCode'] : 'Walla Walla';
	    if(!empty($discount)) {
			$_SESSION['discountCode'] =$discount;
		}
	    
    } //closes the else if for updates

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Your Customer Shopping Cart from HikePhotos.com</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="description" content="The Shopping Cart Page for hikephotos.com by Web Designer Andrew David. This page displays the contents of a customer's cart for review, update and to proceed to checkout." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/CartScripts.js"></script>
  </head>
<body>
<div class="container">
  <?php include("Includes/inc_left_column.php"); ?>
  <div class="rightColumn">

    <?php 
        
      if(!empty($_SESSION['cart'])) {
            
      ?>

      <form method="post" name="cartForm">
        <input type="hidden" name="command" />
      <h2>Your Shopping Cart</h2>
      <table id="cartTable" width="100%" border="0">
        <tr>
          <th class="cartTop">Image</th>
          <th class="cartTop">Item</th>
          <th class="cartTop">Price</th>
          <th class="cartTop">Qty.</th>
          <th class="cartTop">Total</th>
        </tr>

    <?php

        foreach ($_SESSION['cart'] as $i => $item) {

          $prod_num = $_SESSION['cart'][$i]['prodID'];
          $Query2 = ("SELECT * FROM products WHERE prodID LIKE '%$prod_num%'");
          $ProdTap = mysql_query($Query2);
          $ProdRet = mysql_fetch_row($ProdTap, MYSQL_BOTH);
          $base_price = number_format($ProdRet['base_price'], 2);
          $qty = $_SESSION['cart'][$i]['qty'];

          if($_SESSION['cart'][$i]['prodID'] !== "Pstr") {
		      $pic_num = $_SESSION['cart'][$i]['picID'];
			  $Query1a = ("SELECT * FROM images WHERE Id_num='$pic_num'");
			  $PicTap = mysql_query($Query1a);
			  $PicRet = mysql_fetch_row($PicTap, MYSQL_BOTH);
    ?>
          <tr>
            <td class="cartBack">
              <div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?>"><img src="Thumbs/<?= $PicRet['image'] ?>" /></a><br />
              </div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?> ">"<?= $PicRet['title'] ?>"</a>
            </td>
            <td class="cartBack">
              <p><?= $_SESSION['cart'][$i]['color'] ?><br /> 
                 <?= $ProdRet['size'] . " " . $ProdRet['category']; ?></p> 
            </td>
            <td class="cartBack">$<?= $base_price ?></td> 
            <td class="cartBack"><input type="text" name="qty_box<?= $i+1 ?>" size="3" maxlength="3" value="<?= $_SESSION['cart'][$i]['qty'] ?>" /></td>
            <td class="cartBack">$<?= number_format($base_price * $qty, 2) ?></td>
          </tr>

    <?php 
          } //ends the if block for filtering out posters

           else if($_SESSION['cart'][$i]['prodID'] == "Pstr") { 
            $another = $_SESSION['cart'][$i]['picID'];
            $Query1b = ("SELECT * FROM posters WHERE ID LIKE '%$another%'");
            $PosterTap = mysql_query($Query1b);
            $PosterRet = mysql_fetch_row($PosterTap, MYSQL_BOTH);
           
    ?>
          <tr>
            <td class="cartBack">
              <div>
                <a href="photo.php?ID_num=<? $PosterRet['ID'] ?>"><img src="Thumbs/<?= $PosterRet['image'] ?>" /></a><br />
              </div>
                <a href="photo.php?ID_num=<? $PosterRet['ID'] ?> ">"<?= $PosterRet['title'] ?>"</a>
            </td>
            <td class="cartBack">
              <p><?= $ProdRet['size'] . " " . $ProdRet['category']; ?><br /> 
                 <?= $_SESSION['cart'][$i]['color'] ?></p> 
2
            </td>
            <td class="cartBack">$<?= $base_price ?></td>
            <td class="cartBack"><input type="text" name="qty_box<?= $i+1 ?>" size="3" maxlength="3" value="<?= $_SESSION['cart'][$i]['qty'] ?>" /></td>
            <td class="cartBack">$<?= number_format($base_price * $qty, 2) ?></td>
          </tr>        

    <?php 
          } //ends the if block for displaying posters
         } //ends the for loop

    ?>
        <tr>
          <td colspan="1" class="cartDiscount"> 
            If you were given a discount code,<br />
            enter it here and update the cart.</br>
            <input type="text" name="discountCode" size="12" maxlength="16" value="" placeholder="<?= $discount; ?>" />
          </td>
          <td colspan="2">&nbsp;</td>
          <td colspan="2" class="cartTotal" id="orderTotal"><strong>Total: $<?=get_order_total()?></strong></td>
        </tr>
        <tr>
			<td colspan="5">
				<hr width="80%" />
			</td>
        </tr>
        <tr>
          <td style="text-align: right">
			  <!--<input type="button" name="back2" value="Return to Shopping" onclick="history.go(-2);return true;" class="button_left" />-->
			  <a id="button_sim" href="galleries.php"><input type="button" name="back2" value="Return to Shopping" class="button_left" /></a>
		 </td>
          <td colspan="1" style="text-align: center">
            <input type="button" name="emptyCart" value="Empty Cart" onclick="empty_cart();" class="button" />
          </td>
          <td colspan="1">
            <input type="button" name="updateCart" value="Update Cart" onclick="update_cart();" class="button_right"/>
          </td>
          <td>
			&nbsp;
          </td>
        </tr>
      </table>
      <div class="warning"><?=$msg?></div>
    </form>
    <h4>To remove an item from the cart, change its quantity to 0 and then click the "Update Cart" button.</h4>
    
    <div class="centralize"> <!-- use this to center the checkout button since it is not an image-->
       <form method="post" action="https://www.hikephotos.com/checkout.php">
		  <input type="submit" name="stripe-checkout" value="Proceed to Checkout" class="button" /><br />
		  &nbsp;
	   </form>
	   
    </div>
    
    <div class=" centerfloatDetails redgreytear">
		<h3>Secure Online Payments</h3>
		   <img src="Thumbs/credit_card_logos.jpg" />
		   <p>For now, I am only offering checkout with Stripe, right here, on site. I will add Paypal eventually.</p>
		   <p>Checkout pages are served on my site with "https" secure protocol to protect your private information. There is also a layer of Stripe security.</p>
		   <p>You can use any major credit card. I do not collect or store any credit card information.</p>
		   <p>If my site were breached, all a hacker could find out about my customers is name, and chosen shipping address- no payment details, no email addresses.</p>
		   <p>I also do not have an option to create a repeat customer account. It means checkout will be a little longer process with each visit,
		   but it makes my site safer, and less of a target for hackers and thieves.</p>
    </div>
    <br />
    <div class=" centerfloatDetails redgreytearReverse">
	    <h3>Additional Details</h3>
		  <p>Free shipping on orders in the United States. If outside the United States, message me before ordering please.</p> 
		  <p>Most orders will be completed and shipped within 7 days.</p>
		  <p>Please allow 2-3 weeks for production and delivery of large orders or those that include metallic prints.</p>
	</div>
	<br />
	<div class=" centerfloatDetails redgreytear">
		<h3>Satisfaction Guarantee</h3>
		   <p>There are no refunds on postcards or flip cards, unless I mess up your order (sending the wrong pictures for example).</p>
		   <p>On all other prints, if you are unhappy for any reason, message me, and we can work a return or replacement.</p>
		   <p>I want repeat customers, and a sterling reputation. I will not ship any order unless I am ready to stand behind the prints.</p>
		   <p>My prints are done in a professional studio on high quality mediums.</p>
	</div>
    <br />
    <?php 

      } //ends the if block to display the cart as table
      else {
        echo "<p> Your cart is empty, so there is nothing to display!<br />
        Check out the <a style='color: yellow' href='galleries.php'>Galleries</a>, <a style='color: yellow' href='quick.php'>Quick Orders</a> or <a style='color: yellow' href='search.php'>Search</a> pages to find great products!</p>";
      }

    ?>
  </div> <!-- ends the right column -->
	
  <?php 
	include("Includes/inc_small_nav.php"); 
	include("Includes/inc_footer.php");
  ?>
  </div> <!-- ends the container -->
  </body>
  </html>  
