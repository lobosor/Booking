<?php
	
	//*****************************UPDATE DATA*****************************//
	
	//----> Update DESTINATION
	if(isset($_POST['destination']) && $_POST['destination']!="")
	{
		$myBooking->setDestination($_POST['destination']);
	}
	else if($myBooking->getDestination() =="")
	{
		$error['destination'] = 1;
	}
	
	//----> Update NUMBER OF PASSENGERS
	if(isset($_POST['numberOfPassengers']) && $_POST['numberOfPassengers']>0 && $_POST['numberOfPassengers'] < 300)
	{	
		$myBooking->setNumberOfPassengers($_POST['numberOfPassengers']);
	}
	else if ($myBooking->getNumberOfPassengers() == 0)
	{
		$error['numberPeople'] = 1;
	}
	
	//----> Update INSURANCE
	if(isset($_POST['insurance']))
	{
		$myBooking->setInsurance(1);
	}
	else
	{
		$myBooking->setInsurance(0);
	}
	
	//----> Set the number of REGISTERED PASSENGERS when returning to this view
	$myBooking->setRegisteredPassengers(0);
	
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