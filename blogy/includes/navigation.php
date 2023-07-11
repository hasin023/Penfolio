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
            <form action="#" class="search-form d-inline-block d-lg-none">
              <input
                type="text"
                class="form-control"
                placeholder="Search..."
              />
              <span class="bi-search"></span>
            </form>

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

                  echo "<li>
                            <a href='#'>$cat_title</a>
                        </li>";
                }

                ?>

                </ul>
              </li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="admin">Admin</a></li>
            </ul>
          </div>
          <div class="col-2 text-end">
            <a
              href="#"
              class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
            >
              <span></span>
            </a>
            <form action="#" class="search-form d-none d-lg-inline-block">
              <input
                type="text"
                class="form-control"
                placeholder="Search..."
              />
              <span class="bi-search"></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>