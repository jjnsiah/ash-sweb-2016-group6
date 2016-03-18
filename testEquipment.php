<?php
include_once("..\equipment.php");

class testAdb extends PHPUnit_Framework_TestCase
{
    public function testAddEquipment()
    {
		// generate test 
		$strTestName=random_bytes(10);
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->addEquipment(
			$strTestName,// username
			"Equipment Name",	//name
			"2791370",		//barcode
			"Description of equipment",		//Description
			"2016/04/12",			//date added
			"Lab 221",				//lab name
			"Around amphitheatre",	//lab location
			));
			
		$this->assertEquals(true,$obj->query("select * from equipment where name='$strTestUsername'"));
		//count the number of fields
		$this->assertCount(6,$obj->fetch());	
		
    }
	

	
}