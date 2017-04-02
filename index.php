<?php include 'db.php';  ?>
<?php
	//Create Select Query
	$query = "SELECT * FROM shouts";
	$shouts = mysqli_query($con, $query);
	extract($row = mysqli_fetch_assoc($shouts));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SHOUT IT</title>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
	<div id="container">
		<header>
			<h1>SHOUT UT! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
			<?php while ($row = mysqli_fetch_assoc($shouts)): ?>
				<?php extract($row); ?>
				<li class="shout"><span><?php echo $curtime ?> - </span><strong><?php echo $user ?>:</strong> <?php echo $message ?></li>
			<?php endwhile; ?>
			</ul>
		</div>
		<div id="input">
			<?php if (isset($_GET['error'])): ?>
				<div class="error" style="background: red; color: #ffffff; padding: 5px; margin-bottom: 20px;"><?php echo $_GET['error']; ?></div>
			<?php endif; ?>
			<form action="process.php" method="post">
				<input type="text" name="user" placeholder="Enter Your Name"/>
				<input type="text" name="message" placeholder="Enter a Message"/>
				
				<input type="submit" value="Shout It Out!" name="submit" class="shout-btn"/>



			</form>
		</div>
	</div>
</body>
</html>


