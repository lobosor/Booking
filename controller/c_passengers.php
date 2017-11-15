<?php
	
	//Update
	if(isset($_POST['destination']) && $_POST['destination']!="")
	{
		$myBooking->setDestination($_POST['destination']);
	}
	else if($myBooking->getDestination() =="")
	{
		$error['destination'] = 1;
	}
	
	if(isset($_POST['numberOfPassengers']) && $_POST['numberOfPassengers']>0 && $_POST['numberOfPassengers'] < 300)
	{		
		//Need further tests
		for($i =0; $i <$_POST['numberOfPassengers']; $i++)
		{
			if($myBooking->getPassenger($i)=== null)
			{
				$myBooking->addPerson(new Person("",0));
			}			
		}
		
		while($myBooking->getNumberOfPassengers() > $_POST['numberOfPassengers'])
		{
			$myBooking->removePerson();
		}
	}
	else if ($myBooking->getNumberOfPassengers() == 0)
	{
		$error['numberPeople'] = 1;
	}
	
	if(isset($_POST['insurance']))
	{
		$myBooking->setInsurance(1);
	}
	else
	{
		$myBooking->setInsurance(0);
	}
	
	//Display
	if(isset($error))
	{
		require 'view/v_init.php';
	}
	else
	{		
		require 'view/v_passengers.php';
	}
?>