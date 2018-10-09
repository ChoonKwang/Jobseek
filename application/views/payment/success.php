<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  
  <title>The Bojio Network | Invoice</title>
  
  <link rel='stylesheet' type='text/css' href='<?= base_url("invoice/css/style.css") ?>' />
  <link rel='stylesheet' type='text/css' href='<?= base_url("invoice/css/print.css") ?>' media="print" />
<!--   <script type='text/javascript' src='<?= base_url("invoice/js/jquery-1.3.2.min.js") ?>'></script>
  <script type='text/javascript' src='<?= base_url("invoice/js/example.js") ?>'></script> -->

</head>

<body>
<button id="printPageButton" onClick="window.print();">Print</button>
  <div id="page-wrap">
    
    <div id="identity">
      <img id="image" src="<?= base_url('img/white_logo.jpeg') ?>" alt="logo" width="200px" />


      <div id="logo">
        <h1 id="invoice"><img id="image" src="<?= base_url('img/invoice.png') ?>" alt="logo" width="300px" /></h1>
      </div>

    </div>
    
    <div style="clear:both"></div>
    
    <div id="customer">

      <table id="meta-left">
        <tr>
          <td class="meta-head"><b>Bill To</b></td>
        </tr>
        <tr>
          <td class="meta-head"><?= $bill_name ?></td>
        </tr>
        <tr>
          <td class="meta-head"><textarea>Type in your address</textarea></td>
        </tr>
        <tr>
          <td class="meta-head"><textarea>Type in your Unit number</textarea></td>
        </tr>
        <tr>
          <td class="meta-head"><textarea>Type in your postal code</textarea></td>
        </tr>

      </table>

      <table id="meta">
        <tr>
          <td class="meta-head">&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td class="meta-head">Invoice No:</td>
          <td class="meta-word"> <?= $pin_id ?></td>
        </tr>
        <tr>
          <td class="meta-head">Date:</td>
          <td class="meta-word"> <?= $pin_date ?></td>
        </tr>
        <tr>
          <td class="meta-head">Terms:</td>
          <td class="meta-word"> text</td>
        </tr>
        <tr>
          <td class="meta-head">Due Date:</td>
          <td class="meta-word"> <?= $pin_due_date ?></td>
        </tr>

      </table>

    </div>
    <div id="divider"></div>
    <table id="items">

      <tr>
        <th>Description</th>
        <th>Unit</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
      
      <tr class="item-row">
        <td class="description"><span><?= $pin_description ?></span></td>
        <td class="qty"><span class="qty">1</span></td>
        <td class="rate"><span class="cost">$<?= $pin_total ?></span></td>
        <td class="price"><span class="price">$<?= $pin_total ?></span></td>
      </tr>
      <tr class="item-space">
      </tr>
      
      <tr>
        <td colspan="1" rowspan="2"class="blank"> Thank you for advertising with us! </td>
        <td colspan="2" class="total-line"><b>Subtotal</b></td>
        <td class="total-value"><div id="subtotal">$<?= $pin_total ?></div></td>
      </tr>
      <tr>
        <td colspan="2" class="total-line"><b>Total</b></td>
        <td class="total-value"><div id="total">$<?= $pin_total ?></div></td>
      </tr>
      <tr>
        <td colspan="1" class="blank"></td>
        <td colspan="2" class="total-line"><b>Paid</b></td>
        <td class="total-value"><span id="paid">$<?= $pin_paid ?></span></td>
      </tr>
      <tr>
        <td colspan="1" class="blank"> </td>
        <td colspan="2" class="total-line balance"><b>Balance Due</b></td>
        <td class="total-value balance"><div class="due">$0</div></td>
      </tr>

    </table>
    
    <div id="terms">
      <h5>Contact</h5>
      <span>H E I R I Q L E E | ( 6 5 ) 9 6 7 2 8 8 8 1 | H E I R I Q L E E . W O R K @ G M A I L . C O M</span>
    </div>
    
  </div>
  
</body>

</html>

