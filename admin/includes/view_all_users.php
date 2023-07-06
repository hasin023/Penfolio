<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-dark text-center">ID</th>
                        <th class="text-dark text-center">Username</th>
                        <th class="text-dark text-center">Firstname</th>
                        <th class="text-dark text-center">Lastname</th>
                        <th class="text-dark text-center">Email</th>
                        <th class="text-dark text-center">Role</th>
                        <th class="text-dark text-center">Edit</th>
                        <th class="text-dark text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php showAllUsers(); ?>

                </tbody>
            </table>

            <?php

            if (isset($_GET['change_to_admin'])) {
                $user_id = $_GET['change_to_admin'];

                $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id} ";
                $admin_query = mysqli_query($connection, $query);

                confirmQuery($admin_query);

                header("Location: users.php");
            }


            if (isset($_GET['change_to_sub'])) {
                $user_id = $_GET['change_to_sub'];

                $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id} ";
                $sub_query = mysqli_query($connection, $query);

                confirmQuery($sub_query);

                header("Location: users.php");
            }


            if (isset($_GET['delete'])) {
                $user_id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id = {$user_id} ";
                $delete_query = mysqli_query($connection, $query);

                confirmQuery($delete_query);

                header("Location: users.php");
            }


            ?>

            
        </div>
    </div>
</div>