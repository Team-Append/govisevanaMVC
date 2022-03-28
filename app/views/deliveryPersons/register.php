<?php if(!isDeliveryPersonLoggedIn()){ ?>
<!DOCTYPE html>

<html lang="en">
<script>
  function selectDistrict(province,district){
    var s1 = document.getElementById(province);
    var s2 = document.getElementById(district);
    s2.innerHTML = "";
    if(s1.value == "Western"){
      var optionArray = [" Colombo|Colombo" , " Gampaha|Gampaha","Kalutara|Kalutara"];
    } else if(s1.value == "Central"){
      var optionArray = ["Kandy|Kandy", " Matale| Matale","Nuwara Eliya|Nuwara Eliya"];
    } else if(s1.value == "Southern"){
      var optionArray = ["Galle|Galle","Hambantota|Hambantota", "Matara|Matara"];
    }else if(s1.value == "Uva"){
      var optionArray = ["Badulla|Badulla","Moneragala|Moneragala"];
    }else if(s1.value == "Sabaragamuwa"){
      var optionArray = ["Kegalle|Kegalle","Ratnapura|Ratnapura"];
    }else if(s1.value == "North Western"){
      var optionArray = ["Kurunegala|Kurunegala","Puttalam|Puttalam"];
    }else if(s1.value == "North Central"){
      var optionArray = ["Anuradhapura|Anuradhapura","Polonnaruwa|Polonnaruwa"];
    }else if(s1.value == "Nothern"){
      var optionArray = ["Jaffna|Jaffna","Kilinochchi|Kilinochchi","Mannar|Mannar","Mullaitivu|Mullaitivu","Vavuniya|Vavuniya"];
    }else if(s1.value == "Eastern"){
      var optionArray = ["Ampara|Ampara","Batticaloa|Batticaloa","Trincomalee|Trincomalee"];
    }
    for(var option in optionArray){
      var pair = optionArray[option].split("|");
      var newOption = document.createElement("option");
      newOption.value = pair[0];
      newOption.innerHTML = pair[1];
      s2.options.add(newOption);
    }
  }
</script>
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
      Create account
    </div>
    <form action="" method="POST" name="createAccount" onsubmit="return(validate())">
    <div class="form">
    <span class="invalidFeedback">
              <?php echo $data['nameError'];?>
          </span>
       <div class="inputfield">
          <label>Full Name</label>
          
          <input type="text" class="input" name="name" id="name" placeholder="Full Name">
       </div>
       <span class="invalidFeedback">
              <?php echo $data['NICError'];?>
          </span>
        <div class="inputfield">
          <label>NIC</label>
          
          <input type="text" class="input" name="NIC" id="NIC" placeholder="NIC">
       </div>
       <span class="invalidFeedback">
              <?php echo $data['addressError'];?>
          </span>
       <div class="inputfield">
           <label>Address</label>
           
           <textarea class="textarea" name="address" id="address" placeholder="Address"></textarea>
        </div>
        
      <span class="invalidFeedback">
              <?php echo $data['provinceError'];?>
          </span>
       <div class="inputfield">
         <label>Province</label>
         <select id="province" name="province" onchange="selectDistrict(this.id,'district')">
          <option value=""></option>
          <option value="Western">Western</option>
          <option value="Central">Central</option>
          <option value="Southern">Southern</option>
          <option value="Uva">Uva</option>
          <option value="Sabaragamuwa">Sabaragamuwa</option>
          <option value="North Western">North Western</option>
          <option value="North Central">North Central</option>
          <option value="Nothern">Nothern</option>
          <option value="Eastern">Eastern</option>
        </select>
      </div>
      <span class="invalidFeedback">
              <?php echo $data['districtError'];?>
          </span>
       <div class="inputfield">
         <label>District</label>
         <select id="district" name="district">
          <option value=" "></option>
         </select>
      </div>
      <span class="invalidFeedback">
              <?php echo $data['cityError'];?>
          </span>
       <div class="inputfield">
         <label>City</label>
         
         <input type="text" class="input" name="city" id="city" placeholder="city" >
      </div>
        <span class="invalidFeedback">
              <?php echo $data['emailError'];?>
          </span>
       <div class="inputfield">
         <label>E-mail Address</label>
         
         <input type="email" class="input" name="email" id="email" placeholder="e-mail" >
      </div>
      <span class="invalidFeedback">
              <?php echo $data['tpnoError'];?>
          </span>
      <div class="inputfield">
          <label>Telephone Number</label>
          
          <input type="text" class="input" name="tpno" id="tpno" placeholder="Telephone number" >
       </div>
       <span class="invalidFeedback">
              <?php echo $data['passwordError'];?>
          </span>
       <div class="inputfield">
          <label>Password</label>
          
          <input type="password" class="input" name="password" id="password" placeholder="password">
       </div>
       <span class="invalidFeedback">
              <?php echo $data['confirmPasswordError'];?>
          </span>
      <div class="inputfield">
          <label>Re-enter Password</label>
          
          <input type="password" class="input" name="confirmpassword" id="confirmpassword">
       </div>
      <div class="inputfield terms">
       </div>
       <div class="submit-btn">
        <input type="submit" value="SIGN IN" class="btn">
      </div>
 
</form>
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