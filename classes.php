<?php
	
	//Generates HTML input + label 
	//__toString() makes it possible to use it as :
	// echo $myInput;
	//
	//echo new Input(
	
	class Property
	{
		private $name;
		private $value;
		
		public function __construct($name, $value)
		{
			$this->name = $name;
			$this->value = $value;
		}
		
		public function __toString()
		{
			return $this->name.'="'.$this->value.'" ';
		}
	}
	
	
	class Input
	{
		private $name;
		private $type;
		private $label;
		private $property;
		
		
		public function __construct($name, $type, $label, $property)
		{
			$this->name = $name;
			$this->type = $type;
			$this->label = $label;
			$this->property =  $property;
		}
		
		public function __toString ()
		{
			$labelField = '<label for="'.$this->name.'">'.$this->label.'</label>';
			$inputField = '<input id ="'.$this->name.'" type="'.$this->type.'" name="'.$this->name.'"';
			
			$inputField .= $this->property;
			
			$inputField .= '>';
			
			return $labelField.$inputField.'<br />';
		}
	}
	
	class Person
	{
		private $name;
		private $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function getAge()
		{
			return $this->age;
		}		
		
		public function setAge($age)
		{
			$this->age = $age;
		}
	}

	class Booking
	{
		private $destination;
		private $insurance;
		private $numberOfPassengers;
		private $registeredPassengers;
		private $passengers = array();
		
		public function __construct()
		{
			$this->destination = "";
			$this->numberOfPassengers = 0;
			$this->insurance = 0;
			$this->registeredPassengers = 0;
		}
		
		public function getDestination()
		{
			return $this->destination;
		}
		
		public function setDestination($destination)
		{
			$this->destination = $destination;
		}
		
		public function getInsurance()
		{
			if($this->insurance)
			{
				return "checked";
			}
			else
			{
				return "";
			}
		}
		
		public function setInsurance($insurance)
		{
			$this->insurance = $insurance;
		}
		
		public function getNumberOfPassengers()
		{
			return $this->numberOfPassengers;
		}
		
		public function setNumberOfPassengers($number)
		{
			for($i =0; $i <$number; $i++)
			{
				if(!isset($this->passengers[$i]))
				{
					$this->addPerson(new Person("",0));
				}			
			}
			
			while($this->numberOfPassengers > $number)
			{
				$this->removePerson();
			}
		}
		
		public function getPassenger($index)
		{
			if(isset($this->passengers[$index]))
			{
				return $this->passengers[$index];
			}
			else
			{
				return null;
			}
		}
		
		public function getPrice()
		{
			$price = 0;
			
			if(isset($this->passengers))
			{
				foreach ($this->passengers as $person)
				{
					if($person->getAge() >12)
					{
						$price += 15;
					}
					else
					{
						$price += 10;
					}
				}
			}
				
				if(($this->insurance == 1))
				{
					$price += 20;
				}
			
			return $price;
		}
		
		public function addPerson($person)
		{
			array_push($this->passengers, $person);
			$this->numberOfPassengers++;
		}
		
		public function removePerson()
		{
			if(array_pop($this->passengers)!=null)
			{
				$this->numberOfPassengers--;
			}
		}
		
		public function reset()
		{
			$this->destination = "";
			$this->numberOfPassengers= 0;
			$this->insurance= 0;
			$this->passengers = array ();
		}
		
		public function getRegisteredPassengers()
		{
			return $this->registeredPassengers;
		}
		
		public function setRegisteredPassengers($number)
		{
			$this->registeredPassengers = $number;
		}
		
		public function addRegisteredPassenger()
		{
			$this->registeredPassengers += 1;
		}
		
		public function allPassengersRegistered()
		{
			return $this->registeredPassengers == $this->numberOfPassengers;
		}
	}

?>