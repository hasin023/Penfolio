<form action="" method="post">

<div class="form-group">

<?php

if (isset($_GET['edit'])) {
    $edit_cat_id = $_GET['edit'];

    $query = "SELECT * FROM categories WHERE cat_id = {$edit_cat_id} ";
    $select_edit_categories = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($select_edit_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        ?>
        <input value="<?php if (isset($cat_title))
            echo $cat_title; ?>" class="form-control bg-light border-1 small" type="text" name="cat_title">
    <?php }
}

?>



<?php

if (isset($_POST['update_category'])) {
    $edit_cat_id = $_GET['edit'];
    $edit_cat_title = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$edit_cat_id} ";
    $edit_query = mysqli_query($connection, $query);

    if (!$edit_query) {
        die("Query Failed" . mysqli_errno($connection));
    }

    header("Location: categories.php");
}

?>

</div>

<div class="form-group">
    <input class="btn btn-warning" type="submit" name="update_category" value="Update">
</div>

</form>