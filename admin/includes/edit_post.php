<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_counts = $row['post_comment_counts'];
    $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
    $post_date = $date->format('F d, Y');
}


if (isset($_POST['update_post'])) {

    updatePost($the_post_id);

    echo "<p>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";

}

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <input value="<?php echo $post_title; ?>" class="form-control bg-light border-1 small" type="text" name="post_title" placeholder="Title">
    </div>
    
    <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="post_category_id">

        <?php
        $one_query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        $select_category = mysqli_query($connection, $one_query);

        confirmQuery($select_category);

        while ($row = mysqli_fetch_assoc($select_category)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
        ?>

        <?php
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        confirmQuery($select_categories);

        while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
        ?>
        </select>
    </div>

    <div class="form-group">
        <input value="<?php echo $post_author; ?>" class="form-control bg-light border-1 small" type="text" name="post_author" placeholder="Author">
    </div>

    <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="post_status">
            <option value="none">Select Status</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <div class="form-group">
        <input value="<?php echo $post_tags; ?>" class="form-control bg-light border-1 small" type="text" name="post_tags" placeholder="Tags">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="Post_Image">
        <i class="fas fa-fw fa-upload"></i>
        <input class="inputfile" id="file" type="file" name="post_image">
    </div>

    <div class="form-group">
        <textarea text="<?php echo $post_content; ?>" class="form-control bg-light border-1 small" name="post_content" id="summernote" placeholder="Write the contents of the post.." cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="update_post" value="Update Post">
    </div>

</form>
