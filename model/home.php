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
		if(!empty($data))
			$arr=$data['0'];
		else
			$arr = ['name'=>""];
		return $arr;
	}

	function insert($table, $record) {
		$keys = array_keys($record);
		$values = implode(', ', $keys);
		$valuesWithColon = implode(', :', $keys);
		$query = 'INSERT INTO ' . $table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
		$stmt = $this->pdo->prepare($query);
		$insert = $stmt->execute($record);
		if ($insert) {
			return true;
		}else{
			return false;
		}
	}

	function update($table, $record, $primaryKey) {
		$query = 'UPDATE ' . $table . ' SET ';
		$parameters = [];
		foreach ($record as $key => $value) {
			$parameters[] = $key . ' = :' .$key;
		}
		$query .= implode(', ', $parameters);
		$query .= ' WHERE ' . $primaryKey . ' = :primaryKey';
		$record['primaryKey'] = $record[$primaryKey];
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($record);
	}
	
}
