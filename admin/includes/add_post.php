<?php

if (isset($_POST['create_post'])) {
    $post_title = escape($_POST['post_title']);
    $post_category_id = escape($_POST['post_category_id']);
    $post_author = escape($_POST['post_author']);
    $post_status = escape($_POST['post_status']);

    $post_image = escape($_FILES['post_image']['name']);
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_comment_counts = 0;
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_counts, post_status) ";

    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}' , '{$post_comment_counts}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    echo "<p>Post Created. <a href='posts.php'>View Posts</a></p>";


}

?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="post_title" placeholder="Title">
    </div>
    
    <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="post_category_id">
        <option value="none">Select Category</option>
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            confirmQuery($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = escape($row['cat_id']);
                $cat_title = escape($row['cat_title']);

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="post_author">
            <option value="none">Select User</option>
            <?php
            $query = "SELECT * FROM users";
            $select_user = mysqli_query($connection, $query);

            confirmQuery($select_user);

            while ($row = mysqli_fetch_assoc($select_user)) {
                $user_id = escape($row['user_id']);
                $username = escape($row['username']);
                $user_firstname = escape($row['user_firstname']);
                $user_lastname = escape($row['user_lastname']);
                $fullname = $user_firstname . " " . $user_lastname;

                echo "<option value='{$fullname}'>{$username}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <select class="form-control bg-light border-1 small" type="text" name="post_status">
            <option value="none">Select Status</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="post_tags" placeholder="Tags">
    </div>

    <div class="form-group">
        <i class="fas fa-fw fa-upload"></i>
        <input class="inputfile" id="file" type="file" name="post_image">
    </div>

    <div class="form-group">
        <textarea class="form-control bg-light border-1 small" name="post_content" id="summernote" placeholder="Write the contents of the post.." cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="create_post" value="Publish Post">
    </div>

</form>
