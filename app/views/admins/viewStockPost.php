<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Stock post</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminStockPostStyles.css" />
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="topic">
            <span class="main-topic">Stock Posts</span><br>
            <hr>
        </div>
    <div class="Rdetails">
      <table>
        <thead>
        <th class="picClm">Farmer profile</th>
        <th>Farmer Name</th>
        <th>Product Category</th>
        <th>Description</th>
        <th>Harvested Date</th>
        <th>Contact Number</th>
        <th>View</th>
        <th >Delete</th>
        </thead>
        <tbody>
          <tr>
            <td class="picClm"><img src="<?php echo URLROOT; ?>/img/profile.png" alt=""></td>
            <td>Nimal de Silva</td>
            <td>ABC</td>
            <td>Kandy</td>
            <td>2021/10/12</td>
            <td>071-*******</td>
            <td><div class="b1">
              <button type="button" name="button1">View</button>
            </div>
            </td>
            <td>
            <div class="b2">
              <button type="button" name="delete">Remove</button>
            </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </body>
</html>
