<?php if(isAdminLoggedIn()){ ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>

    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body >
        
        <?php 
            include_once(APPROOT.'/views/includes/navigation.php');
        ?>  
        
<div class="reg-logo">
  <img src="../img/logo.png" alt="logo">
</div>
<div class="wrapper">
    <div class="title">
      Create Admin
    </div>
    <form action="" method="POST" name="createAccount" onsubmit="return(validate())">
    <div class="form">
    <span class="invalidFeedback">
              <?php echo $data['emailError'];?>
          </span>
       <div class="inputfield">
          <label>email</label>
          
          <input type="email" class="input" name="email" id="name" placeholder="email">
       </div>
       <span class="invalidFeedback">
              <?php echo $data['nameError'];?>
        </span>
        <div class="inputfield">
          <label>Full name</label>
          
          <input type="text" class="input" name="name" id="name" placeholder="Full name">
       </div>
       <span class="invalidFeedback">
              <?php echo $data['NICError'];?>
        </span>
       <div class="inputfield">
           <label>NIC</label>
           
           <input  class="input" type="text" name="NIC" id="NIC" placeholder="NIC"></input >
        </div>
        <span class="invalidFeedback">
              <?php echo $data['addressError'];?>
        </span>
       <div class="inputfield">
         <label>Address</label>
         
         <input type="text" class="input" name="address" id="address" placeholder="Address" >
        </div>
        <span class="invalidFeedback">
                <?php echo $data['tpError'];?>
            </span>
        <div class="inputfield">
            <label>Telephone Number</label>
            
            <input type="text" class="input" name="tpno" id="tpno" placeholder="Telephone number" >
        </div>
        <span class="invalidFeedback">
                <?php echo $data['passwordError'];?>
            </span>
        <div class="inputfield">
            <label>password</label>
            
            <input type="text" class="input" name="password" id="password" placeholder="password" >
        </div>
        <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError'];?>
          </span>
        <div class="inputfield">
            <label>confirm password</label>
            
            <input type="text" class="input" name="confirmPassword" id="confirmPassword" placeholder="confirm Password" >
        </div>
        
        </div>
        <div class="submit-btn">
          <input type="submit" value="CREATE ADMIN" class="btn">
        </div>
 
</form>
</div>
    <div class="socials">
      <a href="#" class="button"><img src="../img/fb.png" width="30" height="30" alt="facebook"></a>
      <a href="#" class="button"><img src="../img/google.png" width="30" height="30" alt="google"></a>
      <a href="#" class="button"><img src="../img/twitter.png" width="30" height="30" alt="tweeter"></a>
    </div>
    </div>

  </div>

</div>

<script>
  var car =  '<?php echo($cat); ?>' ;
  alert("you are registering as a " + car);
  
  function validate(){  
  
  var name=document.createAccount.fullname.value;
  var NIC=document.createAccount.NIC.value;
  var address = document.createAccount.address.value;
  var email=document.createAccount.email.value;
  var tpno=document.createAccount.tpno.value;
  var password=document.createAccount.password.value; 
  var password2 = document.createAccount.password2.value; 
  
 
  if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
  }else if (NIC==null || NIC==""){  
  alert("please enter NIC number");  
  return false; 
  }else if (address==null || address==""){  
  alert("please enter address");  
  return false; 
  }else if (email==null || email==""){  
  alert("please enter email address");  
  return false; 
  }else if (tpno==null || tpno==""){  
  alert("please enter tpno");  
  return false; 
  }else if (password==null || password==""){  
  alert("please enter password");  
  return false; 
  }else if (confirmpassword==null || confirmpassword==""){  
  alert("please enter password again");  
  return false; 
  }
  if(document.getElementById("terms").checked == false){
    alert("please agree to the terms and conditions");  
    return false;
  }
  
  if(password==password2){  
  return true;  
  }  
  else{  
  alert("password does not match");  
  return false;  
  }  
  }  
  
</script>

</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
