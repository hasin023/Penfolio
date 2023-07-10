<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <form action="" method="post">

                <div id="bulkOptionsContainer" class="mb-4 col-xs-4">
                    <select class="form-control" name="bulk_options" id="">
                        <option value="">Select Options</option>
                        <option value="published">Publish</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                        <!-- <option value="clone">Clone</option> -->
                    </select>
                </div>

                <div class="col-xs-4">
                    <input type="submit" name="submit" class="btn btn-success" value="Apply">
                    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
                </div>

                <table class="mt-4 table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                            <th class="text-dark text-center">ID</th>
                            <th class="text-dark text-center">Author</th>
                            <th class="text-dark text-center">Title</th>
                            <th class="text-dark text-center">Category</th>
                            <th class="text-dark text-center">Status</th>
                            <th class="text-dark text-center">Thumbnail</th>
                            <th class="text-dark text-center">Tags</th>
                            <th class="text-dark text-center">Comments</th>
                            <th class="text-dark text-center">Published</th>
                            <th class="text-dark text-center">Edit</th>
                            <th class="text-dark text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php showAllPosts(); ?>

                    </tbody>
                </table>
            </form>

            <?php
            if (isset($_GET['delete'])) {
                $post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id = {$post_id} ";
                $delete_query = mysqli_query($connection, $query);

                confirmQuery($delete_query);

                header("Location: posts.php");
            }


            ?>

            
        </div>
    </div>
</div>