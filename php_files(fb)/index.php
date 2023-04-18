<?php
session_start();
include "connection.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      html,body
      {
        height:100%;
      background-image: url("i1.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    
      }
      .b1
      {
        width:100%;
        height:100px;
        border:2px solid red;
      }
      .b1 h1
      {
        text-align:center;
        color:blue;
      }
      .b2
      {
        flex:3;
        height:100%;
        border:2px solid red;
      }
      .b3
      {
          flex:1;

        height:100%;
        border:2px solid red;
      }
      #i
      {
        align:center;
        border-radius:50%;
      }
      .main
      {
          display: flex;
        width:100%;
        height:100%;
          border:2px solid red;
      }
      .b5 table
      {
        margin:auto;
        padding-top:80px;
      }
      .b4
      {
        width:100%;
        height:25%;
        align:center;
      }
      .b5
      {
        width:60%;
        margin:auto;
        height:50%;
        
      }
      .b6
      {
        width:100%;
        height:25%;
      }
      tr,td
      {
        padding-right:150px;
      }

    </style>
    <script>
      function f2()
      {
        window.location = "reg.php";
      }
      </script>
  </head>
  <body>
    <div class="b1">
      <h1>Welcome To Your Facebook Account</h1>
    </div>
    <div class="main">
      <div class="b2">
        <h3 style = "text-align:center;color:purple;">Top Likes</h3>
       <table cellspacing = "20px">
         <tr>
           <td>#</td>
           <td>Username</td>
           <td>Photo</td>
           <td>Likes</td>
         </tr>
         <?php
              $i = 1;
         $q = mysqli_query($db,"SELECT Username,image,likes from fb_upload where likes != 0   order by likes DESC limit 3;");
          ?>
          <?php while($row = mysqli_fetch_row($q))
          { ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row[0]; ?></td>
            <td> <img src="exp1/<?php echo $row[1]; ?>"  width = "135px" height = "135px" > </td>
             <td><?php echo $row[2]; ?></td>
          </tr>
        <?php } ?>
       </table>
      </div>
      <div class="b3">
         <div class="b4">
                 <img src="logo.jpg" alt="" height = 250px width = 250px id="i">
         </div>
         <div class="b5">
          <form class="" action="index.php" method="post">
            <table cellpadding = "10px">
              <tr>
                <td>
                  <p style = "text-align:center;">Login Here</p>
                </td>

              </tr>
              <tr>
                <td>
                <input type="text" name="username" value="<?php if(isset($_COOKIE["user"])){  echo $_COOKIE['user']; } ?>" required = "required">
                </td>
                </tr><tr>
                <td>
                <input type="password" name="password" required = "required" value="<?php if(isset($_COOKIE["user"])){  echo $_COOKIE['pass']; } ?>">
                </td>

              </tr>
              <tr>
                <td>
                      <label>  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user"])){  echo "checked"; } ?> class="largerCheckbox">&nbsp &nbsp  Remember me</label>
                </td>
              </tr>
              <tr>
                <td>
                <p style = "text-align:center;">
                  <input type="submit" name="submit" value="Login"><br><br>
                  <button type="button" name="button" onclick = "f2()">signup
                </button>
                </p>
              </td>
              </tr>

            </table>
          </form>
         </div>
         <?php
                if(isset($_POST['submit']))
                {
                  $q = mysqli_query($db,"SELECT * FROM `registration` where username = '$_POST[username]' and password = '$_POST[password]';");

                  $count = mysqli_fetch_row($q);

                  if($count == 0)
                  {
                    ?>  <script type="text/javascript">
                        alert("Incorrect Username or Password");
                      </script>

                    <?php
                  }
                  else 
                  {
                    if($_POST['remember'])
                    {
                      setcookie('user',$_POST['username'],time() + (86400 * 30));
                      setcookie('pass',$_POST['password'],time() + (86400 * 30));
                    }

                    $_SESSION['user'] = $_POST['username'];
                    ?>
                    <script type="text/javascript">
                      alert("Login");
                      window.location = "index1.php";
                    </script>
                    <?php
                  }
                }

          ?>
         <div class="b6">

         </div>
      </div>
    </div>

  </body>
</html>
