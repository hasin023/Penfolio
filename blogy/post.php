<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>

<?php

if (isset($_GET['p_id'])) {
  $the_post_id = $_GET['p_id'];
}

$view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
$send_query = mysqli_query($connection, $view_query);


if (!$send_query) {
  die("QUERY FAILED" . mysqli_error($connection));
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

$select_post_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_post_query)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
  $post_date = $date->format('F d, Y');
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];


  echo "  
      <div class='site-cover site-cover-sm same-height overlay single-page' style='background-image: url(\"images/$post_image\");'>
        <div class='container'>
          <div class='row same-height justify-content-center'>
            <div class='col-md-6'>
              <div class='post-entry text-center'>
                <h1 class='mb-4'>$post_title</h1>
                <div class='post-meta align-items-center text-center'>
                  <span class='d-inline-block mt-1'>By <a href='author_posts.php?author=$post_author&p_id=$post_id'>$post_author</a></span>
                  <span>&nbsp;-&nbsp; $post_date</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";

}

?>


  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">

            <p class="text-dark"></p><?php echo $post_content ?></p>
           
          </div>


          <?php include("includes/comment.php"); ?>

        </div>

        <!-- END main-content -->

        <?php include("includes/sidebar.php"); ?>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

  

<?php include("includes/footer.php"); ?>