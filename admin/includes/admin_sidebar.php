<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="rotate-n-15 sidebar-brand-icon">
                    <i class="fas fa-unlock"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Blog
            </div>

            <!-- Nav Item - Posts Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts_dropdown"
                    aria-expanded="true" aria-controls="posts_dropdown">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Posts</span>
                </a>
                <div id="posts_dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Post Controls</h6>
                        <a class="collapse-item" href="posts.php?source=add_post">Add Post</a>
                        <a class="collapse-item" href="posts.php">View Posts</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Comments -->
            <li class="nav-item">
                <a class="nav-link" href="comments.php">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Comments</span></a>
            </li>

            <!-- Nav Item - Categories Menu -->
            <li class="nav-item">
                <a class="nav-link" href="categories.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Categories</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin Panel
            </div>

           <!-- Nav Item - Users Collapse Menu -->
           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Controls:</h6>
                        <a class="collapse-item" href="#">Some User</a>
                        <a class="collapse-item" href="#">Some User</a>
                        <a class="collapse-item" href="#">Some User</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Profile -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>