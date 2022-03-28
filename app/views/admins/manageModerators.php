<?php if(isAdminLoggedIn()){ ?>
    
    <html>
    <head>
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css"> 
        <title>Manage moderator</title>  
    </head>
    <body>
    <?php
    
    include_once(APPROOT.'/views/includes/navigation.php');
    ?>  
        <div>
            <div id="order-table">
                <h1>Moderator list</h1>
                <a href="<?php echo URLROOT;?>/admins/addModerator"><div id="addMod">Add Moderator</div></a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>TP</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($data['posts'] as $post){ ?>
                        <tr>
                            <td><?php echo $post->MID ;?></td>
                            <td><?php echo $post->ModName ;?></td>
                            <td><?php echo $post->ModEmail ;?></td>
                            <td><?php echo $post->ModTP ;?></td>
                            <td style="text-align: center;">
                            <form action="">
                    <!-- <a href="<?php echo URLROOT; ?>/admins/deleteModerator?MID=<?php echo $post->MID?>" > -->
                      <button onclick="myFunction(<?php echo $post->MID?>)" type="button" name="button"> Remove Mod</button></td>
                    <!-- </a>  -->
                           </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
    </html>

    <script>
function myFunction(MID) {
  //var txt;
  if (confirm("Are you sure want to delete!")) {
        var newUrl = "<?php echo URLROOT; ?>/admins/deleteModerator?MID="+MID;
        document.location.href = newUrl;
  } else {
    //txt = "You pressed Cancel!";
  }
 // document.getElementById("demo").innerHTML = txt;
}
</script>




    <?php } else{
        header('location:' .URLROOT. '/pages/index');
    }?>