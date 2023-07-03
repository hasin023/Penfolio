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