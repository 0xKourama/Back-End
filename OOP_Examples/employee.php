<?php


class Employee {
	private $firstName;
	private $lastName;
	private $age;
	private $address;
	private $salary;

	/*
		function printInfo() {
		$result = "";
		$result .= $this->firstName . " " . $this->lastNamel . "<br>";
		$result .= $this->age . " " . $this->address . "<br>";

		return $result;
	}
	*/

	//setters

	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function getAge() {
		return $this->age;
	}
	public function getAddress() {
		return $this->address;
	}
	public function getSalary() {
		return $this->salary;
	}

	//getters

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function setAge($age) {
		$this->age = $age;
	}
	public function setAddress($address) {
		$this->address = $address;
	}
	public function setSalary($salary) {
		$this->salary = $salary;
	}


}






$employee1 = new Employee();


echo "<pre>";
echo var_dump($employee1);
echo "</pre>";
echo "------------------------------------";

$employee1->setFirstName("Yasser");
$employee1->setLastName("Mohamed");
$employee1->setAge(21);
echo "------------------------------------";
	
echo "<pre>";
echo var_dump($employee1);
echo "</pre>";




?>