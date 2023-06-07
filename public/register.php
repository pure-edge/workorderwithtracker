<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container" style="margin-top: 40px;">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header bg-primary text-center text-white">
						<h2>Register</h2>
					</div>

					<div class="card-body">
						<form method="post" action="register.php">

							<?php include('errors.php'); ?>

							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
							</div>

							<div class="form-group">
								<label for="password_1">Password</label>
								<input type="password" class="form-control" id="password_1" name="password_1">
							</div>

							<div class="form-group">
								<label for="password_2">Confirm Password</label>
								<input type="password" class="form-control" id="password_2" name="password_2">
							</div>

							<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
							<p>
								Already a member? <a href="login.php">Sign in</a>
							</p>
						</form>
			  		</div>

				</div>
			</div>
		</div>
	</div>

<?php include('layout/footer.php'); ?>