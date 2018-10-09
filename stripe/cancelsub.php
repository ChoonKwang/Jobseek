<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_mbvEiF3Tmb7PiyPqvfxMHQjB");

$subscription = \Stripe\Subscription::retrieve('plan_Df7gvSFxwB6saG');
$subscription->update(['cancel_at_period_end' => true]);
?>