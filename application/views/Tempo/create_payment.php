<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title data-tid="elements_examples.meta.title">Askzoey</title>
<!--   <meta data-tid="elements_examples.meta.description" name="description" content="Build beautiful, smart checkout flows."> -->
<!-- 
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon/180x180.png">
  <link rel="icon" href="img/apple-touch-icon/180x180.png"> -->

  <script src="https://js.stripe.com/v3/"></script>
  <script src="<?= base_url('js/index.js') ?>" data-rel-js></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?= base_url('css/base.css') ?>" data-rel-css="" />

  <!-- CSS for each example: -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/example1.css') ?>" data-rel-css="" />
  <style>
  .example.example1 button {
  	box-shadow: 0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #28a0e5; 
  }
  </style>
</head>
<body>
  <div class="globalContent">
    <main>
    <div class="stripes">
      <div class="stripe s1"></div>
      <div class="stripe s2"></div>
      <div class="stripe s3"></div>
    </div>
    <section class="container-lg">

      <!--Example 1-->
      <div class="cell example example1">
        <table>
          <tr>
            <td width="40%"><img src="<?= base_url('img/logo.jpeg') ?>" width="100%"></td>
            <td width="10%"></td>
            <td width="40%"><img src="<?= base_url('img/logo.jpeg') ?>" width="100%"></td>
          </tr>
          <tr>
            <td>
              <form action="<?= site_url('payment/stripe?type=1') ?>" method="POST">
                <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_vsrajlikksCkDyivTOsqME5g"
                data-name="The Bojio Network"
                data-description="Unlimited Monthly Advertisements"
                data-amount="5000"
                data-label="SGD $50/Month (Up to 5)">
              </script>
            </form>
            </td>
            <td></td>
            <td>
              <form action="<?= site_url('payment/stripe?type=2') ?>" method="POST">
                <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_vsrajlikksCkDyivTOsqME5g"
                data-name="The Bojio Network"
                data-description="Unlimited Monthly Advertisements"
                data-amount="3700"
                data-label="SGD $37/Month (5 and above)">
              </script>
            </form>
            </td>
          </tr>
        </table>


        <div class="caption">
          <span data-tid="elements_examples.caption.no_charge" class="no-charge">Askzoey.co</span>
<!--           <span data-tid="elements_examples.caption.view_source">Telegram Group</span> -->
          
        </div>
      </div>

  <!-- Scripts for each example: -->
  <script src="<?= base_url('js/example1.js') ?>" data-rel-js></script>

</body>
</html>