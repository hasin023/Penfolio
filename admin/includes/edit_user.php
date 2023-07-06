<?php

if (isset($_GET['u_id'])) {

    $the_user_id = $_GET['u_id'];

}

$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
$select_users_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

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
        <select class="form-control bg-light border-1 small" type="text" name="user_role">
        
        <?php
        $one_query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
        $select_role = mysqli_query($connection, $one_query);

        confirmQuery($select_role);

        while ($row = mysqli_fetch_assoc($select_role)) {
            $user_role = $row['user_role'];

            echo "<option value='{$user_role}'>" . ucfirst($user_role) . "</option>";
        }
        ?>

            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>



    <div class="form-group">
        <input value="<?php echo $username; ?>" class="form-control bg-light border-1 small" type="text" name="username" placeholder="Username">
    </div>

    <div class="form-group">
        <input value="<?php echo $user_email; ?>" class="form-control bg-light border-1 small" type="email" name="user_email" placeholder="Email">
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="password" name="user_password" placeholder="Password">
    </div>

    <div class="form-group">
        <i class="fas fa-fw fa-upload"></i>
        <input class="inputfile" id="file" type="file" name="user_image">
    </div>

    <div class="form-group">
        <input class="btn btn-warning" type="submit" name="update_user" value="Update User">
    </div>

</form>
