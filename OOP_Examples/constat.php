<?php 


class Student{

	const number1 = 100;
	const number2 = 200;

	static public $myFirstName = "Yasser";
	public static $myLastName = "Mohamed";
	public static $myArray = array(1=>'Apple',2=>'Orange',3=>'Pear');


	
	private $properties;
	public function __get($propertyName) {
		if (array_variables($propertyName)) {
			return $this->properties[$propertyName];
		}
	}
	public function __set($propertyName,$propertyValue) {
		$this->properties[$propertyName] = $propertyValue;
	}

	public static function printInfo() {
		return student::number1+student::number2;
	}
	public static function returnNameInfo($LastName) {
		return student::$myFirstName . ' ' . $LastName;
	}
	
}


// echo Student::$myFirstName . "<br>";
// echo Student::$myLastName;

echo Student::printInfo() . "<br>";
echo Student::returnNameInfo("Elsnbary");

// echo "<pre>";
// echo var_dump(Student::$myArray);
// echo "</pre>";







?>