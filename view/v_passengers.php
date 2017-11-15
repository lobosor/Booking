<html>
	<head>
		<title>Booking | Details</title>
		<link rel = "stylesheet" type = "text/css" href ="form.css" >
	</head>
	
	<body>
	
		<h1>Details</h1>
		
		<p>
			Please enter the name and age of the passengers.
		</p>
		
		<?php require 'view/v_error.php'; ?>
		
		<form method="post" action="index.php">	
		
			<p>
				<?php
						$i = $myBooking->getRegisteredPassengers();
						
						$nameProperty = new Property("value", $myBooking->getPassenger($i)->getName());
						$ageProperty = new Property("value", $myBooking->getPassenger($i)->getAge());
						
						echo '<p>Passenger '.($i+1).':</p></br>';
						
						echo new Input("name", "text", "Name :", $nameProperty);
						echo new Input("age", "number", "Age :", $ageProperty);
						echo '<br />';					
					
				?>		
			</p>
			
			<input type="submit" name="init" value="Previous">
			<input type="submit" name="confirm" value="Next">
			<input type="submit" name="cancel" value="Cancel">
			
		</form>	
		
	</body>
</html>