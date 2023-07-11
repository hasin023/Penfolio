
<!-- Header -->
<?php include("includes/header.php"); ?>


<!-- Navigation -->
<?php include("includes/navigation.php"); ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

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

                    echo "<h1>$post_title</h1>

                        <p class='lead'>
                        by <a href='#'>$post_author</a>
                        </p>

                        <hr>

                        <p><span class='glyphicon glyphicon-time'></span> Posted on $post_date</p>

                        <hr>

                        <img class='img-responsive' src='images/$post_image' alt='Blog Post Image'>

                        <hr>

                        <p class=''>$post_content</p>

                        <hr>";
                }

                ?>

                <!-- Blog Comments -->
                <?php include("includes/comment.php"); ?>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php"); ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include("includes/footer.php"); ?>