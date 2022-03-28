<?php if(isDeliveryPersonLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleDanalysis.css">
  </head>
  <body>
  <?php include_once(APPROOT.'/views/includes/navigation.php');?> 
    <div class="side">
      <ul>
  <li><a href="#AO">Active Orders</a></li><hr>
  <li><a href="#OS">Complete orders</a></li><hr>
  <li><a href="#E">Earnings</a></li><hr>
  <li><a href="#A">Analytics</a></li><hr>
  <li><a href="#CA">Contact Admin</a></li><hr>
</ul>
    </div>
    <div class="detail">
      <div class="grph">
      <table>
        <tr>
          <td>
            <h1>Delivery summary</h1>
            <h3>date & time</h3>
          </td>
        </tr>
        <tr><td>
          <iframe src="demo_iframe.htm" name="iframe_a" title="Iframe Example"></iframe>
         </td>
        </tr>
      </table>
      </div>
      <div class="amount">
          <h3>Delivery Orders</h3>
          449
          <hr>
          <h3>Completed</h3>
          426
          <hr>
          <h3>Average first response time</h3>
          33m
          <hr>
          <h3>Average response time</h3>
          30m
          <hr>
          <h3>Resolution within SLA</h3>
          94%
      </div>
    </div>

  </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>