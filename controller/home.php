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

	
	function home(){
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
	function about(){
		$this->home();
	}


	function it(){
		$arr=$this->obj->category(1);
		$name = $this->obj->getName(1);
		include('view/header.php');
		include('view/content.php');
		include('view/footer.php');
	}
	function hr(){
		$arr=$this->obj->category(2);
		$name = $this->obj->getName(2);
		include('view/header.php');
		include('view/content.php');
		include('view/footer.php');
	}
	function sales(){
		$arr=$this->obj->category(4);
		$name = $this->obj->getName(4);
		include('view/header.php');
		include('view/content.php');
		include('view/footer.php');
	}


	function apply(){
		include('view/header.php');
		include('view/apply.php');
		include('view/footer.php');
	}

	//For admin
	function adminLogin(){
		include('../view/adminPages/dbcon.php');
		include('../view/header.php');
		include('../view/adminPages/adminLogin.php');
		include('../view/footer.php');
	}
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

}
?>