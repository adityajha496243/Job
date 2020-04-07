<?php
class homeModel{
	function __construct(){
		try{
			$this->pdo = new PDO("mysql:host=localhost;dbname=job","root","");
		}catch(PDOExection $e){
			echo $e->getMessage();
		}
	}

//For listing the jobs of the particular categories in the category pages like(it,hr,sales,etc)
	function category($id){
		$stmt = $this->pdo->prepare("SELECT * FROM job WHERE categoryId = '$id' AND closingDate > :date");
		$date = new DateTime();
		$values = [
			'date' => $date->format('Y-m-d')
		];
		$stmt->execute($values);
		return $stmt;
	}

	function getName($id){
		$sql="SELECT name FROM category where id='$id'";
		$stmt2=$this->pdo->prepare($sql);
		$stmt2->execute();
		$data=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		$arr=$data['0'];
		return $arr;
	}

	
}
