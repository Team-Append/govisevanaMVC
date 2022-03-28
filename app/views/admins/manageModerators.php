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
                <a href="<?php echo URLROOT;?>/admins/addModerator"><div id="addMod">Add moderator</div></a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>TP</th>
                            <th>remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($data['posts'] as $post){ ?>
                        <tr>
                            <td><?php echo $post->MID ;?></td>
                            <td><?php echo $post->ModName ;?></td>
                            <td><?php echo $post->ModEmail ;?></td>
                            <td><?php echo $post->ModTP ;?></td>
                            <td style="background-color: #FF4A4A;text-align: center;">Remove Mod</td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
    </html>
    <?php } else{
        header('location:' .URLROOT. '/pages/index');
    }?>