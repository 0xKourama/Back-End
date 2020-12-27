<?php


class Person {
	public $firstName;
	public $lastName;
	public $age;
	public $address;
	public $my_salary;

	function printInfo() {
		$result = "";
		$result .= $this->firstName . " " . $this->lastNamel . "<br>";
		$result .= $this->age . " " . $this->address . "<br>";

		return $result;
	}
}
$person1 = new Person();


echo "<pre>";
echo var_dump($person1);
echo "</pre>";
// assign properites
$person1->firstName = "Yasser";
$person1->lastNamel = "Mohamed";
$person1->age = 21;
$person1->address = "EGY - Damietta";
$person1->my_salary = 15000;
echo "------------------------------------";
echo "<pre>";
echo var_dump($person1);
echo "</pre>";
echo "------------------------------------ <br>";

echo $person1->printInfo();




?>