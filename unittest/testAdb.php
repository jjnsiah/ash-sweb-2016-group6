<?php
include_once("..\adb.php");

class testAdb extends PHPUnit_Framework_TestCase
{
    public function testConnect()
    {
		
        $adb=new adb();
        $this->assertEquals(true, $adb->connect());
		return $adb;
    }
	/**
	*@depends  testConnect
	*/
	public function testQuery($adb)
	{
		$this->assertEquals(true,$adb->query("select * from users"));
		return $adb;
	}
	
	/**
	*@depends testQuery
	*/
	public function testFetch($adb)
	{
		$row=$adb->fetch();
		$this->assertGreaterThan(0,count($row));
				
	}
}