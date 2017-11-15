<html>
	<head>
		<title>Booking | Confirmation</title>
		<link rel = "stylesheet" type = "text/css" href ="form.css" >
	</head>
	
	<body>
	
		<h1>Confirmation</h1>
		
		<form method="post" action="index.php">
		
			<p>				
				<?php
					for($i = 0; $i<$myBooking->getNumberOfPassengers();$i++)
					{
						echo 'Passenger '.($i+1).' :'.'<br />';
						echo $myBooking->getPassenger($i)->getName().'<br />';
						echo $myBooking->getPassenger($i)->getAge().' years'.'<br />';
						echo '<br />';
					}	
				?>
			</p>
			
				<input type="submit" name="passengers" value="Previous">
				<input type="submit" name="send" value="Confirm">
				<input type="submit" name="cancel" value="Cancel">
				
		</form>
	</body>
</html>