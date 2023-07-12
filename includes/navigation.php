<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close">
      <span class="icofont-close js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <div class="row g-0 align-items-center">
          <div class="col-2">
            <a href="index.php" class="logo m-0 float-start"
              >PENFOLIO<span class="text-primary">.</span></a
            >
          </div>
          <div class="col-8 text-center">

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto"
            >
              <li class="active"><a href="index.php">Home</a></li>
              <li class="has-children">
                <a href="category.php">Categories</a>
                <ul class="dropdown">


                <?php

                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                  $cat_title = $row['cat_title'];
                  $cat_id = $row['cat_id'];

                  echo "<li>
                          <a href='category.php?category=$cat_id'>$cat_title</a>
                        </li>";
                }

                ?>

                </ul>
              </li>


              <li><a href="includes/register.php">Register</a></li>

                <?php

                if (isset($_SESSION['user_role'])) {
                  if ($_SESSION['user_role'] == 'admin') {
                    echo "<li><a href='admin/index.php'>Admin</a></li>";
                  } else {
                    echo "<li><a href='includes/logout.php'>Logout</a></li>";
                  }
                } else {
                  echo "<li><a href='includes/login.php'>Login</a></li>";
                }

                ?>

            </ul>
          </div>
          <div class="col-2 text-end">
            <a
              href="#"
              class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
            >
              <span></span>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</nav>