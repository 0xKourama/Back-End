<?php
	class Employee {
		private $firstName;
		private $lastName;
		private $age;
		private $address;
		private $salary;

		public function __construct($firstName,$lastName,$age,$address,$salary){
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->age = $age;
			$this->address = $address;
			$this->salary = $salary;
		}
		public function __toString(){
			return "First name: $this->firstName <br>
					Last name: $this->lastName <br>
					My age: $this->age Years<br>
					Address: $this->address <br>
					Salary: $this->salary L.E<br>";
		}
	}

	$employee1 = new Employee("yasser","mohamed",21,"Egypt",15000);

	echo $employee1;

	echo "---------------------------------------------------------- <br>";

	$employee2 = new Employee("ali","khaled",20,"Egypt",10000);

	echo $employee2;

	echo "---------------------------------------------------------- <br>";

	$employee3 = $employee2;

	echo $employee3;

	echo "---------------------------------------------------------- <br>";

	$employee4 = clone $employee1;

	echo $employee4;


?>