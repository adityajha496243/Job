<section class="left">
			<ul>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					
				?>
				<li><a href="index.php?login=admin&&function=manageUser">Manage User</a></li>
				<?php } ?>
				
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
					
				?>
				<li><a href="index.php?login=admin&&function=categories">Categories</a></li>
				<?php } ?>

				<li><a href="index.php?login=admin&&function=jobs">Jobs</a></li>
				<li><a href="index.php?login=admin&&function=recycle">Recycled Jobs</a></li>

				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  || isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
					
				?>
				<li><a href="index.php?login=admin&&function=enquiry">Enquries</a></li>
				<?php } ?>

				
				

			</ul>
</section>