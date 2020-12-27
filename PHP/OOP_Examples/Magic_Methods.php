<?php 


class Student{

	private $properties;


	public function __get($propertyName) {
		if (array_variables($propertyName)) {
			return $this->properties[$propertyName];
		}
	}

	public function __set($propertyName,$propertyValue) {
		$this->properties[$propertyName] = $propertyValue;
	}
}

$studentInfo = new Student();

echo "<pre>";
echo var_dump($studentInfo);
echo "</pre>";

$studentInfo->firstName = "Yasser";
$studentInfo->lastName = "Mohamed";

echo "<pre>";
echo var_dump($studentInfo);
echo "</pre>";






?>