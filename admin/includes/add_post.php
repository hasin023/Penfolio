<?php


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
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <input class="form-control bg-light border-1 small" type="text" name="post_author" placeholder="Author">
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
        <input class="inputfile" id="file" type="file" name="post_image" data-multiple-caption="{count} files selected" multiple>
        <label for="file">Choose a file</label>
    </div>

    <div class="form-group">
        <textarea class="form-control bg-light border-1 small" name="post_content" id="" placeholder="Write the contents of the post.." cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="create_post" value="Publish Post">
    </div>

</form>