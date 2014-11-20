<?php 
   include("Includes/inc_db.php"); 
   include("Includes/inc_functions.php");

    $next = '';
    $panos = isset($_POST['pano-submitted']) ? $_POST['pano-submitted'] : '';
    $posters = isset($_POST['poster-submitted']) ? $_POST['poster-submitted'] : '';
    $prints= isset($_POST['print-submitted']) ? $_POST['print-submitted'] : '';
    $canvases = isset($_POST['canvas-submitted']) ? $_POST['canvas-submitted'] : '';
    $cards = isset($_POST['card-submitted']) ? $_POST['card-submitted'] : '';

    if($panos == "yes") 
      $pid = $_POST['BuyPano'];
    elseif($posters == "yes") 
      $pid = $_POST['BuyPoster'];
    elseif($prints == "yes")
       $pid = $_POST['BuyPrint'];
    elseif($canvases == "yes")
      $pid = $_POST['BuyCanvas'];
    elseif($cards == "yes")
      $pid = $_POST['BuyCard'];
    else
      $pid = '';

    if($pid != '') {
      $split = explode('|', $pid);
      $picID = trim($split[0]);
      $prodID = trim($split[1]);
      $color = trim($split[2]);

      if(is_array($_SESSION['cart'])) {
        $next=count($_SESSION['cart']);
        $_SESSION['cart'][$next]['pid'] = $pid;
        $_SESSION['cart'][$next]['picID'] =  $picID;
        $_SESSION['cart'][$next]['prodID'] = $prodID;
        $_SESSION['cart'][$next]['color'] = $color;
        $_SESSION['cart'][$next]['qty'] =    1;
      }
      else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['pid'] = $pid;
        $_SESSION['cart'][0]['picID'] =  $picID;
        $_SESSION['cart'][0]['prodID'] = $prodID;
        $_SESSION['cart'][0]['color'] = $color;
        $_SESSION['cart'][0]['qty'] =    1;
      } 
    } //closes out the control structure for filtering out empty $pid
    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Bea-UTAH-ful World LLC: Contact Andrew David </title>
  <link rel="stylesheet" type="text/css" href="bea-UTAH-ful_styles.css" />
  <link rel="index" title="Adventure and Wilderness Photography and Guiding by Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <meta name="keywords" content="Utah, Idaho, Sawtooths, Wasatch, Glacier, GNP, Rockies, Rocky Mountains, mountain, photography, fine art, prints, Andrew David" />
  <meta name="description" content="Contact Andrew David of Bea-UTAH-ful World LLC or join the email list." />
  </head>
<body>
<div class="container">
  <div class="leftColumn">
    <div class="logo">
      <a href="index.php"><img src="Thumbs/ShadowLogoSep.jpg" width="100" height="75" /></a>
    </div>
  <nav>
    <ul>
	  <li><a href="about.php">About</a></li>
	  <li><a href="galleries.php">Galleries</a></li>
	  <li><a href="guiding.php">Guiding</a></li>
	  <li><a href="licensing.php">Licensing</a></li>
	  <li><a href="web.php">Web/Graphic</a></li>
	  <li><a href="blog.php">Blog</a></li>
	  <li><a href="contact.php">Contact</a></li>
	  <li><a href="search.php">Search</a></li>
	</ul>
  </nav>
  </div>
  <div class="rightColumn">

    <?php 
        
      if(!empty($_SESSION['cart'])) {

          //displays contents of the $cart for debugging

          /*foreach($_SESSION['cart'] as $item) {
            echo "<p>" . $item['pid'] . "</p>";
            echo "<p>" . $item['picID'] . "</p>";
            echo "<p>" . $item['prodID'] . "</p>";
            echo "<p>" . $item['color'] . "</p>";
            echo "<p>" . $item['qty'] . "</p>";
          }*/
            
      ?>

      <form action="fakepaypal.html" method="post" name="cartForm">
      <h2>Your Shopping Cart</h2>
      <table id="cartTable" width="100%" border=0>
        <tr>
          <th class="cartTop">Image</th>
          <th class="cartTop">Item</th>
          <th class="cartTop">Price</th>
          <th class="cartTop">Qty.</th>
          <th class="cartTop">Total</th>
        </tr>

    <?php

         for ($i =0; $i <= $next; $i++) {

           if($_SESSION['cart'][$i]['prodID'] !== "Pstr") {
            $pic_num = $_SESSION['cart'][$i]['picID'];
            $prod_num = $_SESSION['cart'][$i]['prodID'];
            $Query1 = ("SELECT * FROM images WHERE Id_num=$pic_num");
            $Query2 = ("SELECT * FROM products WHERE ID LIKE '%$prod_num%'");
            $PicTap = mysql_query($Query1);
            $ProdTap = mysql_query($Query2);
            $PicRet = mysql_fetch_row($PicTap, MYSQL_BOTH);
            $ProdRet = mysql_fetch_row($ProdTap, MYSQL_BOTH);
            $base_price = number_format($ProdRet['base_price'], 2);
            $qty = $_SESSION['cart'][$i]['qty'];
    ?>
          <tr>
            <td class="cartBack">
              <div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?>"><img src="Thumbs/<?= $PicRet['image'] ?>" /></a><br />
              </div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?> ">"<?= $PicRet['title'] ?>"</a>
            </td>
            <td class="cartBack">
              <p><?= $ProdRet['size'] . " " . $ProdRet['category']; ?><br /> <!-- populated by a database tap to products-->
                 <?= $_SESSION['cart'][$i]['color'] ?></p> <!-- this line would be blank except for cards, but for simplicity and repeating the code and saving the space put in the blank-->

            </td>
            <td class="cartBack">$<?= $base_price ?></td> <!-- populated by a database tap to products -->
            <td class="cartBack"><input type="text" name="qty" size="3" maxlength="3" value="<?= $_SESSION['cart'][$i]['qty'] ?>" /></td>
            <td class="cartBack">$<?= number_format($base_price * $qty, 2) ?></td> <!-- will this work? -->
          </tr>

    <?php 
          } //ends the if block for filtering out posters

           else if($_SESSION['cart'][$i]['prodID'] == "Pstr") {
            $pic_num = $_SESSION['cart'][$i]['picID'];
            $prod_num = $_SESSION['cart'][$i]['prodID'];
            $Query1 = ("SELECT * FROM posters WHERE ID LIKE '%$pic_num%'");
            $Query2 = ("SELECT * FROM products WHERE ID LIKE '%$prod_num%'");
            $PicTap = mysql_query($Query1);
            $ProdTap = mysql_query($Query2);
            $PicRet = mysql_fetch_row($PicTap, MYSQL_BOTH);
            $ProdRet = mysql_fetch_row($ProdTap, MYSQL_BOTH);
            $base_price = number_format($ProdRet['base_price'], 2);
            $qty = $_SESSION['cart'][$i]['qty'];
    ?>
          <tr>
            <td class="cartBack">
              <div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?>"><img src="Thumbs/<?= $PicRet['image'] ?>" /></a><br />
              </div>
                <a href="photo.php?ID_num=<? $PicRet['ID_num'] ?> ">"<?= $PicRet['title'] ?>"</a>
            </td>
            <td class="cartBack">
              <p><?= $ProdRet['size'] . " " . $ProdRet['category']; ?><br /> 
                 <?= $_SESSION['cart'][$i]['color'] ?></p> 

            </td>
            <td class="cartBack">$<?= $base_price ?></td>
            <td class="cartBack"><input type="text" name="qty" size="3" maxlength="3" value="<?= $_SESSION['cart'][$i]['qty'] ?>" /></td>
            <td class="cartBack">$<?= number_format($base_price * $qty, 2) ?></td>
          </tr>        

    <?php 
          } //ends the if block for displaying posters after everything else
         } //ends the for loop

    ?>
        <tr>
          <td colspan="1" class="cartDiscount"> <!-- Could I use javascript for this? Would not be attached to the submission of the form. -->
            If you were given a discount code,<br />
            enter it here and update the cart.</br>
            <input type="text" name="discountCode" size="12" maxlength="16" />
          </td>
          <td colspan="2">&nbsp;</td>
          <td colspan="2" class="cartTotal"><strong>Total: $<?=get_order_total()?></strong></td>
        </tr>
        <tr>
          <td colspan="2"><input type="button" name="back2" value="Return to Shopping" onclick="history.go(-2);return true;" /></td>
          <td colspan="2"><input type="button" name="emptyCart" value="Empty Cart" /><input type="button" name="updateCart" value="Update Cart" /></td>
          <td colspan="1"><input type="submit" name="Check Out" value="Check Out" /></td>
        </tr>
      </table>
    </form>

    <?php 

      } //ends the if block to display the cart as table
      else {
        echo "<p> Your cart is empty. <br />
        Check out the <a style='color: yellow' href='Galleries.php'>Galleries</a> or <a style='color: yellow' href='Search.php'>Search</a> pages to find great products!</p>";
      }

    ?>

      <h4>To remove an item from the cart, change its quantity to 0 and then click the "Update Cart" button.</h4>
      <p>Your personal billing and shipping information will be gathered on the next page on a Paypal secure server.</br>
        <strong>You do not need to have a Paypal account; you can use your credit card without a Paypal account.</strong></p
  </div> <!-- ends the right column -->
  <?php include("Includes/inc_footer.php"); ?>
  </div> <!-- ends the container -->
  </body>
  </html>  