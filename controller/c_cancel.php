<?php
	//Utility of 'reset' if we can just create a new empty Booking object ?
	$myBooking->reset();
	
	//If the customer loads manually index.php, session needs to be reset
	$_SESSION['booking'] = serialize($myBooking);
	
	require 'view/v_init.php';
	
?>