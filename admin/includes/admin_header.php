<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../includes/db.php"); ?>
<?php include("../functions.php"); ?>


<?php

if (!isset($_SESSION['user_role'])) {
    header("Location: ../404.php");
} else if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] !== 'admin') {
        header("Location: ../index.php");
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

    <title>Admin</title>

    <link rel = "icon shortcut" href = "images/admin.ico">

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/customCss.css" rel="stylesheet">
    <link href="css/admin_style.min.css" rel="stylesheet">
    <link href="css/summernote.css" rel="stylesheet">

</head>

<body id="page-top">
