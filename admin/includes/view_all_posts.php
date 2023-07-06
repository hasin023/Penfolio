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
                        <th class="text-dark text-center">Thumbnail</th>
                        <th class="text-dark text-center">Tags</th>
                        <th class="text-dark text-center">Comments</th>
                        <th class="text-dark text-center">Published</th>
                    </tr>
                </thead>
                <tbody>

                <?php showAllPosts(); ?>

                </tbody>
            </table>

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