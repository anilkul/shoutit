<?php include 'db.php'; ?>
<?php
	if(isset($_POST['submit'])) {

		$user = mysqli_real_escape_string($con, $_POST['user']);
		$message = mysqli_real_escape_string($con, $_POST['message']);

		//Set Timezone
		date_default_timezone_set('Europe/Istanbul');
		$curtime = date('H:i:s');
		
		if (!isset($user) || $user == '' || !isset($message) || $message == '') {
			$error = "Please fill all of the fields";
			header("Location: index.php?error=" . urlencode($error));
		} else {
			$query = "INSERT INTO shouts(user, message, curtime) VALUES('$user', '$message', '$curtime')";
			$result = mysqli_query($con, $query);
			$row=mysqli_fetch_assoc($result);
			extract($row); 

			if (!$result) {
				die('Error: ' . mysqli_error($con));
			} else {
				header("Location: index.php");
				exit();
			}
			
		}
		

	}
?>