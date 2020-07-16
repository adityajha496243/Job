<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="admin/index.php?login=admin&&function=jobs">Jobs</a></li>
			<li><a href="admin/index.php?login=admin&&function=categories">Categories</a></li>

		</ul>
	</section>

	<section class="right">
		<div id="right_message"></div>

		<?php

		if (!isset($_POST['submit'])) {
			$pdo = new PDO("mysql:host=localhost;dbname=job","root","");
			$getId = $_GET['id'];
			$fetch = $pdo->prepare('SELECT * FROM job WHERE id = :id');
			$fetch->execute(array('id' => $getId));
			$job = $fetch->fetchAll();

			foreach ($job as $value) {
				?>

				<h2>Apply for <?php echo $value['title']; }?></h2>

				<form action="index.php?function=apply" method="POST" enctype="multipart/form-data">
					<label>Your name</label>
					<input type="text" name="name" />

					<label>E-mail address</label>
					<input type="text" name="email" />

					<label>Cover letter</label>
					<textarea name="details"></textarea>

					<label>CV</label>
					<input type="file" name="cv" />

					<input type="hidden" name="jobId" value="<?=$value['id'];?>" />

					<input type="submit" name="submit" value="Apply" />

				</form>



				<?php

			}




			?>

		</section>
	</main>