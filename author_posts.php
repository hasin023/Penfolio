
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
                    $autor = $_GET['author'];

                }

                $query = "SELECT * FROM posts WHERE post_author = '{$autor}'";

                $select_post_query = mysqli_query($connection, $query);

                echo "<h1 class='page-header'>
                            Author Posts
                            <small>All posts by $autor</small>
                        </h1>";

                while ($row = mysqli_fetch_assoc($select_post_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
                    $post_date = $date->format('F d, Y');
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 250) . "...";


                    echo "<h2>
                        <a href='post.php?p_id=$post_id'>$post_title</a>
                        </h2>

                        <p><span class='glyphicon glyphicon-time'></span> Posted on $post_date</p>
                        <hr>
                        <img class='img-responsive' src='images/$post_image' alt='Blog Post Image'>
                        <hr>
                        <p>$post_content</p>
                        <a class='btn btn-primary' href='post.php?p_id=$post_id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                        <hr>";
                }

                ?>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php"); ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include("includes/footer.php"); ?>