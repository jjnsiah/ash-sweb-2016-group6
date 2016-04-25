<?php
include_once("functions.php");
class phpunitTest extends PHPUnit_Framework_TestCase{
	public function testEquipmemntAvailable()
	{
		$borrow=new functions();
		
		$this->assertEquals(true,$borrow->availEquipment(2,"Available"));
		$result=$borrow->getEquipment("EquipmentID=2");
		$row=$borrow->fetch();
		$this->assertEquals("Borrowed",$row['status']);
	}
	public function testEquipmemntView()
	{
		$view=new functions();
		
		$this->assertEquals(true,$view->getEquipment());
		$row=$view->fetch();
		$this->assertGreaterThan(0,count($row));
	}
	
	
}
	
 ?>