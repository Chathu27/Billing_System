<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class = "container">
	<div class="login-form">
		<form action="<?php echo base_url(); ?>index.php/login/check_login" method="">

			<h1>Login</h1>

			<div class="form-group">
				<label>User Name:</label>
				<input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name">
				
			</div>

			<div class="form-group">

			    <label >Password</label>
			    <input type="password" name="password" class="form-control" id="password" placeholder="Password">

			</div>

			<button type="submit" class="btn btn-primary">Login</button>
			
		</form>
	</div>
	
</div>
</body>
</html>