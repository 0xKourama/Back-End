<?php

class Employee {
	private $firstName;
	private $lastName;
	private $age;

	public function __construct($firstName,$lastName,$age) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->age = $age;
	}


	#getters

	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function getAge() {
		return $this->age;
	}

	# setters

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function setAge($age) {
		$this->age = $age;
	}

	# compare

	public static function compare($obj1, $obj2) {
		return $obj1 == $obj2;
	}	


}

	$employee1 = new Employee("yasser","mohamed",21);
	$employee2 = new Employee("yasser","mohamed",21);
	#$employee2 = new Employee("ahmed","eissa",33);


echo "<pre>";
echo var_dump($employee1);
echo "</pre>";
echo "------------------------------------";
echo "<pre>";
echo var_dump($employee1);
echo "</pre>";
echo "------------------------------------ <br>";

$employee3 = $employee2;

# if (Employee::compare($employee1,$employee2)) {
if ($employee3 === $employee2) { 
	echo "True";
}
else {
	echo "False";
}


?>