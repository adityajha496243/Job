<?php

$controller='home';
$function='adminLogin';

if(isset($_GET["login"])){
	if(isset($_GET['controller']) && $_GET['controller']!=''){
		$controller=$_GET['controller'];
	}

	if(isset($_GET['function']) && $_GET['function']!=''){
		$function=$_GET['function'];
	}

	if(file_exists('../controller/'.$controller.'.php')){

		include('../controller/'.$controller.'.php');
		$class=$controller.'Controller';
		$obj=new $class();

		if(method_exists($class,$function)){
			$obj->$function();
		}else{
			echo "Function not found";
		}

	}else{
		echo "Controller not found";
	}
}
else{
	//echo "hello world";
	header("location:index.php?login=admin");
}
?>