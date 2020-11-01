<?php


	class Person{

	public function printFirstName($name) {echo "Name is: $this->name";}
	public function printLastName($lname) {echo "Lname is: $this->lname";}
	public function printAge($age) {echo "Age is: $this->age";}

}
	class Student extends Person{

	public function printFirstName($name) {echo 'Name is: ' . $name . "<br>";}

}

	class Employee extends Person{

	public function printLastName($lname) {echo 'Last Name is: ' . $lname . "<br>";}
	public function printAddress($age) {echo 'Age is: ' . $age;}

}

$student = new Student();
$student->printFirstName("yasser");

$employee = new Employee();
$employee->printLastName("Mohamed");
$employee->printAddress("Egypt");




?>