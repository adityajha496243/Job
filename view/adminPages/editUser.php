	<main class="sidebar">

		<section class="left">
			<ul>
				<li><a href="index.php?login=admin&&function=manageUser">Manage User</a></li>
				<li><a href="index.php?login=admin&&function=jobs">Jobs</a></li>
				<li><a href="index.php?login=admin&&function=categories">Categories</a></li>

			</ul>
		</section>

		<section class="right">
			<div id="right_message"></div>

			<?php


			if (!isset($_POST['submit'])) {
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

					$stmt = $pdo->prepare('SELECT * FROM multiuserlogin WHERE id = :id');

					$stmt->execute(array("id"=>$_GET['id']));

					$multiuserlogin = $stmt->fetch();
					?>

					<h2>Edit Job</h2>

					<form action="" method="POST">

						<input type="hidden" name="id" value="<?php echo $multiuserlogin['id']; ?>" />
						<label>Username</label>
						<input type="text" name="username" value="<?php echo $multiuserlogin['username']; ?>" />

						<label>Usertype</label>
						<select name="usertype">
							<?php
							if($multiuserlogin['usertype'] == admin){
								echo "<option value='admin'>Admin</option>";
								echo "<option value='client'>Client</option>";
							}else{
								echo "<option value='client'>Client</option>";
								echo "<option value='admin'>Admin</option>";
							}
							?>
						</select><br>
						

						<input type="submit" name="submit" value="Save" />

					</form>

					<?php
				}

				else {
					header("Location:index.php?function=login");
				}

			}
			?>

		</section>
	</main>

