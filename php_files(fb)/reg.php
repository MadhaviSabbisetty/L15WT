<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body
    {
      background-image: url("l1.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
    li a
    {
      color: White;
    }
    nav{
      float:right;
      word-spacing: 30px;
      padding: 20px;
    }
    nav li
    {
      display: inline-block;
      line-height: 70px;
    }

    .main {
      border: 2px solid green;
      margin: auto;
      margin-right:600px;
      padding: 10px;
      flex:1;
      border-radius: 25px;
    }

            .main h1
            {
              text-align: center;
              color: green;

            }
            #h
            {
              color:red;
              text-align:center;
            }
            td
            {
              padding:5px;
              text-align:left;
              color:beige;
              font-size:30px;
            }
            input[type = text],input[type = email],input[type = password],textarea
            {
              width:100%;
              padding: 10px 10px;
              margin:8px 0;
              border:2px solid red;
            }
            input[type = submit]
            {
              background-color: red;
              border: none;
              color: white;
              padding: 10px 10px;
              text-decoration: none;
              margin: 4px 2px;
              cursor: pointer;
            }
            button
            { width:60px;
              height:37px;
              background-color: red;
              border: none;
              color: white;
              padding: 5px 5px;
              text-decoration: none;
              margin: 4px 2px;
              cursor: pointer;
            }
            .top
            {
              width:100%;
              height:80px;

            }.top h1
            {
              text-align: center;

            }
            #i
            {
              border-radius:50%;
            }
            .p
            {
              display: flex;
            }
    </style>
    <script type="text/javascript">
      function f1()
      {
        window.location = "reg.php";
      }
      function f2()
      {
        window.location = "index.php";
      }
    </script>
  </head>
  
  <body>
        <h1 id="h">FACEBOOK</h1>
        <div class="p">
          <div class="main">

            <h1 style = "text-align:center;color:red;">no account?? signup now if yes..! login</h1>


              <form class="" action="reg.php" method="post">
                <table>


                  <tr>
                    <td>Name:</td>
                    <td>
                      <input type="text" name="name" value="" placeholder="Enter first name: " required ="required">
                    </td>
                  </tr>
                  <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="" placeholder="Enter User name: " required ="required">
                    </td>
                  </tr>
                  <tr>
                     <td>Email Id:</td>
                    <td>
                      <input type="email" name="email" value="" placeholder="Enter mail Id" required ="required">
                    </td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" value="" placeholder="Enter password" required ="required">
                    </td>
                  </tr>

                  <tr>
                    <td>
                       <input type="submit" name="submit" value="signup">
                       <button type="button" name="button" onclick = "f2()" >Login</button>



                    </td>
                  </tr>
                </table>
              </form>
          </div>
        </div>

      <?php
          if(isset($_POST['submit']))
          {

            $q = mysqli_query($db,"SELECT * FROM `registration` where username =  '$_POST[username]';");
            $c = mysqli_fetch_row($q);
            if($c == 0)
            {
              $q = mysqli_query($db,"INSERT into `registration`(name,username,email,password) VALUES('$_POST[name]','$_POST[username]','$_POST[email]','$_POST[password]');");
              if($q)
              {
                ?>
                <script type="text/javascript">
                  alert("Registration Completed");
                </script><?php

              }
              else {
                ?>
                <script type="text/javascript">
                  alert("Registration Failed");
                </script>
                <?php
              }
            }
            else {
              ?>
              <script type="text/javascript">
                alert("Username is Already taken");
              </script>
              <?php
            }

          }

       ?>
  </body>
</html>
