<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>

  <!-- Special section for the BLog Page -->
  <div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3" data-aos="fade-up">Penfolio</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- /Special section for the BLog Page -->

  <div class="section search-result-wrap">
    <div class="container">
      
      <div class="row posts-entry">
        <div class="col-lg-8">


        <?php

        $per_page = 4;

        $post_count_query = "SELECT * FROM posts WHERE post_status = 'published'";
        $find_count = mysqli_query($connection, $post_count_query);

        $count = mysqli_num_rows($find_count);
        $count = ceil($count / $per_page);

        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = "";
        }

        if ($page == "" || $page == 1) {
          $page_1 = 0;
        } else {
          $page_1 = ($page * $per_page) - $per_page;
        }

        $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, $per_page";
        $select_all_posts_query = mysqli_query($connection, $query);

        if (mysqli_num_rows($select_all_posts_query) == 0) {
          echo "<h1 class='text-center'>No Posts Published</h1>";
        }


        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
          $post_date = $date->format('F d, Y');
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'], 0, 80) . "...";
          $post_status = $row['post_status'];

          $cat_query = "SELECT * FROM categories WHERE cat_id = {$row['post_category_id']}";
          $select_categories = mysqli_query($connection, $cat_query);

          confirmQuery($select_categories);

          while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
          }


          if ($post_status !== 'published') {
            echo "<h1 class='text-center'>No Posts Published</h1>";
          } else {

            echo "
                <div class='blog-entry d-flex blog-entry-search-item'>
                <a href='post.php?p_id=$post_id' class='img-link me-4'>
                <img src='images/$post_image' alt='Post Image' class='img-fluid'>
                </a>
                <div>
                <span class='date'>$post_date &bullet; <a href='#'>$cat_title</a></span>
                <h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>
                <p>$post_content</p>
                <p><a href='post.php?p_id=$post_id' class='btn btn-sm btn-outline-primary'>Read More</a></p>
                </div>
                </div>
            
            ";


          }

        }

        ?>


          <div class="row text-start pt-5 border-top">
              <div class="col-md-12">
                  <div class="custom-pagination">

                    <?php

                    for ($i = 1; $i <= $count; $i++) {
                      if ($i == $page) {
                        echo "<a class='bg-dark mx-1' href='index.php?page={$i}'>{$i}</a>";
                      } else {
                        echo "<a class='mx-1' href='index.php?page={$i}'>{$i}</a>";
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