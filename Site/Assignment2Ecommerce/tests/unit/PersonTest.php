<?php
class PersonTest extends PHPUnit\Framework\TestCase{
	protected $person;

	public function testFullNameIsReturned(){
		$this->person = new \App\models\Person("Jon", "Doe");

		$this->assertEquals('Jon Doe',$this->person->getFullName());
	}
}
?>