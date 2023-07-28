<?php

if (isset($_GET['u_id'])) {

    $the_user_id = escape($_GET['u_id']);

}

$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
$select_users_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = escape($row['user_id']);
    $username = escape($row['username']);
    $user_password = escape($row['user_password']);
    $user_firstname = escape($row['user_firstname']);
    $user_lastname = escape($row['user_lastname']);
    $user_email = escape($row['user_email']);
    $user_image = escape($row['user_image']);
    $user_role = escape($row['user_role']);

}

if (isset($_POST['update_user'])) {

    updateUser($the_user_id);

}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <input value="<?php echo $user_firstname; ?>" class="form-control bg-light border-1 small" type="text" name="user_firstname" placeholder="First Name">
    </div>

    <div class="form-group">
        <input value="<?php echo $user_lastname; ?>" class="form-control bg-light border-1 small" type="text" name="user_lastname" placeholder="Last Name">
    </div>

    <div class="form-group">
        <input value="<?php echo $username; ?>" class="form-control bg-light border-1 small" type="text" name="username" placeholder="Username">
    </div>

    <div class="form-group">
        <input value="<?php echo $user_email; ?>" class="form-control bg-light border-1 small" type="email" name="user_email" placeholder="Email">
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" autocomplete="off" type="password" name="user_password" placeholder="Enter your Password">
    </div>

    <div class="form-group">
        <i class="fas fa-fw fa-upload"></i>
        <input class="inputfile" id="file" type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-warning" type="submit" name="update_user" value="Update User">
    </div>

</form>
