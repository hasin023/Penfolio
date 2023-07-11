<div class="col-lg-4 sidebar">

    <div class="sidebar-box search-form-wrap mb-4">
    <form action="#" class="sidebar-search-form">
        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
    </form>
    </div>
    <!-- END sidebar-box -->
    <div class="sidebar-box">
    <h3 class="heading">Popular Posts</h3>
    <div class="post-entry-sidebar">
        <ul>
        <li>
            <a href="">
            <img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
            <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                <span class="mr-2">March 15, 2018 </span>
                </div>
            </div>
            </a>
        </li>
        <li>
            <a href="">
            <img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
            <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                <span class="mr-2">March 15, 2018 </span>
                </div>
            </div>
            </a>
        </li>
        <li>
            <a href="">
            <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
            <div class="text">
                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                <div class="post-meta">
                <span class="mr-2">March 15, 2018 </span>
                </div>
            </div>
            </a>
        </li>
        </ul>
    </div>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
    <h3 class="heading">Categories</h3>
    <ul class="categories">

    <?php

    $query = "SELECT * FROM categories ORDER BY RAND() LIMIT 5";
    $select_all_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row['cat_title'];

        echo "<li>
                <a href='#'>$cat_title</a>
            </li>";
    }

    ?>

    </ul>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
    <h3 class="heading">Tags</h3>
    <ul class="tags">
        <li><a href="#">Travel</a></li>
        <li><a href="#">Adventure</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Lifestyle</a></li>
        <li><a href="#">Business</a></li>
        <li><a href="#">Freelancing</a></li>
        <li><a href="#">Travel</a></li>
        <li><a href="#">Adventure</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Lifestyle</a></li>
        <li><a href="#">Business</a></li>
        <li><a href="#">Freelancing</a></li>
    </ul>
    </div>

</div>