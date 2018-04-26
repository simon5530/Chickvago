<?php
  shell_exec("python php_python.py")
?>
<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.6.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.6.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Login</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="cid-qNKWMHCV9z mbr-fullscreen mbr-parallax-background" id="header2-q">

    

    

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Log in</h1>      
       
       <form action="Login.php" method="post">

            Username <input type="text" name="username"><br><br>
            Password <input type="text" name="password"><br><br>
            <input type="submit" value="log in"><br>
            <a style="color: blue " href="join.html">Not member? Please sign up here</a>
      </form>

      <p>
        <?php 
        // check submit value
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $account = $_POST["username"]; 
          $passwd = $_POST["password"]; 

          //Connect to database
          include_once("dbtool.inc");
          $servername = "localhost";
          $username = "aicourse";
          $password = "";
          $dbname = "aicourse";
          // Check connection      
          $conn = create_connection($servername, $username, $password, $dbname);

          //Check whether there is same account name
          $sql = "SELECT * FROM users Where account = '$account'";
          $result = $conn->query($sql);

          //there is not such an account
          if($result->num_rows ==0){
            echo "抱歉 無此使用者 請點上方連結註冊";
            //Release memory
            mysqli_free_result($result);     
        }
          else{

              $row = $result->fetch_assoc();
              //check password
              if($passwd!=$row['password']){
                echo"密碼錯誤!";
                //Release memory
                mysqli_free_result($result);     
              }
              else{
                echo"登入成功!";
                // Send account and password to index.php through cookie
                setcookie("account",$account);
                setcookie("password",$passwd);
                setcookie("passed","TRUE");
                //Release memory
                mysqli_free_result($result);
                header("location:index.php");

              }
            }
          $conn->close();
        }
          // $result = exec("python php_python.py");
          // echo (string)$result
        ?>      
      </i></p>
                
            </div>
        </div>
    </div>
    
</section>


 
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>