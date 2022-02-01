<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | SIGN UP PAGE 1</title>
	<link rel="icon" href="<?=base_url()?>assets\css-img\signin-signup\foliohub-logo.png">

	<link rel="stylesheet" href="<?=base_url()?>assets\css-img\signin-signup\style-signup-page.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets\css-img\signin-signup\vector-image-signup.png">
		</div>

		<div class="signup-content">
			<form method="post">
				<h2>Join Us</h2>
				<p>Please fill in this form to create an account.</p>
				<input type="hidden" name="user_type" value="user">
				<input type="hidden" name="trigger" value="true">
				<div class="wrap-one">
					<div class="cont-one">
						<label>First Name</label>
						<input type="text" name="user_firstName" value="<?php echo(isset($_POST['user_firstName']))? $_POST['user_firstName']:"" ?>" required/>
						<span class="event-one"></span>
					</div>
					<div class="cont-two">
						<label>Last Name</label>
						<input type="text" name="user_lastName" value="<?php echo(isset($_POST['user_lastName']))? $_POST['user_lastName']:"" ?>" required/>
						<span class="event-one"></span>
					</div>
				</div>
           		
				<div class="wrap-two">
					<label>Contact Number</label>
					<input type="tel" pattern="[0-9]{11}" name="user_number" value="<?php echo(isset($_POST['user_number']))? $_POST['user_number']:"" ?>" required>
					<span class="event-two"></span>
				</div>
				<div class="wrap-two">
					<label>Address</label>
					<input type="text" name="user_address" value="<?php echo(isset($_POST['user_address']))? $_POST['user_address']:"" ?>" required>
					<span class="event-two"></span>
				</div>

				<div class="for-buttons">
					<!-- <a type="button" class="button-next">Next</a></button> -->
					<button type="submit" class="button-next">Next</button>

					<a type="button" class="button-cancel" href="<?=base_url()?>">Cancel</a></button>
				</div>

              <p>Already have an account? <a class="for-signin" href="<?=base_url()?>users/login">Sign In</a></p>
			</form>
        </div>
    </div>

</body>
</html>