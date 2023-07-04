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
                <td class='text-dark text-center'>$post_title</td>
                <td class='text-dark text-center'>$post_category_id</td>
                <td class='text-dark text-center'>$post_status</td>
                <td class='text-dark text-center'><img class='img-fluid' src='../images/$post_image' alt='Post_Image'></td>
                <td class='text-dark text-center'>$post_tags</td>
                <td class='text-dark text-center'>$post_comment_counts</td>
                <td class='text-dark text-center'>$post_date</td>
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




?>