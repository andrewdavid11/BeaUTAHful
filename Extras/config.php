<?php 

/*echo "<p>Hello. I work.</p>";*/

require_once('./stripe/lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_live_XDosu51UMZXedKJQsr4Tm0Yn",
  "publishable_key" => "pk_live_Cr5IrUdvOP7uw7SfcDxWOfLn"
);

Stripe::setApiKey($stripe['secret_key']);
?>






?>

