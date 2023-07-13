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

    //Old Comment Count
    // $query = "UPDATE posts SET post_comment_counts = post_comment_counts + 1 ";
    // $query .= "WHERE post_id = $the_post_id ";
    // $update_comment_count = mysqli_query($connection, $query);

  } else {
    echo "<script>alert('Fields cannot be empty')</script>";
  }

}

?>



<div class="pt-5 comment-wrap">
          <?php

          $comment_query_count = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $comment_query_count .= "AND comment_status = 'approved' ";
          $comment_query_count .= "ORDER BY comment_id DESC ";
          $count_comment_query = mysqli_query($connection, $comment_query_count);

          if (!$count_comment_query) {
            die("QUERY FAILED" . mysqli_error($connection));
          }

          $count = mysqli_num_rows($count_comment_query);

          if ($count > 1) {
            echo "<h3 class='mb-5 heading'>$count Comments</h3>";
          } else {
            echo "<h3 class='mb-5 heading'>$count Comment</h3>";
          }


          ?>

            
            <ul class="comment-list">


            <?php

            $get_comment_query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $get_comment_query .= "AND comment_status = 'approved' ";
            $get_comment_query .= "ORDER BY comment_id DESC ";
            $render_comment_query = mysqli_query($connection, $get_comment_query);

            if (!$render_comment_query) {
              die("QUERY FAILED" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_array($render_comment_query)) {
              $date = DateTime::createFromFormat('Y-m-d', $row['comment_date']);
              $comment_date = $date->format('F d, Y');
              $comment_content = $row['comment_content'];
              $comment_author = $row['comment_author'];


              echo "
                  <li class='comment'>
                  <div class='vcard'>
                  <img src='images/comment_user.png' alt='Image placeholder'>
                  </div>
                  <div class='comment-body'>
                  <h3>$comment_author</h3>
                  <div class='meta'>$comment_date</div>
                  <p>$comment_content</p>
                  </div>
                  </li>
              ";

            }

            ?>


            </ul>
            <!-- END comment-list -->



            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="" method="post" role="form" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" placeholder="Name" name="comment_author" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" placeholder="Email" name="comment_email" class="form-control" id="email">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="comment_content" placeholder="Write your comment.." id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" name="create_comment" value="Post Comment" class="btn btn-success">
                </div>

              </form>
            </div>
          </div>