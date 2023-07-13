<div class="col-lg-4 sidebar">

    <div class="sidebar-box search-form-wrap mb-4">
        <form action="search.php" method="post" class="sidebar-search-form">

            <div class="input-group">
                <input name="search" type="text" class="form-control" id="s" placeholder="Type a keyword">
                <span class="input-group-btn">
                    <input  name="submit" class="btn btn-success" type="submit" value="SEARCH">
                </span>
            </div>

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
            $post_id = escape($row['post_id']);
            $post_title = escape($row['post_title']);
            $date = DateTime::createFromFormat('Y-m-d', escape($row['post_date']));
            $post_date = $date->format('F d, Y');
            $post_image = escape($row['post_image']);


            echo "<li>
                        <a href='post.php?p_id=$post_id'>
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
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);

        echo "<li>
                <a href='category.php?category=$cat_id'>$cat_title</a>
            </li>";
    }

    ?>

    </ul>
    </div>
    <!-- END sidebar-box -->


</div>