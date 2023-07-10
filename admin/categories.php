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
                    <h1 class="h3 mb-4 text-gray-800">Categories</h1>


                    <!-- Add Categories -->
                    <div class="col-xs-6">

                    <?php insert_Categories() ?>

                        <form action="" method="post">

                            <div class="form-group">
                                <input class="form-control bg-light border-1 small" type="text" name="cat_title" placeholder="Category Title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>

                        <?php
                        //Updating Categories
                        
                        if (isset($_GET['edit'])) {

                            include("includes/update_categories.php");

                        }
                        ?>  
                       
                    </div>
                    <!-- Add Categories Ended-->



                    <!-- Add Tables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-dark">ID</th>
                                            <th class="text-dark text-center">Category Title</th>
                                            <th class="text-dark text-center">Edit</th>
                                            <th class="text-dark text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php showAllCategories(); ?>

                                    <?php deleteCategory(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Add Tables Ended -->
                    



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<!-- Footer -->
<?php include("includes/admin_footer.php"); ?>