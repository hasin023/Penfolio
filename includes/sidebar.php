<div class="col-md-4">

<!-- Blog Search Well -->


<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">

        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>

    </form>
    <!-- /.input-group -->
</div>


<!-- Login Page -->
<?php

$style = "";
$text = "Sign in to your account?";

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == 'admin') {
        $style = "style='display:none;'";
    } else if ($_SESSION['user_role'] !== 'admin') {
        $text = "Sign in to your Admin account?";
        $style = "style='display:block;'";
    }
}

?>

<div class="well" <?php echo $style; ?>>
    <h4 class="text-center"><?php echo $text; ?></h4>
    <a href="includes/login.php" class="btn btn-block btn-warning">LOGIN</a>
</div>


<!-- Blog Categories Well -->

<div class="well">

    <?php
    $query = "SELECT * FROM categories ORDER BY RAND() Limit 4";
    $select_categories_sidebar = mysqli_query($connection, $query);
    ?>


    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php

            while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<li>
                        <a href='category.php?category=$cat_id'>$cat_title</a>
                    </li>";
            }

            ?>

            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>




<!-- Side Widget Well -->
<?php include("includes/widget.php"); ?>

</div>
