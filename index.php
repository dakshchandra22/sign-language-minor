<?php
$_SESSION['login'] = false;
require('conn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<style>
	.back {
  background: #e2e2e2;
  width: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
}

.div-center {
  width: 400px;
  height: 400px;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}
</style>

<body>

	<?php
	
	
	session_start();
	// When form submitted, check and create user session.
	if (isset($_POST['submit'])) {
		$username = stripslashes($_REQUEST['username']);    // removes backslashes
		$username = mysqli_real_escape_string($con, $username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);


		$query    = "SELECT 'username,password' FROM `login` WHERE username='$username'AND password='$password'";
		$result = mysqli_query($con, $query);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login'] = true;
			$_SESSION['username'] = $username;
			echo "<script type='text/javascript'>alert(' Login successfully.');
            window.location.assign('home.php')</script>";
		} else {
			echo "<script type='text/javascript'>alert('Invalid Usernme/password! Please try again.');
              window.location.assign('index.php')</script>";
		}
	} else {
	?>
		<div class="back">


		<div class="back">


<div class="div-center">


	<div class="content">


		<h3>Login</h3>
		<hr />
		<form action="" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">User Name</label> 
				<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="User-name">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
			</div>
			<div class="custom-control custom-checkbox">
					<input type="checkbox" onclick="showpass()" class="custom-control-input" id="cb1">
			        <label class="custom-control-label text-black" for="cb1">Show Password</label>
			</div><br>
			<button type="submit" name="submit" class="btn btn-primary">Login</button>
			<hr />
			<!-- <button type="button" class="btn btn-link">Signup</button>
			<button type="button" class="btn btn-link">Reset Password</button> -->

		</form>

	</div>


	</span>
</div>

		<?php
	}
		?>

		<script>
			function showpass() {
				var x = document.getElementById("password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>
</body>

</html>