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
                    <h1 class="h3 mb-4 text-gray-800">All Posts</h1>

                    <!-- Add Tables -->
                    <?php include("includes/view_all_posts.php"); ?>
                    <!-- Add Tables Ended -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/admin_footer.php"); ?>