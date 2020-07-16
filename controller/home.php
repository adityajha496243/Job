<?php
class homeController{
	function __construct(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../model/home.php');
		}else{
			include('model/home.php');
		}
		
		$this->obj=new homeModel();
	}

	/******************************************For public*******************************************/

	//These function are for the home page and about page 
	function home(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/publicJob.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/publicJob.php');
			include('view/footer.php');
		}
	}

	function about(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/page.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/page.php');
			include('view/footer.php');
		}
	}

	function faqs(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/faqs.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/faqs.php');
			include('view/footer.php');
		}
	}

	function contact(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/contact.php');

			if (isset($_POST['submit'])) {
					$criteria = [
						'name' => $_POST['name'],
						'email' => $_POST['email'],
						'phone' => $_POST['phone'],
						'details' => $_POST['details'],
					];
				
				try {
					$this->obj->insert('enquiry', $criteria);
					echo "<script> document.getElementById('right_message').innerHTML = 'Enquiry submitted.'; </script>";
				}catch (Exception $e) {
					echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
				}
			}

			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/contact.php');

			if (isset($_POST['submit'])) {
					$criteria = [
						'name' => $_POST['name'],
						'email' => $_POST['email'],
						'phone' => $_POST['phone'],
						'details' => $_POST['details'],
					];
				
				try {
					$this->obj->insert('enquiry', $criteria);
					echo "<script> document.getElementById('right_message').innerHTML = 'Enquiry submitted.'; </script>";
				}catch (Exception $e) {
					echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
				}
			}

			include('view/footer.php');
		}
	}

	//These function are for the job page which include IT, human resources, sales, etc
	function IT(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			$arr=$this->obj->category(1);
			$name = $this->obj->getName(1);
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/content.php');
			include('../view/footer.php');
		}else{
			$arr=$this->obj->category(1);
			$name = $this->obj->getName(1);
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/content.php');
			include('view/footer.php');
		}
	}
	function HumanResources(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			$arr=$this->obj->category(2);
			$name = $this->obj->getName(2);
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/content.php');
			include('../view/footer.php');
		}else{
			$arr=$this->obj->category(2);
			$name = $this->obj->getName(2);
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/content.php');
			include('view/footer.php');
		}
	}
	function Sales(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			$arr=$this->obj->category(4);
			$name = $this->obj->getName(4);
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/content.php');
			include('../view/footer.php');
		}else{
			$arr=$this->obj->category(4);
			$name = $this->obj->getName(4);
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/content.php');
			include('view/footer.php');
		}
	}

	//This function is for the application page
	function apply(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/apply.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/apply.php');

			if (isset($_POST['submit'])) {
				if ($_FILES['cv']['error'] == 0) {

					$parts = explode('.', $_FILES['cv']['name']);

					$extension = end($parts);

					$fileName = uniqid() . '.' . $extension;

					move_uploaded_file($_FILES['cv']['tmp_name'], 'images/cvs/' . $fileName);

					$criteria = [
						'name' => $_POST['name'],
						'email' => $_POST['email'],
						'details' => $_POST['details'],
						'jobId' => $_POST['jobId'],
						'cv' => $fileName
					];
				}
				try {
					$this->obj->insert('applicants', $criteria);
					echo "<script> document.getElementById('right_message').innerHTML = 'Your application is submitted. We will contact you as soon as possible.'; </script>";
				}catch (Exception $e) {
					echo "<script> document.getElementById('right_message').innerHTML = 'There was an error uploading your CV';	</script>";
				}
			}

			include('view/footer.php');
		}
	}


	/*************************************************For admin********************************************/
	function register(){
		if(isset($_GET["login"]) && $_GET["login"]=="admin"){
			include('../view/adminPages/dbcon.php');
			include('../view/header.php');
			include('../view/adminPages/adminRegister.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/adminPages/clientRegister.php');
			include('view/footer.php');
		}
	}
	function login(){
		include('view/adminPages/dbcon.php');
		include('view/header.php');
		include('view/adminPages/login.php');
		include('view/footer.php');
	}
	function logout(){
		include('../view/adminPages/Logout.php');
	}


	//This function is for the admin login page
	function adminLogin(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/adminLogin.php');
		include('../view/footer.php');
	}

	//These function are for the categories page
	function categories(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/categories.php');
		include('../view/footer.php');
	}

	function addcategory(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/addcategory.php');

		if (isset($_POST['submit'])) {
			$criteria = [
				'name' => $_POST['name']
			];
			try {
				$this->obj->insert('category', $criteria);
				echo "<script> document.getElementById('right_message').innerHTML = 'Category Added'; </script>";
			}catch (Exception $e) {
				echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
			}
		}

		include('../view/footer.php');
	}


	function editcategory(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/editcategory.php');

		if (isset($_POST['submit'])) {
			$criteria = [
				'name' => $_POST['name'],
				'id' => $_POST['id']
			];

			try {
				$this->obj->update('category', $criteria, 'id');
				echo "<script> document.getElementById('right_message').innerHTML = 'Category Saved'; </script>";
			}catch (Exception $e) {
				echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
			}
		}

		include('../view/footer.php');
	}

	function deletecategory(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/deletecategory.php');
		include('../view/footer.php');
	}


	//These function are for the jobs page
	function jobs(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/jobs.php');
		include('../view/footer.php');
	}

	function addjob(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/addjob.php');

		if (isset($_POST['submit'])) {
			if (!isset($_SESSION)) {
				session_start();
				
			}
			
			$addedBy = $_SESSION['id'];
			
			$criteria = [
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'salary' => $_POST['salary'],
				'location' => $_POST['location'],
				'categoryId' => $_POST['categoryId'],
				'closingDate' => $_POST['closingDate'],
				'addedBy' => $addedBy,

			];
			try {
				$this->obj->insert('job', $criteria);
				echo "<script> document.getElementById('right_message').innerHTML = 'Job Added'; </script>";
			}catch (Exception $e) {
				echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
			}
		}

		include('../view/footer.php');
	}

	function editjob(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/editjob.php');

		if (isset($_POST['submit'])) {
			$criteria = [
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'salary' => $_POST['salary'],
				'location' => $_POST['location'],
				'categoryId' => $_POST['categoryId'],
				'closingDate' => $_POST['closingDate'],
				'id' => $_POST['id']
			];

			try {
				$this->obj->update('job', $criteria, 'id');
				echo "<script> document.getElementById('right_message').innerHTML = 'Job saved'; </script>";
			}catch (Exception $e) {
				echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
			}
		}

		include('../view/footer.php');
	}

	function applicants(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/applicants.php');
		include('../view/footer.php');
	}

	function deletejob(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/deletejob.php');
		include('../view/footer.php');
	}

	function recycle(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/recycle.php');
		include('../view/footer.php');
	}

	function jobRestore(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/jobRestore.php');
		include('../view/footer.php');
	}

	function jobRecycle(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/jobRecycle.php');
		include('../view/footer.php');
	}


	//These function are for the user manage page
	function manageUser(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/manageUser.php');
		include('../view/footer.php');
	}

	function editUser(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/editUser.php');

		if (isset($_POST['submit'])) {
			$criteria = [
				'username' => $_POST['username'],
				'usertype' => $_POST['usertype'],
				'id' => $_POST['id']
			];

			try {
				$this->obj->update('multiuserlogin', $criteria, 'id');
				echo "<script> document.getElementById('right_message').innerHTML = 'User saved'; </script>";
			}catch (Exception $e) {
				echo "<script> document.getElementById('right_message').innerHTML = 'Something went wrong';	</script>";
			}
		}

		include('../view/footer.php');
	}

	function deleteUser(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/deleteUser.php');
		include('../view/footer.php');
	}

	//These function is for the enquiry page
	function enquiry(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/enquiry.php');
		include('../view/footer.php');
	}

	function enquirystatustocomplete(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/enquirystatustocomplete.php');
		include('../view/footer.php');
	}

	function enquirystatustonotcomplete(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/enquirystatustonotcomplete.php');
		include('../view/footer.php');
	}

	function deleteenquiry(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/deleteenquiry.php');
		include('../view/footer.php');
	}

}
?>