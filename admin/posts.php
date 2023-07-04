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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-dark text-center">ID</th>
                                            <th class="text-dark text-center">Author</th>
                                            <th class="text-dark text-center">Title</th>
                                            <th class="text-dark text-center">Category</th>
                                            <th class="text-dark text-center">Status</th>
                                            <th class="text-dark text-center">Image</th>
                                            <th class="text-dark text-center">Tags</th>
                                            <th class="text-dark text-center">Comments</th>
                                            <th class="text-dark text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Miles Morales</td>
                                            <td class="text-center">Spiderman - Across the spider-verse</td>
                                            <td class="text-center">Movies</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Image</td>
                                            <td class="text-center">MCU, Spiderman</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">09-12-2003</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">Miles Morales</td>
                                            <td class="text-center">Spiderman - Across the spider-verse</td>
                                            <td class="text-center">Movies</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Image</td>
                                            <td class="text-center">MCU, Spiderman</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">09-12-2003</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">Miles Morales</td>
                                            <td class="text-center">Spiderman - Across the spider-verse</td>
                                            <td class="text-center">Movies</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Image</td>
                                            <td class="text-center">MCU, Spiderman</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">09-12-2003</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-center">Miles Morales</td>
                                            <td class="text-center">Spiderman - Across the spider-verse</td>
                                            <td class="text-center">Movies</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Image</td>
                                            <td class="text-center">MCU, Spiderman</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">09-12-2003</td>
                                        </tr>


                                    <?php ?>

                                    <?php ?>

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