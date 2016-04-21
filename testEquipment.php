<?php
include_once("equipment.php");

class testEquipment extends PHPUnit_Framework_TestCase
{
    public function testAddEquipment()
    {
		// generate test for addEquipment 
        $obj=new equipment();
		$obj->connect();
		
		$b = $obj->addEquipment(
			"Equipment Name",				//name
			"2791370",						//barcode
			"Description of equipment",		//Description
			"2016/04/12",					//date added
			"Lab 221",						//lab name
			"Around amphitheatre"			//lab location
			);
			
		$this->assertTrue(true,$b);
		
    }
	

	
}

?>