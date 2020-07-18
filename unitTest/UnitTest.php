<?php declare(strict_types=1);
 
include'../model/home.php';
include'../vendor/autoload.php';




use \PHPUnit\Framework\TestCase;

/**
 * 
 */
class UnitTest extends TestCase
{
	
	public function test() 
	{
		$insertTest = new homeModel();
		$checkInsert = ["id" => 5,"username" => "testUser","password" => password_hash("string", PASSWORD_DEFAULT),"usertype" => "admin" ];
		$check = $insertTest->insert('multiuserlogin', $checkInsert);
		$this->assertFalse($checkInsert);
	}

	public function testCategory(){
		$insertTest = new homeModel();
		$checkInsert = $insertTest->category(1);
		$this->assertFalse($checkInsert);
	}

}
