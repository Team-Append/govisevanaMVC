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
                 <!-- <td><div class="bedit">
                  <button type="button" name="button1">Edit</button>  </div></td> -->
                  <td>
                  <form action="">
                  <!--  <a href="<?php echo URLROOT; ?>/admins/deleteFarmer?farmerID=<?php echo $post->farmerID?>" > -->
                      <button onclick="myFunction(<?php echo $post->farmerID?>)" type="button" name="button">Delete</button></td>
                  <!--  </a> --> 
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

<script>
function myFunction(farmerID) {
  //var txt;
  if (confirm("Are you sure want to delete!")) {
    var newUrl = "<?php echo URLROOT; ?>/admins/deleteFarmer?farmerID="+farmerID;
    document.location.href = newUrl;


  } else {
    //txt = "You pressed Cancel!";
  }
 // document.getElementById("demo").innerHTML = txt;
}
</script>