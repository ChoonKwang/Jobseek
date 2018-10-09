<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_mbvEiF3Tmb7PiyPqvfxMHQjB",
  "publishable_key" => "pk_test_vsrajlikksCkDyivTOsqME5g"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>