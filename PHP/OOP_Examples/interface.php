<?php


interface Person{

	public function firstlastPerson($firstName,$lastName);
	public function agePerson($age);
	public function addressPerson($address);
}

class student implements Person{
	public function firstlastPerson($firstName,$lastName){
		return sprintf("Student First Name: %s, Last Name: %s",$firstName,$lastName);
	}
	public function agePerson($age){
			return sprintf("Student Age: %0.0d",$age);
		}
	public function addressPerson($address){
			return sprintf("Student Address: %s",$address);
		}

}

$student1 = new Student();

echo $student1->firstlastPerson("yasser","Elsnbary"); echo "<br>";
echo $student1->agePerson(21); echo "<br>";
echo $student1->addressPerson("");



?>