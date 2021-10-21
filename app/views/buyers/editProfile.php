<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EidtProfile</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/styleeditProfile.css">
  </head>
  <body>
    <header>
      <h2>My Profile</h2>
    </header>
    <!--<div class="side">
      Side bar
    </div> -->
    <div class="detail">
      <div class="dtopic">
        <h1>Edit Profile</h1>
      </div>
      <div class="dlist">
        <div class="d1">
          <table>
            <tr>
              <td><h3>Change name :</h3></td>
              <td>Nimal De Silva</td>
              <td><button onclick="myFunction1()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV1" style="display:none">
                <input type="text" id="fname" name="fname" placeholder="Name"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change NIC :</h3></td>
              <td>94********</td>
              <td><button onclick="myFunction2()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV2" style="display:none">
                <input type="text" id="nic" name="nic" placeholder="NIC"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change Address :</h3></td>
              <td>No 24, Kandy road, Kandy</td>
              <td><button onclick="myFunction3()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV3" style="display:none">
                <input type="text" id="address" name="address" placeholder="Address"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change E-mail :</h3></td>
              <td>abc@gmail.com</td>
              <td><button onclick="myFunction4()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV4" style="display:none">
                <input type="text" id="email" name="email" placeholder="E-mail"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change Cilty :</h3></td>
              <td>Pilyandala</td>
              <td><button onclick="myFunction5()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV5" style="display:none">
                <input type="text" id="city" name="city" placeholder="City"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change Number :</h3></td>
              <td>071-********</td>
              <td><button onclick="myFunction6()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV6" style="display:none">
                <input type="text" id="number" name="number" placeholder="Number"></div>
              </td>
            </tr>

            <tr>
              <td><h3>Change Password :</h3></td>
              <td><input type="text" id="password" name="password" placeholder="Enter Current Password"></td>
              <td><button onclick="myFunction7()">Edit</button></td>
            </tr>
            <tr>
              <td></td>
              <td><div id="myDIV7" style="display:none">
                <input type="text" id="password" name="password" placeholder="New Password"></div>
              </td>
            </tr>

            <tr>
              <td></td>
              <td><div class="saveB">
                <button type="button" name="button">Save Changes</button>
              </div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <script>
    function myFunction1() {
      var x = document.getElementById("myDIV1");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction2() {
      var x = document.getElementById("myDIV2");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction3() {
      var x = document.getElementById("myDIV3");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction4() {
      var x = document.getElementById("myDIV4");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction5() {
      var x = document.getElementById("myDIV5");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction6() {
      var x = document.getElementById("myDIV6");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <script>
    function myFunction7() {
      var x = document.getElementById("myDIV7");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>

  </body>
</html>
