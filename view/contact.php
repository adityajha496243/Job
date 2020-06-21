<main class="sidebar">

	<section class="right">
		<div id="right_message"></div>

		<?php

		if (!isset($_POST['submit'])) {
		?>

				<h2>Contact Us</h2>

				<form <?php if(isset($_GET["login"]) && $_GET["login"]=="admin"){?>
							action="index.php?login=admin&&function=contact" 
					  <?php }else{ ?> 
							action="index.php?function=contact" 
					  <?php } ?> 
							method="POST" enctype="multipart/form-data">
							
					<label>Your name</label>
					<input type="text" name="name" />

					<label>E-mail address</label>
					<input type="text" name="email" />

					<label>Phone number</label>
					<input type="text" name="phone" />

					<label>Details</label>
					<textarea name="details"></textarea>

					<input type="submit" name="submit" value="Submit" />

				</form>



				<?php

			}




			?>

		</section>
	</main>