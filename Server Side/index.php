<?php
  // Check cookie if $pass is true or not in login.php
  $passed = $_COOKIE["passed"];
  $account = $_COOKIE["account"];
  $passwd = $_COOKIE["password"];
  if($passed!="TRUE"){
    header("location:login.php");
    exit();
  }
  
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
  <title>Send number to python</title>
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
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Send number to Python!</h1>      
       
       <form action="index.php" method="post">

            Number <input type="text" name="number"><br><br>
            <input type="submit" value="送出"><br>
      </form>
      <p><i>The number plus 5 is 
            <?php
              //check Submit value
              if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $num = $_POST["number"];
              //execute python
                $result = shell_exec("python php_python.py $account $passwd $num");
                echo $result;
              }
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