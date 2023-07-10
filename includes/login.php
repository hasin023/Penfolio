<?php include("db.php"); ?>
<?php session_start(); ?>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cleaning up the data
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //query to get the salt
    // $query = "SELECT randSalt FROM users";
    // $select_randsalt_query = mysqli_query($connection, $query);
    // if (!$select_randsalt_query) {
    //     die("Query Failed" . mysqli_error($connection));
    // }

    // $row = mysqli_fetch_array($select_randsalt_query);
    // $salt = $row['randSalt'];
    // $password = crypt($password, $salt);

    //query to check if the user exists
    $query = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
        die("Query Failed" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_user_query);
    $db_user_id = $row['user_id'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    $db_user_email = $row['user_email'];
    $db_user_image = $row['user_image'];

    if (mysqli_num_rows($select_user_query) == 0) {
        // echo '<script type="text/javascript">';
        // echo ' alert("Username or Password incorrect!")';
        // echo '</script>';
        header("Location: ../404.php");
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_email'] = $db_user_email;
        $_SESSION['user_image'] = $db_user_image;

        header("Location: ../admin/index.php");
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

    <title>Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <input name="login" type="submit" value="Login" class="btn btn-success btn-user btn-block"></input>
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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