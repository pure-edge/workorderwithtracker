<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body {
			background: url(img/bg.jpg);
			background-repeat: no-repeat;
			background-size: 1366px 700px;
		}

		.card {
			border-radius: 0px;
			border: none;
		}

		#login_logo {
			background: #1c2e4a;
			border-radius: 0px;
		}

		.error {
			display: none;
		}
	</style>
	<script type='text/javascript' src='js/jquery-3.1.1.min.js' defer></script>
	<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-app.js" defer></script>

	<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
	<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js" defer></script>

	<!-- Add Firebase products that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-auth.js" defer></script>
	<script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-firestore.js" defer></script>

	<script type='text/javascript' src="js/init.js" defer></script>
	<script type='text/javascript' src="js/auth.js" defer></script>
</head>

<body>
	<div class="container" style="margin-top: 40px;">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header text-center" id="login_logo">
						<img src="img/logo.png">
					</div>

					<div class="card-body p-4">
						<!--<form method="post" action="login.php">-->

						<div class="form-group">
							<label for="username">Email</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Enter Email">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>

						<button id="login_button" type="submit" class="btn btn-primary" name="login_user">Login</button>
						<!-- <p>
								Not yet a member? <a href="register.php">Sign up</a>
							</p> -->

						<div class="error pt-4">
							<div class="alert alert-danger" role="alert">
								Incorrect email/password combination. Kindly double-check if you've entered your email or password correctly.
							</div>
						</div>

						<!--</form>-->
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
			$("#username").on("propertychange change keyup paste input", function() {
				const email = $('#username').val().trim();
				const password = $('#password').val().trim();
				if (email.length == 0 || password.length == 0)
					$('#login_button').attr("disabled", true);
				else
					$('#login_button').attr("disabled", false);
			});

			$("#password").on("propertychange change keyup paste input", function() {
				const email = $('#username').val().trim();
				const password = $('#password').val().trim();
				if (email.length == 0 || password.length == 0)
					$('#login_button').attr("disabled", true);
				else
					$('#login_button').attr("disabled", false);
			});

			// SIGN-IN
			$('#login_button').click(function() {
				console.log("Sign-in button clicked");
				const email = $('#username').val().trim();
				const password = $('#password').val().trim();

				// TODO: before authentication if user role is crew, cancel and display error
				// admin get user account
				/*db.collection('account').doc().get().then(function(doc) {
					if (doc.data().role == 'crew') {
						$('.error').css('display', 'block');
						return;	
					}
				});*/

				auth.signInWithEmailAndPassword(email, password).catch(function(error) {
					// Handle Errors here.
					var errorCode = error.code;
					var errorMessage = error.message;
					console.log("Sign-in error: " + errorMessage);
					$('.error').css('display', 'block');
				});
			});
		});
	</script>

	<?php include('layout/footer.php'); ?>