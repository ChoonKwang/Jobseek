<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title data-tid="elements_examples.meta.title">Askzoey</title>
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
        <form action="<?= site_url('Tempo/profile'); ?>" method="POST">
          <fieldset>
            <div class="row">
              <label for="example1-name" data-tid="elements_examples.form.name_label">Name</label>
              <input id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Peter" required="yes" autocomplete="name" name="pa_name">
            </div>
            <div class="row">
              <label for="example1-name" data-tid="elements_examples.form.name_label">Company</label>
              <input id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Company Name" required="yes" name="company_name">
            </div>
            <div class="row">
              <label for="example1-email" data-tid="elements_examples.form.email_label">Email</label>
              <input id="example1-email" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="Peter@gmail.com" required="yes" autocomplete="email" name="email">
            </div>
            <div class="row">
              <label for="example1-phone" data-tid="elements_examples.form.phone_label">Phone</label>
              <input id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="91234567" required="yes" autocomplete="tel" name="contact_no">
            </div>
          </fieldset>
          <button type="submit" data-tid="elements_examples.form.pay_button">Next</button>
          <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span></div>
        </form>
        <div class="caption">
          <span data-tid="elements_examples.caption.no_charge" class="no-charge">Askzoey.co</span>
<!--           <span data-tid="elements_examples.caption.view_source">Telegram Group</span> -->
          
        </div>
      </div>

  <!-- Scripts for each example: -->
  <script src="<?= base_url('js/example1.js') ?>" data-rel-js></script>

</body>
</html>