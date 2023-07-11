
<!-- Header -->
<?php include("includes/header.php"); ?>


<!-- Navigation -->
<?php include("includes/navigation.php"); ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->


            <div class="col-md-8">


            <?php


            if (isset($_POST['search'])) {

                $search = $_POST["search"];

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die("Query Failed" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if ($count == 0) {
                    echo "<h3>NO RESULT</h3>";
                } else {

                    echo "<h1 class='page-header'>
                            Tag Posts
                        </h1>";


                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
                        $post_date = $date->format('F d, Y');
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 250) . "...";

                        echo "
                            <h2>
                                <a href='#'>$post_title</a>
                            </h2>
                            <p class='lead'>
                                by <a href='index.php'>$post_author</a>
                            </p>
                            <p><span class='glyphicon glyphicon-time'></span> Posted on $post_date</p>
                            <hr>
                            <img class='img-responsive' src='images/$post_image' alt='Blog Post Image'>
                            <hr>
                            <p>$post_content</p>
                            <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                            <hr>";
                    }



                }
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