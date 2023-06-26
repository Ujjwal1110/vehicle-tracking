<?php 

include 'config/config.php';

// Login Button Click   
if(isset($_POST['login_submit']))
{
    $admin_username = $_POST["username"];
    $admin_password = $_POST["password"];
    $db = getDb();
    $sql ="SELECT id, name FROM admin_regis WHERE username=:username and password=:password";
    $query= $db->prepare($sql);
    $query-> bindParam(':username', $admin_username, PDO::PARAM_STR);
    $query-> bindParam(':password', $admin_password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    $db = null;
    if($query->rowCount() > 0){
        $_SESSION['userid'] = $results->id;
        $_SESSION['username'] = $results->username;
        $_SESSION['name'] = $results->first_name.' '.$results->last_name;
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    }
    else{
        echo '<script>alert("Invalid Credentials")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from www.Robato Systems Pvt. Ltd..net/html-items/RFID Tracking-html/disable-demo-link/sign_in.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Mar 2023 11:36:34 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Robato Systems Pvt. Ltd.">
    <meta name="author" content="Robato Systems Pvt. Ltd.">
    <title>Vehicle Management | RFID Based Parking</title>

    <link rel="icon" type="image/png" href="images/fav.png">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
</head>

<body>
    <div class="form-wrapper">
        <div class="app-form">
            <div class="app-form-sidebar">
                <div class="sidebar-sign-logo" style=" height:30%; width:70%;">
                    <img src="images/brandlogo.png" alt="" >
                </div>
                <div class="sign_sidebar_text">
                    <h1>Smart RFID Vehicle Access Management</h1>
                </div>
            </div>
            <div class="app-form-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10">
                            <div class="app-top-items">
                                <a href="dashboard.php">
                                    <div class="sign-logo" id="logo">
                                        <img src="images/brandlogo.png" style="height:50px; width:50px;" alt="">
                                        <img class="logo-inverse" src="images/dark-logo.svg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-7">
                            <div class="registration">
                                <form method="POST">
                                    <h2 class="registration-title">SignIn to RFID Vehicle Tracking  </h2>
                                    <div class="form-group mt-5">
                                        <label class="form-label">Your Username *</label>
                                        <input class="form-control h_50" type="text" autocomplete="off" required name="username" placeholder="Enter your username" value="">
                                    </div>
                                   

                                        <div class="form-group mt-4">
                                            <div class="field-password">
                                                <label class="form-label">Password*</label>
                                            </div>
                                            <div class="loc-group position-relative">
                                                <input class="form-control h_50" id="myInput" type="password"  name="password" autocomplete="off" required  placeholder="Enter your password">
                                                <input type="checkbox" onclick="myFunction()">Show Password
                                                <!-- <span class="pass-show-eye" onclick="myFunction()"><span id="eye"><i class="fas fa-eye"></i></span><span id="eye_slash"><i class="fas fa-eye-slash"></i></span></span>                               -->
                                            </div>

                                        </div>
                                    </div>

                                           <button class="main-btn btn-hover w-100 mt-4" type="submit" name="login_submit">Log In <i
                                            class="fas fa-sign-in-alt ms-2"></i></button>
                                </form>

                                <!-- <div class="new-sign-link">
                                    New to RFID Tracking?<a class="signup-link" href="sign_up.php">Sign up</a>
                                </div> -->
                                
                            </div>

                        </div>

                    </div>
                        <div class="copyright-footer mt-5">
                            ©  <?php echo date('Y'); ?> , Smart RFID Vehicle Access Management. All rights reserved. Powered by Robato Systems Pvt. Ltd.
                        </div>
                </div>
                <!-- <div class="copyright-footer">
                    ©  <?php echo date('Y'); ?> , RFID Tracking. All rights reserved. Powered by Robato Systems Pvt. Ltd.
                </div> -->
            </div>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/night-mode.js"></script>

    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>

<!-- Mirrored from www.Robato Systems Pvt. Ltd..net/html-items/RFID Tracking-html/disable-demo-link/sign_in.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Mar 2023 11:36:36 GMT -->

</html>