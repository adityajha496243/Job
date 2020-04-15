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
			include('../view/page.php');
			include('../view/footer.php');
		}else{
			include('view/adminPages/dbcon.php');
			include('view/header.php');
			include('view/page.php');
			include('view/footer.php');
		}
	}

	function about(){
		$this->home();
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
		include('../view/footer.php');
	}
	function editcategory(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/editcategory.php');
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
		include('../view/footer.php');
	}
	function editjob(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/editjob.php');
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

	//These function are for the user manage page
	function manageAdmin(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/manageAdmin.php');
		include('../view/footer.php');
	}
	function deleteAdmin(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/deleteAdmin.php');
		include('../view/footer.php');
	}
}
?>