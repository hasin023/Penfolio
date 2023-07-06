<?php

function insert_Categories()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

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
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>
                <td width='10%' class='text-dark'>$cat_id</td>
                <td class='text-dark'>$cat_title</td>
                <td width='5%'><a href='categories.php?edit={$cat_id}' class='btn btn-warning'>EDIT</a></td>
                <td width='5%'><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>DELETE</a></td>
           </tr>";
    }

}

function getCategoryForPosts($post_category_id)
{
    global $connection;

    $cat_query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
    $select_categories_id = mysqli_query($connection, $cat_query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        return $cat_title;

    }
}


function showAllPosts()
{
    global $connection;

    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_counts = $row['post_comment_counts'];
        $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
        $post_date = $date->format('F d, Y');


        echo "<tr>
                <td class='text-dark text-center'>$post_id</td>
                <td class='text-dark text-center'>$post_author</td>
                <td class='text-dark text-center'>$post_title</td>" .

            "<td class='text-dark text-center'>" . getCategoryForPosts($post_category_id) . "</td>"

            . "<td class='text-dark text-center'>$post_status</td>
                <td class='text-dark text-center'><img class='img-fluid' src='../images/$post_image' alt='Post_Image'></td>
                <td class='text-dark text-center'>$post_tags</td>
                <td class='text-dark text-center'>$post_comment_counts</td>
                <td class='text-dark text-center'>$post_date</td>
                <td width='5%'><a href='posts.php?source=edit_post&p_id={$post_id}' class='btn btn-warning'>EDIT</a></td>
                <td width='5%'><a href='posts.php?delete={$post_id}' class='btn btn-danger'>DELETE</a></td>
           </tr>";
    }

}


function showAllComments()
{
    global $connection;

    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $date = DateTime::createFromFormat('Y-m-d', $row['comment_date']);
        $comment_date = $date->format('F d, Y');


        echo "<tr>
                <td class='text-dark text-center'>$comment_id</td>
                <td class='text-dark text-center'>$comment_author</td>
                <td class='text-dark text-center'>$comment_content</td>";

        $post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_title_query = mysqli_query($connection, $post_query);

        while ($row = mysqli_fetch_assoc($select_post_title_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<td class='text-dark text-center'><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

        echo "<td class='text-dark text-center'>$comment_email</td>

                <td class='text-dark text-center'>$comment_status</td>

                <td class='text-dark text-center'>$comment_date</td>
                <td width='5%'><a href='comments.php?approve={$comment_id}' class='btn btn-success'>APPROVE</a></td>
                <td width='5%'><a href='comments.php?unapprove={$comment_id}' class='btn btn-warning'>UNAPPROVE</a></td>
                <td width='5%'><a href='comments.php?delete={$comment_id}' class='btn btn-danger'>DELETE</a></td>
              </tr>";

    }
}


function deleteCategory()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $delete_cat_id = $_GET['delete'];

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

    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
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




?>