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

                    <?php

                    if (isset($_POST['submit'])) {
                        $cat_title = $_POST['cat_title'];

                        if (empty($cat_title) || $cat_title == "") {
                            echo "<p class='text-danger'>Invalid Title</p>";
                        } else {
                            $query = "INSERT INTO categories(cat_title) ";
                            $query .= "VALUE('{$cat_title}')";

                            $create_category_query = mysqli_query($connection, $query);

                            if (!$create_category_query) {
                                die("Query Faield" . mysqli_error($connection));
                            }
                        }
                    }

                    ?>

                        <form action="" method="post">

                            <div class="form-group">
                                <input class="form-control bg-light border-1 small" type="text" name="cat_title" placeholder="Category Title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>
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
                                            <th class="text-dark">Category Title</th>
                                            <!-- <th class="text-dark">Delete Category</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    //Showing all categories
                                    $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($select_categories)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        echo "<tr>
                                                <td class='text-dark'>$cat_id</td>
                                                <td class='text-dark'>$cat_title</td>
                                                <td><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>DELETE</a></td>
                                            </tr>";
                                    }

                                    ?>

                                    <?php
                                    //Deleting categories
                                    
                                    if (isset($_GET['delete'])) {
                                        $the_cat_id = $_GET['delete'];

                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                        $delete_category = mysqli_query($connection, $query);

                                        header("Location: categories.php");
                                    }


                                    ?>

                                        <!-- <tr>
                                            <td>01</td>
                                            <td>Comics</td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>TV Shows</td> -->
                                        </tr>
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