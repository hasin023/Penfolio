<?php

if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueId) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_to_published_status = mysqli_query($connection, $query);
                confirmQuery($update_to_published_status);
                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_to_draft_status = mysqli_query($connection, $query);
                confirmQuery($update_to_draft_status);
                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
                $update_to_delete_status = mysqli_query($connection, $query);
                confirmQuery($update_to_delete_status);
                break;

            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
                $select_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_post_query)) {
                    $post_title = escape($row['post_title']);
                    $post_category_id = escape($row['post_category_id']);
                    $post_date = escape($row['post_date']);
                    $post_author = escape($row['post_author']);
                    $post_status = escape($row['post_status']);
                    $post_image = escape($row['post_image']);
                    $post_tags = escape($row['post_tags']);
                    $post_content = escape($row['post_content']);
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
                $copy_query = mysqli_query($connection, $query);

                if (!$copy_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                break;
        }
    }
}
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <form action="" method="post">

                <div id="bulkOptionsContainer" class="mb-4 col-xs-4">
                    <select class="form-control" name="bulk_options" id="">
                        <option value="">Select Options</option>
                        <option value="published">Publish</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                        <option value="clone">Clone</option>
                    </select>
                </div>

                <div class="col-xs-4">
                    <input type="submit" name="submit" class="btn btn-success" value="Apply">
                    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
                </div>

                <table class="mt-4 table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                            <th class="text-dark text-center">ID</th>
                            <th class="text-dark text-center">Author</th>
                            <th class="text-dark text-center">Title</th>
                            <th class="text-dark text-center">Category</th>
                            <th class="text-dark text-center">Status</th>
                            <th class="text-dark text-center">Thumbnail</th>
                            <th class="text-dark text-center">Tags</th>
                            <th class="text-dark text-center">Comments</th>
                            <th class="text-dark text-center">Published</th>
                            <th class="text-dark text-center">Views</th>
                            <th class="text-dark text-center">Edit</th>
                            <th class="text-dark text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    $per_page = 6;

                    $post_count_query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $find_count = mysqli_query($connection, $post_count_query);

                    $count = mysqli_num_rows($find_count);
                    $count = ceil($count / $per_page);

                    if (isset($_GET['page'])) {
                        $page = escape($_GET['page']);
                    } else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    } else {
                        $page_1 = ($page * $per_page) - $per_page;
                    }

                    $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, $per_page";
                    //$query = "SELECT * FROM posts";
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


                    ?>

                    </tbody>
                </table>
            </form>

            <?php
            if (isset($_GET['delete'])) {

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {

                        $post_id = mysqli_real_escape_string($connection, $_GET['delete']);

                        $query = "DELETE FROM posts WHERE post_id = {$post_id} ";
                        $delete_query = mysqli_query($connection, $query);

                        confirmQuery($delete_query);

                        header("Location: posts.php");
                    }
                }

            }

            if (isset($_GET['reset'])) {

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {

                        $post_id = mysqli_real_escape_string($connection, $_GET['reset']);

                        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
                        $reset_query = mysqli_query($connection, $query);

                        confirmQuery($reset_query);

                        header("Location: posts.php");
                    }
                }

            }


            ?>


 
            <ul class="page">

                <?php

                for ($i = 1; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<li class='page__numbers active'><a class='page__link' href='posts.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li class='page__numbers'><a class='page__link' href='posts.php?page={$i}'>{$i}</a></li>";
                    }
                }

                ?>
            </ul>

            
        </div>
    </div>
</div>