<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="admin/jobs.php">Jobs</a></li>
			<li><a href="admin/categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

<?php

		if (isset($_POST['submit'])) {





		if ($_FILES['cv']['error'] == 0) {

			$parts = explode('.', $_FILES['cv']['name']);

			$extension = end($parts);

			$fileName = uniqid() . '.' . $extension;

			move_uploaded_file($_FILES['cv']['tmp_name'], 'cvs/' . $fileName);

			$criteria = [
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'details' => $_POST['details'],
				'jobId' => $_POST['jobId'],
				'cv' => $fileName
			];

			$stmt = $pdo->prepare('INSERT INTO applicants (name, email, details, jobId, cv)
							   VALUES (:name, :email, :details, :jobId, :cv)');

			$stmt->execute($criteria);

			echo 'Your application is complete. We will contact you after the closing date.';


		}
		else {
			echo 'There was an error uploading your CV';
		}



	}
	else {
		$pdo = new PDO("mysql:host=localhost;dbname=job","root","");
		$getId = $_GET['id'];
			$fetch = $pdo->prepare('SELECT * FROM job WHERE id = :id');
			$fetch->execute(array('id' => $getId));
			$job = $fetch->fetchAll();

			foreach ($job as $value) {
			?>

			<h2>Apply for <?php echo $value['title']; }?></h2>

			<form action="apply.php" method="POST" enctype="multipart/form-data">
				<label>Your name</label>
				<input type="text" name="name" />

				<label>E-mail address</label>
				<input type="text" name="email" />

				<label>Cover letter</label>
				<textarea name="details"></textarea>

				<label>CV</label>
				<input type="file" name="cv" />

				<input type="hidden" name="jobId" value="<?=$job['id'];?>" />

				<input type="submit" name="submit" value="Apply" />

			</form>



		<?php

	}




	?>

</section>
</main>