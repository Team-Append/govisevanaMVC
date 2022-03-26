<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Completed Orders</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleCompleteOrders.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    <div class="detail" style="width: 100%;">
      <div class="dtopic">
        <h1>Completed Orders</h1>
      </div>
          
    <div class="Rdetails">
      <table>
        <thead>
        <th>Farmer Name</th>
        <th>Contact Number</th>
        <th>Category</th>
        <th>Complete Date</th>
        <th>Description</th>
        </thead>
        <tbody>
          <tr>
            <td>Nimal de Silva</td>
            <td>071-******</td>
            <td>abc</td>
            <td>23/03/2022</td>
            <td>---orderdetais--</td>
          </tr>
        </tbody>
      </table>
    </div>

  </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
