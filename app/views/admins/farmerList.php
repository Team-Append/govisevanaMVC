<?php if(isAdminLoggedIn()){ ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../public/css/stylebuyerlist.css" />
  </head>
  <body>

  <?php
    
    include_once(APPROOT.'/views/includes/navigation.php');
    ?> 

    <div class="nav">
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>Farmer List</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Farmer Id</td>
            <td>Name</td>
            <td>NIC</td>
            <td>Address</td>
            <td>Telephone No</td>
            <td>Email</td>
            <td>Edit/Delete</td>
          </thead>
          <tbody>
            <tr> <?php  foreach($data["posts"] as $post){ ?>
              <td><?php echo $post->farmerID ;?></td>
              <td><?php echo $post->name ;?></td>
              <td><?php echo $post->NIC ;?></td>
              <td><?php echo $post->address ;?></td>
              <td><?php echo $post->tpno ;?></td>
              <td><?php echo $post->email ;?></td>
              <td>
              <table>
                <tr>
                  <td><div class="bedit">
                  <button type="button" name="button1">Edit</button>  </div></td>
                  <td><button type="button" name="button">Delete</button></td>
                </tr>
              </table></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <hr>
      </div>
    </div>
  </body> 
  <?php }?>
</html>