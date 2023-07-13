<?php


function escape($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, trim($string));
}

function insert_Categories()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = escape($_POST['cat_title']);

        if (empty($cat_title) || $cat_title == "") {
            echo "<p class='text-danger'>Invalid Title</p>";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die("Query Faield" . mysqli_error($connection));
            }
        }
    }
}


function showAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);

        echo "<tr>
                <td width='10%' class='text-dark'>$cat_id</td>
                <td class='text-dark'>$cat_title</td>
                <td width='5%'><a href='categories.php?edit={$cat_id}' class='btn btn-warning'>EDIT</a></td>
                <td width='5%'><a onclick=\"javascript: return confirm('Do you really want to delete the category?')\" href='categories.php?delete={$cat_id}' class='btn btn-danger'>DELETE</a></td>
           </tr>";
    }

}

function getCategoryForPosts($post_category_id)
{
    global $connection;

    $cat_query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
    $select_categories_id = mysqli_query($connection, $cat_query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);

        return $cat_title;

    }
}


function showAllPosts()
{
    global $connection;

    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = escape($row['post_id']);
        $post_author = escape($row['post_author']);
        $post_title = escape($row['post_title']);
        $post_category_id = escape($row['post_category_id']);
        $post_status = escape($row['post_status']);
        $post_image = escape($row['post_image']);
        $post_tags = escape($row['post_tags']);
        //$post_comment_counts = $row['post_comment_counts'];
        $date = DateTime::createFromFormat('Y-m-d', escape($row['post_date']));
        $post_date = $date->format('F d, Y');
        $post_views_count = escape($row['post_views_count']);


        echo "<tr>
                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>
                <td class='text-dark text-center'>$post_id</td>
                <td class='text-dark text-center'>$post_author</td>
                <td class='text-dark text-center'>$post_title</td>" .

            "<td class='text-dark text-center'>" . getCategoryForPosts($post_category_id) . "</td>"

            . "<td class='text-dark text-center'>$post_status</td>
                <td class='text-dark text-center'><img class='img-fluid' src='../images/$post_image' alt='Post_Image'></td>
                <td class='text-dark text-center'>$post_tags</td>";

        $comment_query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
        $send_comment_query = mysqli_query($connection, $comment_query);
        $row = mysqli_fetch_array($send_comment_query);
        $count_comments = mysqli_num_rows($send_comment_query);

        echo "<td class='text-dark text-center'>$count_comments</td>";


        echo "<td class='text-dark text-center'>$post_date</td>
                <td class='text-dark text-center'><a href='posts.php?reset={$post_id}'>$post_views_count</a></td>
                <td width='5%'><a href='posts.php?source=edit_post&p_id={$post_id}' class='btn btn-warning'>EDIT</a></td>
                <td width='5%'><a onclick=\"javascript: return confirm('Do you really want to delete the post?')\" href='posts.php?delete={$post_id}' class='btn btn-danger'>DELETE</a></td>
           </tr>";
    }

}


function showAllComments()
{
    global $connection;

    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = escape($row['comment_id']);
        $comment_post_id = escape($row['comment_post_id']);
        $comment_author = escape($row['comment_author']);
        $comment_email = escape($row['comment_email']);
        $comment_content = escape($row['comment_content']);
        $comment_status = escape($row['comment_status']);
        $date = DateTime::createFromFormat('Y-m-d', escape($row['comment_date']));
        $comment_date = $date->format('F d, Y');


        echo "<tr>
                <td class='text-dark text-center'>$comment_id</td>
                <td class='text-dark text-center'>$comment_author</td>
                <td class='text-dark text-center'>$comment_content</td>";

        $post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_title_query = mysqli_query($connection, $post_query);

        while ($row = mysqli_fetch_assoc($select_post_title_query)) {
            $post_id = escape($row['post_id']);
            $post_title = escape($row['post_title']);

            echo "<td class='text-dark text-center'><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

        echo "<td class='text-dark text-center'>$comment_email</td>

                <td class='text-dark text-center'>$comment_status</td>

                <td class='text-dark text-center'>$comment_date</td>
                <td width='5%'><a href='comments.php?approve={$comment_id}' class='btn btn-success'>APPROVE</a></td>
                <td width='5%'><a href='comments.php?unapprove={$comment_id}' class='btn btn-warning'>UNAPPROVE</a></td>
                <td width='5%'><a onclick=\"javascript: return confirm('Do you really want to delete the comment?')\" href='comments.php?delete={$comment_id}' class='btn btn-danger'>DELETE</a></td>
              </tr>";

    }
}


function deleteCategory()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $delete_cat_id = escape($_GET['delete']);

        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
        $delete_category = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}


function confirmQuery($result)
{
    global $connection;

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    }
}

function updatePost($the_post_id)
{
    global $connection;

    $post_title = escape($_POST['post_title']);
    $post_category_id = escape($_POST['post_category_id']);
    $post_author = escape($_POST['post_author']);
    $post_status = escape($_POST['post_status']);

    $post_image = escape($_FILES['post_image']['name']);
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_image)) {
            $post_image = escape($row['post_image']);
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_date = now() ";
    $query .= "WHERE post_id = {$the_post_id} ";

    $update_post_query = mysqli_query($connection, $query);

    confirmQuery($update_post_query);

    header("Location: posts.php");
}


function showAllUsers()
{
    global $connection;

    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = escape($row['user_id']);
        $username = escape($row['username']);
        $user_firstname = escape($row['user_firstname']);
        $user_lastname = escape($row['user_lastname']);
        $user_email = escape($row['user_email']);
        $user_image = escape($row['user_image']);
        $user_role = escape($row['user_role']);

        echo "<tr>
            <td class='text-dark text-center'>$user_id</td>
            <td class='text-dark text-center'>$username</td>
            <td class='text-dark text-center'>$user_firstname</td>
            <td class='text-dark text-center'>$user_lastname</td>
            <td class='text-dark text-center'>$user_email</td>
            <td class='text-dark text-center'>$user_role</td>
            <td width='5%'><a href='users.php?change_to_admin={$user_id}' class='btn btn-success'>Admin</a></td>
            <td width='5%'><a href='users.php?change_to_sub={$user_id}' class='btn btn-primary'>Subscriber</a></td>
            <td width='5%'><a href='users.php?source=edit_user&u_id={$user_id}' class='btn btn-warning'>EDIT</a></td>
            <td width='5%'><a onclick=\"javascript: return confirm('Do you really want to delete the user?')\" href='users.php?delete={$user_id}' class='btn btn-danger'>DELETE</a></td>
          </tr>";

    }

}


function updateUser($the_user_id)
{
    global $connection;

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    //cleaning up the data
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_role = mysqli_real_escape_string($connection, $user_role);

    $username = mysqli_real_escape_string($connection, $username);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    //hashing the password
    $user_password = hash("sha512", $user_password);


    //NEED TO MAKE THE PICTURE SQUARE AND SELECT THE MIDDLE PART BEFORE COPYING IT TO THE IMAGES FOLDER
    // cropImage(createimagefromfile($user_image_temp), 500, 500);
    // $cropped_image = strval(cropImage(createimagefromfile($user_image_temp), 500, 500));

    move_uploaded_file($user_image_temp, "images/users/$user_image");

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $update_user_query = mysqli_query($connection, $query);

    confirmQuery($update_user_query);

    $_SESSION['username'] = $username;


    header("Location: users.php");
}

// function createimagefromfile($user_image_temp)
// {
//     $image = imagecreatefromjpeg($user_image_temp);
//     $filename = 'images/users/$user_image';
//     imagejpeg($image, $filename, 100);
//     imagedestroy($image);
// }


// function cropImage($image, $cropWidth, $cropHeight, $horizontalAlign = 'center', $verticalAlign = 'middle')
// {
//     $width = imagesx($image);
//     $height = imagesy($image);
//     $centreX = round($width / 2);
//     $centreY = round($height / 2);

//     $cropWidth = 200;
//     $cropHeight = 130;
//     $cropWidthHalf = round($cropWidth / 2);
//     $cropHeightHalf = round($cropHeight / 2);

//     $x1 = max(0, $centreX - $cropWidthHalf);
//     $y1 = max(0, $centreY - $cropHeightHalf);

//     $x2 = min($width, $centreX + $cropWidthHalf);
//     $y2 = min($height, $centreY + $cropHeightHalf);
// }

function users_online()
{
    global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 40;

    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
    } else {
        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    return mysqli_num_rows($users_online_query);

}


?>