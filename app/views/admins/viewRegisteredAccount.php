<?php if(isAdminLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminRegisteredAcc.css" />
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="topic">
            <span class="main-topic">Registered Accounts</span><br>
            <hr>
        </div>
    <div class="Rdetails">
      <table>
        <thead>
        <th class="picClm">Profile Picture</th>
        <th class="name">Name</th>
        <th class="cat">Category</th>
        <th class="add">Address</th>
        <th class="email">Email</th>
        <th class="tpno">Contact Number</th>
        <th class="view">View</th>
        <th class="delete">Delete</th>
        </thead>
        <tbody>
          <tr>
            <td class="picClm"><img src="<?php echo URLROOT; ?>/img/profile.png" alt=""></td>
            <td>Nimal de Silva</td>
            <td>ABC</td>
            <td>Kandy</td>
            <td>abc@gmail.com</td>
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
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
