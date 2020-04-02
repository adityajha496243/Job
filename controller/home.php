<?php
class homeController{
	function __construct(){
		include('model/home.php');
		$this->obj=new homeModel();
	}
	function home(){
		$arr=$this->obj->home();
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
	function about(){
		$arr=$this->obj->about();
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
	function it(){
		$arr=$this->obj->category(1);
		include('view/header.php');
		include('view/content.php?'.$arr);
		include('view/footer.php');
	}
	function hr(){
		$arr=$this->obj->category(2);
		include('view/header.php');
		include('view/content.php');
		include('view/footer.php');
	}
	function sales(){
		$arr=$this->obj->category(4);
		include('view/header.php');
		include('view/content.php');
		include('view/footer.php');
	}
	function apply(){
		$arr=$this->obj->apply();
		include('view/header.php');
		include('view/apply.php');
		include('view/footer.php');
	}
}
?>