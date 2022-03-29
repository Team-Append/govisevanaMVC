<?php if(isBuyerLoggedIn()){ ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/styleContactAdmin.css">
  </head>
  <body>
  <?php
    
    include_once(APPROOT.'/views/includes/navigation.php');
     ?> 
    <div class="head">
      <header>
        <h2>Contact Us</h2>
        Any question or remarks? Just write us a message
      </header>
    </div>

    <div class="detail">
      <div class="info">
         <div class="topic">
           <h2>Contact Information</h2>
           
         </div>
         <div class="contact">
           <table>
             <tr>
               <td><img src="<?php echo URLROOT;?>/img/phone.png" alt="phone"></td>
               <td>091-*******</td>
             </tr>
             <tr>
               <td><img src="<?php echo URLROOT;?>/img/mail.png" alt="mail"></td>
               <td>abc@gmail.com</td>
             </tr>
           </table>
         </div>
      </div>
      <div class="message">
        <form action="/action_page.php">
          <input type="text" id="name" name="name" placeholder="Your name">
          <input type="text" id="email" name="email" placeholder="Email Address">
          <input type="text" id="phone" name="Tp" placeholder="Telephone Number">
          <input type="text" id="message" name="message" placeholder="Message">
          <button type="button">Send message</button>

        </form>
      </div>
    </div>

  </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>