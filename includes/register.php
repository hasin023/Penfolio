<?php include("db.php"); ?>

<?php

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['re-password'];
    $email = $_POST['email'];

    //cleaning up the data
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);

    //query to get the salt
    // $query = "SELECT randSalt FROM users";
    // $select_randsalt_query = mysqli_query($connection, $query);
    // if (!$select_randsalt_query) {
    //     die("Query Failed" . mysqli_error($connection));
    // }


    // $row = mysqli_fetch_array($select_randsalt_query);
    // $salt = $row['randSalt'];
    // $password = crypt($password, $salt);
    // $repassword = crypt($repassword, $salt);


    //query to check if the user exists
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
        die("Query Failed" . mysqli_error($connection));
    } else if ($password != $repassword) {
        echo '<script type="text/javascript">';
        echo ' alert("Passwords do not match!")';
        echo '</script>';
    } else if (mysqli_num_rows($select_user_query) > 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Username already exists!")';
        echo '</script>';
    } else {
        $query = "INSERT INTO users (user_firstname, user_lastname, username, user_password, user_email, user_role) ";
        $query .= "VALUES ('{$firstname}', '{$lastname}', '{$username}', '{$password}', '{$email}', 'subscriber')";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("Query Failed" . mysqli_error($connection));
        }
        echo '<script type="text/javascript">';
        echo ' alert("Registration Successful!")';
        echo '</script>';

        header("Location: login.php");
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <link rel = "icon shortcut" href = "../images/Penfolio.ico">

    <!-- Custom fonts-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="../admin/css/admin_style.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="firstname" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="lastname" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="username" type="text" class="form-control form-control-user" id="exampleUsername"
                                            placeholder="Username">
                                    </div>
                                    <div class="col-sm-6">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="re-password" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input class="btn btn-success btn-user btn-block" type="submit" name="register" value="Register Account"></input>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/adminScripts.min.js"></script>

</body>

</html>