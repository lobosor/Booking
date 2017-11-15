<html>
	<head>
		<title>Booking</title>
		<link rel = "stylesheet" type = "text/css" href ="form.css" >
	</head>
	
	<body>
		<h1>Booking</h1>
		
		<p>
			The adult fare is $15. The fare under 12 years old is $10.<br/>
			The cancellation insurance costs $20 whatever the number of passengers.
		</p>
		
		<?php require 'view/v_error.php'; ?>
		
		<form method="post" action="index.php">
			<p>
				<?php
				
					echo new Input("destination","text","Destination : ", new Property("value", $myBooking->getDestination()));
					echo new Input("numberOfPassengers","number","Number of passengers : ", new Property("value", $myBooking->getNumberOfPassengers()));
					echo new Input("insurance", "checkbox", "Cancellation insurance", $myBooking->getInsurance());
				
				?>
				<!--
				<label for="destination">Destination : </label>
				<input id ="destination" type="text" name="destination">
				<br/>
				
				<label for="numberOfPassengers">Number of passengers : </label>
				<input id ="numberOfPassengers" type="number" name="numberOfPassengers" min=1>
				<br />
				
				<label for="insurance">Cancellation insurance : </label>
				<input id ="insurance" type="checkbox" name="insurance">
				-->
			</p>
			
			<input type="submit" name="passengers" value="Next">
			<input type="submit" name="cancel" value="Cancel">
			
		</form>
		
	</body>
	
</html>