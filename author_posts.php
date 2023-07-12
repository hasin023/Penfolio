<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>



    <div class="section search-result-wrap">
      <div class="container">


      <?php
      if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        $author = $_GET['author'];

      }

      $author_query = "SELECT * FROM posts WHERE post_author = '{$author}'";
      $select_post_query = mysqli_query($connection, $author_query);

      while ($row = mysqli_fetch_assoc($select_post_query)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
      }

      echo "<div class='row'>
      <div class='col-12'>
      <div class='heading'>Author: $post_author</div>
      </div>
      </div>";

      ?>


        <div class="row posts-entry">
          <div class="col-lg-8">


          <?php

          if (isset($_GET['p_id'])) {
            $the_post_id = $_GET['p_id'];
            $author = $_GET['author'];

          }



          $query = "SELECT * FROM posts WHERE post_author = '{$author}'";
          $select_post_query = mysqli_query($connection, $query);

          if (mysqli_num_rows($select_post_query) == 0) {
            echo "<div class='row'>
                  <div class='col-12'>
                  <div class='heading'>No posts found.</div>
                  </div>
                  </div>";
          } else {

            while ($row = mysqli_fetch_assoc($select_post_query)) {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
              $post_date = $date->format('F d, Y');
              $post_image = $row['post_image'];
              $post_content = substr($row['post_content'], 0, 250) . "...";

              $cat_query = "SELECT * FROM categories WHERE cat_id = {$row['post_category_id']}";
              $select_categories = mysqli_query($connection, $cat_query);

              confirmQuery($select_categories);

              while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
              }

              echo "
              <div class='blog-entry d-flex blog-entry-search-item'>
              <a href='post.php?p_id=$post_id' class='img-link me-4'>
                <img src='images/$post_image' alt='Image' class='img-fluid' />
              </a>
              <div>
                <span class='date'
                  >$post_date &bullet; <a href='#'>$cat_title</a></span
                >
                <h2>
                  <a href='post.php?p_id=$post_id'
                    >$post_title</a
                  >
                </h2>
                <p>
                $post_content
                </p>
                <p>
                  <a href='post.php?p_id=$post_id' class='btn btn-sm btn-outline-primary'
                    >Read More</a
                  >
                </p>
              </div>
            </div>";
            }
          }

          ?>
            

          <?php include("includes/pagination.php"); ?>

          </div>

          <?php include("includes/sidebar.php"); ?>
        </div>
      </div>
    </div>


<?php include("includes/footer.php"); ?>