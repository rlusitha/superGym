<?php
    // Database Connection
    require_once('config.php');

    $errors = array();

    //Check for form submission
    if(isset($_POST['submit'])) {
        //Check if the username and password has been entered
        if(!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
            $errors[] = "Username is missing or invalid";
        }
        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
            $errors[] = "Password is missing or invalid";
        }
        //Check if there are any errors in the form
        if(empty($errors)) {
            //Save username & password into variables
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $hashed_password = sha1($password);

            //Prepare Database query
            $query = "SELECT id,username,password 
                      FROM users
                      WHERE username = '{$username}'
                      AND password = '{$hashed_password}'
                      LIMIT 1";
            
            $result_set = mysqli_query($connection, $query);
            
            if($result_set) {
                //Query successful
                if(mysqli_num_rows($result_set) == 1) {
                    //Valid user found
                    header('Location: index.html');
                }
                else {
                    //Username or password invalid
                    $errors[] = "Invalid username or password";
                }  
            }
            else {
                $errors[] = "Database query failed";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>S U P E R G Y M</title>

    <!-- Main CSS -->
    <link href="css/maincss.css" rel="stylesheet" media="all">

    <!-- Tab Icon -->
    <link rel="icon" href="images/icon/supergymicon.png">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <img src="images/icon/super.png" alt="SuperGym">
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group inputWithIcon">
                                <input class="au-input au-input--full" type="username" name="username" placeholder="Username" required>
                                <i id="username" class="fas fa-user" aria-hidden="true"></i>   
                            </div>
                            <div class="form-group inputWithIcon">
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                <i id="password" class="fas fa-lock" aria-hidden="true"></i>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->