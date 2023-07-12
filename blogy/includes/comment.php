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



<div class="pt-5 comment-wrap">
          <?php

          $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $query .= "AND comment_status = 'approved' ";
          $query .= "ORDER BY comment_id DESC ";
          $select_comment_query = mysqli_query($connection, $query);

          if (!$select_comment_query) {
            die("QUERY FAILED" . mysqli_error($connection));
          }

          $count = mysqli_num_rows($select_comment_query);

          if ($count > 1) {
            echo "<h3 class='mb-5 heading'>$count Comments</h3>";
          } else {
            echo "<h3 class='mb-5 heading'>$count Comment</h3>";
          }


          ?>

            
            <ul class="comment-list">


            <?php

            while ($row = mysqli_fetch_array($select_comment_query)) {
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
              <form action="#" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>