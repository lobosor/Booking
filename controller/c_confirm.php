<?php
	
	//Update
	for($i=0; $i<$myBooking->getNumberOfPassengers(); $i++)
	{
		if(isset($_POST['name'.$i]) && $_POST['name'.$i]!="")
		{
			$myBooking->getPassenger($i)->setName($_POST['name'.$i]);
		}
		else if($_POST['name'.$i] == "")
		{
			$error['name'] = 1;
		}
		
		if(isset($_POST['age'.$i]) && $_POST['age'.$i] > 0 && $_POST['age'.$i] <= 130)
		{
			$myBooking->getPassenger($i)->setAge($_POST['age'.$i]);
		}
		else if($_POST['age'.$i] <= 0)
		{
			$error['age'] = 1;
		}
		
		
	}
	
	//Display
	if(isset($error))
	{		
		require 'view/v_passengers.php';
	}
	else
	{
		require 'view/v_confirm.php';
	}
	
?>