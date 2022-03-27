<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/myOrderStyle.css" />
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>Delivery person Suggestions</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Delivery person Name</td>
            <td>Address</td>
            <td>telephone number</td>
            <td>email</td>
            <td>vehicle Details</td>
            <td>options</td>
            
            
          </thead>
          <?php foreach ($data['deliveryPersons'] as $deliveryPerson){ ?>
          <tbody>
            <tr class="rw">
              <td><?php echo $deliveryPerson-> name ?></td>
              
              <td><?php echo $deliveryPerson-> address ?></td>
              <td><?php echo $deliveryPerson-> tpno ?></td>
              <td><?php echo $deliveryPerson-> email ?></td>
              <td><?php echo $deliveryPerson-> vehicleModel ?></td>
              <td><button type="button" name="button"> select delivery person </button></td>
            </tr>
            <tr>
            </tr>
            
          </tbody>
          
          <?php } ?>
          
        </table>
        
      </div>
      <br><br>
      
    </div>
  </body>
</html>