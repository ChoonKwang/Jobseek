<?php // Create a customer using a Stripe token

// If you're using Composer, use Composer's autoload:
require_once('vendor/autoload.php');

// Be sure to replace this with your actual test API key
// (switch to the live key later)
\Stripe\Stripe::setApiKey("sk_test_mbvEiF3Tmb7PiyPqvfxMHQjB");

try
{
  $customer = \Stripe\Customer::create(array(
    'email' => $_POST['stripeEmail'],
    'source'  => $_POST['stripeToken'],
  ));

  $subscription = \Stripe\Subscription::create(array(
    'customer' => $customer->id,
    'items' => array(array('plan' => 'plan_Df7gvSFxwB6saG')),
  ));

  // pass customer ID
  $url = 'http://localhost/Jobseek/index.php/payment/create_subscription?ps_stripe_id=' . $customer->id;
  header('Location: ' . $url);
  exit;
}
catch(Exception $e)
{
  header('Location:oops.html');
  error_log("unable to sign up customer:" . $_POST['stripeEmail'].
    ", error:" . $e->getMessage());
}