<?php

if (isset($_POST['create_user'])) {

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);

    $user_image = escape($_FILES['user_image']['name']);
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);

    //hashing the password
    $user_password = hash("sha512", $user_password);


    //NEED TO MAKE THE PICTURE SQUARE AND SELECT THE MIDDLE PART BEFORE COPYING IT TO THE IMAGES FOLDER
    // cropImage($user_image_temp, 500, 500);

    move_uploaded_file($user_image_temp, "images/users/$user_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role, user_image) ";

    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '{$user_image}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    echo "<p>User Added. <a href='users.php'>View Users</a></p>";

}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="user_firstname" placeholder="First Name">
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="user_lastname" placeholder="Last Name">
    </div>

     <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="user_role">
            <option value="none">Select Role</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>



    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="username" placeholder="Username">
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="email" name="user_email" placeholder="Email">
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="password" name="user_password" placeholder="Password">
    </div>

    <div class="form-group">
        <i class="fas fa-fw fa-upload"></i>
        <input class="inputfile" id="file" type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="create_user" value="Add User">
    </div>

</form>
