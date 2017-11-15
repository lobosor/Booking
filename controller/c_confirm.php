<?php
	
	//Update
		$i = $myBooking->getRegisteredPassengers();
		
		if(isset($_POST['name']) && $_POST['name']!="")
		{
			$myBooking->getPassenger($i)->setName($_POST['name']);
		}
		else if($_POST['name'] == "")
		{
			$error['name'] = 1;
		}
		
		if(isset($_POST['age']) && $_POST['age'] > 0 && $_POST['age'] <= 130)
		{
			$myBooking->getPassenger($i)->setAge($_POST['age']);
		}
		else if($_POST['age'] <= 0)
		{
			$error['age'] = 1;
		}
	
	if(!isset($error))
	{
		$myBooking->addRegisteredPassenger();
	}
	
	if($myBooking->allPassengersRegistered())
	{
		require 'view/v_confirm.php';
	}
	else
	{
		require 'view/v_passengers.php';
	}
	
?>