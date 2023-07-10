<?php include("includes/admin_header.php"); ?>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("includes/admin_sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("includes/admin_topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Posts Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Posts</div>

                <?php

                $query = "SELECT * FROM posts";
                $select_all_posts = mysqli_query($connection, $query);
                $post_counts = mysqli_num_rows($select_all_posts);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$post_counts}</div>";

                ?>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">12</div> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="posts.php" class="btn btn-primary " style=" width: 7.4rem; margin-left: 8rem;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Categories</div>

                <?php

                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);
                $categories_counts = mysqli_num_rows($select_all_categories);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$categories_counts}</div>";

                ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="categories.php" class="btn btn-info " style=" width: 7.4rem; margin-left: 8rem;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Users Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Users</div>

                <?php

                $query = "SELECT * FROM users";
                $select_all_users = mysqli_query($connection, $query);
                $users_counts = mysqli_num_rows($select_all_users);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$users_counts}</div>";

                ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="users.php" class="btn btn-success " style=" width: 7.4rem; margin-left: 8rem;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Comments</div>


                <?php

                $query = "SELECT * FROM comments";
                $select_all_comments = mysqli_query($connection, $query);
                $comments_counts = mysqli_num_rows($select_all_comments);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$comments_counts}</div>";

                ?> 

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="comments.php" class="btn btn-warning " style=" width: 7.4rem; margin-left: 8rem;">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-8">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Blog Activity</h6>
                                </div>
                                <div class="card-body">
                    
                                    <h4 class="small font-weight-bold">Active Posts 

                <?php

                $query = "SELECT * FROM posts WHERE post_status = 'published'";
                $select_all_published_posts = mysqli_query($connection, $query);

                $post_published_counts = mysqli_num_rows($select_all_published_posts);

                $post_percentage = ($post_published_counts / $post_counts) * 100;

                echo "<span class='float-right'>{$post_percentage}%</span>";

                ?> 

                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $post_percentage; ?>%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold">Subscribers

                <?php

                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $select_all_subscribers = mysqli_query($connection, $query);

                $subscribers_counts = mysqli_num_rows($select_all_subscribers);

                $subscribers_percentage = ($subscribers_counts / $users_counts) * 100;

                echo "<span class='float-right'>{$subscribers_percentage}%</span>";

                ?>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $subscribers_percentage; ?>%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Approved Comments 

                <?php

                $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                $select_all_approved_comments = mysqli_query($connection, $query);

                $approved_comments_counts = mysqli_num_rows($select_all_approved_comments);

                $approved_comments_percentage = ($approved_comments_counts / $comments_counts) * 100;

                echo "<span class='float-right'>{$approved_comments_percentage}%</span>";

                ?>

                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $approved_comments_percentage; ?>%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/admin_footer.php"); ?>
            