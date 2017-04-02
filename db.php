<?php
	//Connect to MySQL
	$con = mysqli_connect("localhost",'root','root','projects');

	//Test connection
	if (mysqli_connect_errno()) {
		echo "Failed to Connect to MysQL" . mysqli_connect_error();
	}
?>