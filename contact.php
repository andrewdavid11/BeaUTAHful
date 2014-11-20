<?php
  include("Includes/inc_db.php"); 
  include("Includes/inc_functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3/org/1999/xhtml">
<head>
  <title>Contact Photographer and Web Designer Andrew David</title>
  <link rel="stylesheet" type="text/css" href="hikephotos_styles.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="hikephotos_styles_small.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:801px)" href="hikephotos_styles_medium.css" />
  <link rel="stylesheet" type="text/css" media="only screen and (min-width:1401px)" href="hikephotos_styles_xl.css" />
  <link rel="index" title="Hiking and Adventure Photography and Fine Art Prints by Web Designer Andrew David" href="index.php" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta name="copyright" content="Andrew David" />
  <meta name="keywords" content="Utah, Idaho, Sawtooths, Wasatch, Glacier, GNP, Rockies, Rocky Mountains, mountain, photography, fine art, prints, Andrew David" />
  <meta name="description" content="Contact email forms for Andrew David, and for joining his email list which sends out a free picture and a news update now and then." />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
  <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <script src="Scripts/randomquotes.js"></script>
</head>
<body onload="displayQuote();">
<div class="container">
  <div class="leftColumn">
    <div class="logo">
      <a href="index.php"><img src="Thumbs/ShadowLogoSep.jpg" width="100" height="75" /></a>
    </div>
  <nav>
	  <ul>
	   <li class="onlymedium"><a href="home.php">Home</a></li>
	   <li><a href="about.php">About</a></li>
	   <li><a href="galleries.php">Galleries</a></li>
	   <li><a href="licensing.php">License/Prints</a></li>
	   <li><a href="blog.php" target="_blank">Blog</a></li> 
	   <li><a href="contact.php">Contact</a></li>
	   <li><a href="search.php">Search</a></li>
	   <li><a href="quick.php">Quick Orders</a></li>
	  </ul>	
    </nav>
  </div>
  <div class="rightColumn">
    <h1>Contact Info</h1>
     <div id="contactPic">
    <img src="Thumbs/preppypose.jpg" alt="Andrew David smiles in a collared shirt with a sweater overlayer on a rare day not outside" />
  </div>
    <div id="address" class="redgreytear">
    <p>Andrew David<br />
       Hikephotos.com<br />
	   453 W 1500 S #609<br />
	   Bountiful, UT 84010<br /><br />
	   Phone: (801)300-5549<br />
	   Email: Use the Message Form below</p>
  </div>
  &nbsp;
  
  <p>Please contact me with any questions or comments.</p>
  <p>I can take phone calls or texts. For emails, use the form below. Not posting my email address spares me a lot of "spam."</p>
  <p>If I do not reply the same day, I am out on adventure away from cellular service, and will get back to you as soon as I reach civilization.</p>
  
  <div id="contactForm">
	  <h2>Message Andrew</h2>

<?php 

  $DisplayMsgForm = TRUE;
  $errorCount = 0;
  $Name1 = "";
  $Email1 = "";
  $Subject = "";
  $Message = "";
  
  if (isset($_POST['message-submit'])) {
    $Name1 = ucfirst(validateInfo($_POST['name1'], 'Your Name'));
    $Email1 = validateEmail($_POST['email1'], 'Your Email');
    $Subject = validateInfo($_POST['subject'], 'Subject');
    $Message = validateInfo($_POST['message'], 'Your Message');
    if ($errorCount == 0) {  
      $DisplayMsgForm = FALSE; 
    }
    else {
      $DisplayMsgForm = TRUE; 
    }
  }

  if ($DisplayMsgForm == TRUE) {
    if ($errorCount > 0) {
      echo "<h4 class='yellow'>Please re-enter the indicated information below and then <span style='color: yellow'>Submit the form again.</span></h4>";
    }
  ?>

  <form method="post" action="contact.php">
    <p>
      <strong>Your Name:</strong><br />
      <input type="text" name="name1" maxlength="75" value="<?= $Name1; ?>"><br />
      <strong>Your Email Address:</strong><br />
      <input type="email" name="email1" maxlength="75" value="<?= $Email1; ?>"><br />
      <strong>Subject:</strong><br />
      <input type="text" name="subject" maxlength="75" value="<?= $Subject; ?>"><br />
      <strong>Your Message:</strong><br />
      <textarea type="text" name="message" wrap="physical" rows="12" cols="60" value="<?= $Message; ?>"></textarea><br />
      <input type="hidden" name="message-submitted" value="email"><br />
      <input type="submit" name="message-submit" value="Send Email" class="button">
    </p>
   </form>&nbsp;

<?php

  } 
  else {
    $to = "andrewdavid@hikephotos.com";
    $subject = "Contact Form: " . $Subject;
    $msg = "Name: " . $Name1 . "<br />Email: " . $Email1. "<br />Message: " . $Message;
    $result = mail($to, $subject, $msg);
    if ($result)
      echo "<h4 class='warning'>Thank you for your message. Andrew David will reply shortly.</h4>";
    else 
      echo "<h4 class='warning'>There was a problem sending your message. Try calling instead.</h4>";
  } 

?>

  </div>
    <img src="Thumbs/waterfallposer2.jpg" alt="Andrew David stands before the cold spray of a high waterfall in the Wasatch Mountains of Utah, near his home"/>
    <p>I work hard to keep in touch my friends and supporters, and the best way to do that is if you add your email to my news list! I will 
    keep you informed about my newest thrills and adventures, and you will get a free mountain photo in your inbox every now and then. 
    Doesn't this all sound too good to be true?</p>
    <p>Your email address will be kept private, and each and every email will give you the option to unsubscribe.</p>
  <div id="emailForm">
	  <h2>Join the Hikephotos.com News List</h2>

<?php 

  $DisplaySignUpForm = TRUE;
  $errorCount2 = 0;
  $Name2 = "";
  $Email2 = "";

  if (isset($_POST['signup-submit'])) {
      $Name2 = validateInfo2($_POST['name2'], 'Your Name');
      $Email2 = validateEmail2($_POST['email2'], 'Your Email');
      if ($errorCount2 == 0) {  
        $DisplaySignUpForm = FALSE; 
      }
      else {
        $DisplaySignUpForm = TRUE; 
      }
    }

    if ($DisplaySignUpForm == TRUE) {
      if ($errorCount2 > 0) {
        echo "<h4>Please <span class='warning'>re-enter</span> the indicated information below and then <span class='warning'>Submit the form again.</span></h4>";
      }

?>

    <form action="contact.php" method="post">
      <p>
        <strong>Your Name:</strong><br />
	      <input type="text" name="name2" maxlength="60"><br />
	      <strong>Your Email Address:</strong><br />
	      <input type="text" name="email2" maxlength="60"><br /><br />
	      <input type="submit" name="signup-submit" value="Join Now" class="button">
      </p>
    </form>

<?php

  }
  else {
    $Name2 = stripslashes($Name2);
    $Email2 = stripslashes($Email2);
    $QueryString = "INSERT INTO newslist VALUES ('$Name2', '$Email2')";
    $AddtoDB= @mysql_query($QueryString, $DBTap);
    mysql_close($DBTap);
    $Backup = fopen("Extras/newslist.txt", "ab");
    if (is_writeable("Extras/newslist.txt")) {
      fwrite($Backup, $Name2 . ": " .$Email2 . "\n");
    }
    fclose($Backup);
    echo "<h4 class='warning'>Thank you for joining my email newslist. You should get your first monthly newsletter soon.</h4>";
  } 

?>

    </div>
  </div>
    <div id="quotenotes">
	  <p>"Life without ropes."</p>
	</div>
	  <hr width="20%" align="right" class="hidesmall" />
	  <hr width="40%" align="right" class="hidesmall" />
	  <hr width="60%" align="right" class="hidesmall" />
	  <hr width="80%" align="right" class="hidesmall" />
    <div class="smallnav">
		&nbsp;
		<nav>
		  <ul>
		   <li><a href="index.php">Home</a></li>
		   <li><a href="about.php">About</a></li>
		   <li><a href="galleries.php">Galleries</a></li>
		   <li><a href="licensing.php">License/Prints</a></li>
		   <li><a href="blog.php" target="_blank">Blog</a></li>
		   <li><a href="contact.php">Contact</a></li>
		   <li><a href="search.php">Search</a></li>
		   <li><a href="quick.php">Quick Orders</a></li>
		  </ul>	
		</nav>
	</div>
  <?php include("Includes/inc_footer.php"); ?>
  </div>
  </body>
  </html>
