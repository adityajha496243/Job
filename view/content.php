	<main class="sidebar">

		<section class="left">
			<ul>
				<li  class="current" ><a href="index.php?function=it">IT</a></li>
				<li><a href="index.php?function=hr">Human Resources</a></li>
				<li><a href="index.php?function=sales">Sales</a></li>
			</ul>
		</section>

		<section class="right">

			<h1><?php echo $arr['name']?> Jobs</h1>

			<ul class="listing">

				<?php
				//include ('controller/home.php');

				if(isset($_GET['function']) && $_GET['function']){
					it();
				}else{
					echo "Something went wrong";
				}

				?>

			</ul>

		</section>
	</main>