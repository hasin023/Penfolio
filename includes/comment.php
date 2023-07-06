<?php

if (isset($_POST['create_comment'])) {

    $the_post_id = $_GET['p_id'];

    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";

        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now()) ";

        $create_comment_query = mysqli_query($connection, $query);

        if (!$create_comment_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $query = "UPDATE posts SET post_comment_counts = post_comment_counts + 1 ";
        $query .= "WHERE post_id = $the_post_id ";
        $update_comment_count = mysqli_query($connection, $query);

    } else {
        echo "<script>alert('Fields cannot be empty')</script>";
    }

}

?>






<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="" method="post" role="form">

        <div class="form-group">
            <input type="text" placeholder="Name" name="comment_author" class="form-control"></input>
        </div>

        <div class="form-group">
            <input type="email" placeholder="Email" name="comment_email" class="form-control"></input>
        </div>

        <div class="form-group">
            <textarea name="comment_content" placeholder="Write your comment.." class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" name="create_comment" class="btn btn-primary">Add Comment</button>
    </form>
</div>

    <hr>

    <!-- Posted Comments -->


    <?php

    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
    $query .= "AND comment_status = 'approved' ";
    $query .= "ORDER BY comment_id DESC ";
    $select_comment_query = mysqli_query($connection, $query);

    if (!$select_comment_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_comment_query)) {
        $date = DateTime::createFromFormat('Y-m-d', $row['comment_date']);
        $comment_date = $date->format('F d, Y');
        $comment_content = $row['comment_content'];
        $comment_author = $row['comment_author'];


        echo "<div class='media'>
                <a class='pull-left' href='#'>
                    <img class='media-object' src='http://placehold.it/64x64' alt=''>
                </a>
                <div class='media-body'>
                    <h4 class='media-heading'>$comment_author
                        <small>$comment_date</small>
                    </h4>
                    $comment_content
                </div>
            </div>";

    }

    ?>
