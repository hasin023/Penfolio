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

        <?php

        $query = "SELECT * FROM posts ORDER BY post_views_count DESC LIMIT 4";
        $select_all_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
            $post_date = $date->format('F d, Y');
            $post_image = $row['post_image'];


            echo "<li>
                        <a href='single.php?p_id=$post_id'>
                        <img src='images/$post_image' alt='Image placeholder' class='mr-4'>
                        <div class='ml-6 text'>
                            <h4>$post_title</h4>
                            <div class='post-meta'>
                            <span class='mr-2'>$post_date </span>
                            </div>
                        </div>
                        </a>
                    </li>";
        }

        ?>
        
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
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li>
                <a href='category.php?category=$cat_id'>$cat_title</a>
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