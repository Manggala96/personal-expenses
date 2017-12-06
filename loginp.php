<html>
     <head>
     </head>
     <body>
        <?php
            define('DB_HOST', 'localhost');
            define('DB_NAME', 'signup');
            define('DB_USER','root');
            define('DB_PASSWORD','');

            $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)
                or die("Failed to connect to MySQL: " . mysql_error());

            $db=mysqli_select_db($con,DB_NAME)
                or die("Failed to connect to MySQL: " . mysql_error());

             if($_SERVER["REQUEST_METHOD"] == "POST")
              {
              // username and password sent from form
              $myusername = $_POST['Email'];
              $mypassword = $_POST['Password'];

              $myusername = mysqli_real_escape_string($con,$myusername);
              $mypassword = mysqli_real_escape_string($con,$mypassword);

              $sql = "SELECT Username FROM userinput WHERE email = '$myusername' and password = '$mypassword'";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


              $count = mysqli_num_rows($result);

              // If result matched $myusername and $mypassword, table row must be 1 row

              if($count == 1) {
                  echo "Yes";
               header("location: mainpage.html");
              }
			  else {
                 $message = "Username Or Password INVALID";
                 echo "<script type = 'text/javascript'>alert('$message');</script>";
                 header("location: login.html");
              }
           }
        ?>

     </body>
</html>
