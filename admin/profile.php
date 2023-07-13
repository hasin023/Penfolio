<?php include("includes/admin_header.php"); ?>


<?php

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_profile_query = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_array($select_user_profile_query)) {
    $user_id = escape($row['user_id']);
    $username = escape($row['username']);
    $user_firstname = escape($row['user_firstname']);
    $user_lastname = escape($row['user_lastname']);
    $user_email = escape($row['user_email']);
    $user_role = escape($row['user_role']);
    $user_image = escape($row['user_image']);
  }
}


?>


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



<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/users/<?php echo $user_image; ?>" alt="Admin Image" class="img-profile rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $user_firstname . " " . $user_lastname; ?></h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user_firstname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user_lastname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $username; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user_email; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Role</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user_role; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>


</div>
        <!-- End of Main Content -->

<!-- Footer -->
<?php include("includes/admin_footer.php"); ?>