<?php if(isAdminLoggedIn()){ ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buyer List</title>
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
        <h1>Buyer List</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Buyer Id</td>
            <td>Name</td>
            <td>NIC</td>
            <td>Address</td>
            <td>Telephone No</td>
            <td>Email</td>
            <td>Remove Buyer</td>
          </thead>
          <tbody>
            <tr> <?php  foreach($data["posts"] as $post){ ?>
              <td><?php echo $post->buyerID ;?></td>
              <td><?php echo $post->name ;?></td>
              <td><?php echo $post->NIC ;?></td>
              <td><?php echo $post->address ;?></td>
              <td><?php echo $post->tpno ;?></td>
              <td><?php echo $post->email ;?></td>
              <td>
              <table>
                <tr>
              <!--    <td><div class="bedit">

                    <button type="button" name="button1">Edit</button></div></td> -->
                  <td>
                   <form action="">
                    <a href="<?php echo URLROOT; ?>/admins/deleteBuyer?buyerID=<?php echo $post->buyerID?>" >
                  
                     <button onclick="myFunction()" type="button" name="button">Delete</button></a></td>
                      
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
function myFunction() {
  //var txt;
  if (confirm("Are you sure want to delete!")) {
    //txt = "You pressed OK!";
  } else {
    //txt = "You pressed Cancel!";
  }
 // document.getElementById("demo").innerHTML = txt;
}
</script>