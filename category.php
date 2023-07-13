<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>



    <div class="section search-result-wrap">
      <div class="container">


      <?php
      if (isset($_GET['category'])) {
        $the_category_id = escape($_GET['category']);
      }

      $cat_query = "SELECT * FROM categories WHERE cat_id = $the_category_id";
      $select_categories = mysqli_query($connection, $cat_query);

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);

        echo "<div class='row'>
              <div class='col-12'>
              <div class='heading'>Category: $cat_title</div>
              </div>
              </div>";
      }

      ?>


        <div class="row posts-entry">
          <div class="col-lg-8">


          <?php

          $per_page = 4;

          $post_count_query = "SELECT * FROM posts WHERE post_status = 'published' AND post_category_id = $the_category_id";
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

          $query = "SELECT * FROM posts WHERE post_status = 'published' AND post_category_id = $the_category_id LIMIT $page_1, $per_page";
          $select_all_posts_query = mysqli_query($connection, $query);

          if (mysqli_num_rows($select_all_posts_query) == 0) {
            echo "<div class='row'>
                  <div class='col-12'>
                  <div class='heading'>No posts found.</div>
                  </div>
                  </div>";
          } else {

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
              $post_id = escape($row['post_id']);
              $post_title = escape($row['post_title']);
              $post_author = escape($row['post_author']);
              $date = DateTime::createFromFormat('Y-m-d', escape($row['post_date']));
              $post_date = $date->format('F d, Y');
              $post_image = escape($row['post_image']);
              $post_content = substr(escape($row['post_content']), 0, 250) . "...";

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
            

            <div class="row text-start pt-5 border-top">
              <div class="col-md-12">
                  <div class="custom-pagination">

                    <?php

                    for ($i = 1; $i <= $count; $i++) {
                      if ($i == $page) {
                        echo "<a class='bg-dark mx-1' href='category.php?category={$cat_id}&page={$i}'>{$i}</a>";
                      } else {
                        echo "<a class='mx-1' href='category.php?category={$cat_id}&page={$i}'>{$i}</a>";
                      }
                    }

                    ?>

                  </div>
              </div>
          </div>
        
          </div>

          <?php include("includes/sidebar.php"); ?>
        </div>
      </div>
    </div>


<?php include("includes/footer.php"); ?>