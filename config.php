<?php 

/*echo "<p>Hello. I work.</p>";*/

require_once('./stripe/lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_s6swxXCOFo3ZPc5VG8X9upln",
  "publishable_key" => "pk_test_ELQnHS75CBvjwriegRC80PXx"
);

Stripe::setApiKey($stripe['secret_key']);
?>






?>

