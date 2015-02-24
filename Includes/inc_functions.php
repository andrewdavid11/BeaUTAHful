<?php 

    function validateInfo($value, $fieldName) {
	    global $errorCount;
	    if (empty($value)) {
	      echo "<h4><span style='color: yellow'>$fieldName</span> is required.</h4>";
	      ++$errorCount;
	      $retval = "";
	    }
	    else {
	       $retval = trim($value);
	       $retval = stripslashes($value);
	       $retval = htmlspecialchars($value);
	    }
	    return $retval;
	  }

    function validateEmail($value, $fieldName) {
	    global $errorCount;
	    if (empty($value)) {
	      echo "<h4><span style='color: yellow'>$fieldName</span> is required</h4>";
	      ++$errorCount;
	      $retval = "";
	    }
	    else {
	      $retval = trim($value);
	      $retval = stripslashes($value);
	      $retval = htmlspecialchars($value);
	      $pattern = "/^[\w-]+(\.[\w-]+)*@"."[\w-]+(\.[\w-]+)*"."(\.[a-z]{2,3})$/i";
	      if (preg_match($pattern, $retval) == 0) {
	        echo "<h4><span style='color: yellow'>$fieldName is not a valid email address. Please review your entry.</h4>";
	        ++$errorCount;
	      }
	    }
	    return $retval;
	  }
	  
	  function validateZip($value,$fieldName) {
		global $errorCount;
	    if (empty($value)) {
	      echo "<h4><span style='color: yellow'>$fieldName</span> is required</h4>";
	      ++$errorCount;
	      $retval = "";
	    }
	    else {
	      $retval = trim($value);
	      $retval = stripslashes($value);
	      $retval = htmlspecialchars($value);
	      $pattern = "/^([0-9]{5})(-[0-9]{4})?$/i";
	      if (preg_match($pattern, $retval) == 0) {
	        echo "<h4><span style='color: yellow'>$fieldName is not a valid zip code. Please review your entry.</h4>";
	        ++$errorCount;
	      }
	    }
		 return $retval; 
	  }
	  
	function validateSpecial($value) {
	    if (empty($value)) {
	      $retval = "";
	    }
	    else {
	       $retval = trim($value);
	       $retval = stripslashes($value);
	       $retval = htmlspecialchars($value);
	    }
	    return $retval;
	  }  


    function validateInfo2($value, $fieldName) {
	    global $errorCount2;
	    if (empty($value)) {
	      echo "<h4><span style='color: yellow'>$fieldName</span> is required.</h4>";
	      ++$errorCount2;
	      $retval = "";
	    }
	    else {
	       $retval = trim($value);
	       $retval = stripslashes($value);
	       $retval = htmlspecialchars($value);
	    }
	    return $retval;
	  }

    function validateEmail2($value, $fieldName) {
	    global $errorCount2;
	    if (empty($value)) {
	      echo "<h4><span style='color: yellow'>$fieldName</span> is required</h4>";
	      ++$errorCount2;
	      $retval = "";
	    }
	    else {
	      $retval = trim($value);
	      $retval = stripslashes($value);
	      $retval = htmlspecialchars($value);
	      $pattern = "/^[\w-]+(\.[\w-]+)*@"."[\w-]+(\.[\w-]+)*"."(\.[a-z]{2,3})$/i";
	      if (preg_match($pattern, $retval) == 0) {
	        echo "<h4><span style='color: yellow'>$fieldName</span> is not a valid email address. Please review your entry.</h4>";
	        ++$errorCount2;
	      }
	    }
	    return $retval;
	  }

	function get_price($prodID){
		$QueryString = "SELECT base_price FROM products WHERE prodID LIKE '%$prodID%'";
		$result=mysql_query($QueryString);
		$row=mysql_fetch_row($result, MYSQL_BOTH);
		return $row['base_price'];
	}


	function get_order_total(){
	    $next=count($_SESSION['cart']);
	    $sum=0;
	    $code = isset($_SESSION['discountCode']) ? $_SESSION['discountCode'] : '';
	    $disc = 1.0; //set this as default
	    //below I control the value of the ratio in set cases
	    if ($code == 'poetry') {
			$disc = 0.6;
		}
		if ($code == 'hippo') {
			$disc = 0.8;
		}
	    for ($i=0; $i<$next; $i++) {
	      $prodID=$_SESSION['cart'][$i]['prodID'];
	      $qty=$_SESSION['cart'][$i]['qty'];
	      $price=get_price($prodID);
	      $sum+=$price*$qty;  
	    }
	    $sum = $sum*$disc;
	    //$_SESSION['orderTotal'] = '$' . number_format($sum,2);
	    $_SESSION['orderTotal'] = $sum*100;
	    $_SESSION['orderTotalPretty'] = '$' . number_format($_SESSION['orderTotal']/100,2);
	    return number_format($sum, 2);
	  }


/*function remove_product($pid){
		//leave this one as $pid as the dual code not exploded is used here- I only split that value for the queries
		$pid=intval($pid); //could not use this as its not an integer
		$next=count($_SESSION['cart']);
		for($i=0;$i<$next;$i++){
			if($pid==$_SESSION['cart'][$i]['pid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}*/

	//the above function was for a remove product text link or button
	//I want to do a function that runs when the update cart button is clicked
	//products will be removed when the quantity is set to zero 
	//product quantity will be changed when the button is clicked also

?>

	
