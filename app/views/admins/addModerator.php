<?php if(isAdminLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/styleAddModerator.css">

    <title>Add Moderator</title>
</head>
<body>
<?php include_once(APPROOT.'/views/includes/navigation.php');?> 
    <div class="content">
        <div class="image">
            <img src="<?php echo URLROOT;?>/img/moderator.png" alt="moderator"><br>
            <div class="img-content">
            </div>
        </div>
        <div class="form-side">
            <div class="topic">
                <span class="main-topic">Add Moderator</span>
            </div>
            <form action="" method="POST">
                <label >Moderator name</label><br>
                <br>
                <input type="text" id="modName" name="modName" placeholder="Moderator Name">
                <br>
                <label >Email Address</label><br>
                <br>
                <input type="text" id="modEmail" name="modEmail" placeholder="Email Address">
                <br>
                <label >Telephone Number</label><br>
                <br>
                <input type="text" id="modTP" name="modTP" placeholder="Telephone Number">
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="footer">
    </div>
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>