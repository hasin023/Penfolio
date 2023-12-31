<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>

	<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">

				<?php

				if (isset($_POST['search'])) {
					$search = escape($_POST["search"]);

					echo "<div class='heading'>Search: '$search'</div>";
				}

				?>

				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">


				<?php


				if (isset($_POST['search'])) {

					$search = escape($_POST["search"]);

					$query = "SELECT * FROM posts WHERE post_status = 'published' AND post_tags LIKE '%$search%' OR post_title LIKE '%$search%' OR post_author LIKE '%$search%'";
					$search_query = mysqli_query($connection, $query);

					if (!$search_query) {
						die("Query Failed" . mysqli_error($connection));
					}

					$count = mysqli_num_rows($search_query);

					if ($count == 0) {
						echo "<div class='row'>
								<div class='col-12'>
								<div class='heading'>No posts found.</div>
								</div>
								</div>";
					} else {


						while ($row = mysqli_fetch_assoc($search_query)) {
							$post_id = escape($row['post_id']);
							$post_title = escape($row['post_title']);
							$post_author = escape($row['post_author']);
							$date = DateTime::createFromFormat('Y-m-d', escape($row['post_date']));
							$post_date = $date->format('F d, Y');
							$post_image = escape($row['post_image']);
							$post_content = substr(escape($row['post_content']), 0, 250) . "...";

							echo "
								<div class='blog-entry d-flex blog-entry-search-item'>
								<a href='post.php?p_id=$post_id' class='img-link me-4'>
								<img src='images/$post_image' alt='Post Image' class='img-fluid'>
								</a>
								<div>
								<span class='date'>$post_date</span>
								<h2><a href='post.php?p_id=$post_id'>$post_title</a></h2>
								<p>$post_content</p>
								<p><a href='post.php?p_id=$post_id' class='btn btn-sm btn-outline-primary'>Read More</a></p>
								</div>
								</div>";
						}


					}
				}


				?>

				</div>

				<?php include("includes/sidebar.php"); ?>
				
			</div>
		</div>
	</div>

	

<?php include("includes/footer.php"); ?>