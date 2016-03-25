<?php
include_once("..\users.php");

class testAdb extends PHPUnit_Framework_TestCase
{
    public function testAddUser()
    {
		// generate test username sername
		$strTestUsername=random_bytes(10);
        $obj=new users();
		
        $this->assertEquals(true, 
		$obj->addUser(
			$strTestUsername,// username sername
			"Firstname",	//firstname
			"Lastname",		//lastname
			"1234",			//password
			3,				//permission
			1,				//group 
			1				//status
			));
			
		$this->assertEquals(true,$obj->query("select * from users where username='$strTestUsername'"));
		//count the number of fields
		$this->assertCount(7,$obj->fetch());
    }
	

	
}