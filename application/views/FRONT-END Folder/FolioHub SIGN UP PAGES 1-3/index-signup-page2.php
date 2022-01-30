<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | SIGN UP PAGE 2</title>
	<link rel="icon" href="<?=base_url()?>assets\img\sign\img\foliohub-logo.png">

	<link rel="stylesheet" href="<?=base_url()?>assets\css\sign\style-signup-page.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets\img\sign\img\vector-image-signup.png">
		</div>

		<div class="signup-content">
			<form method="post">
				<input type="hidden" name="trigger" value="true">
                <h2>Continue...</h2>
				<?php if(isset($error)){ ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $error ?>
				</div>
				<?php } ?>
				<div class="wrap-two">
					<label>Email</label>
					<input type="email" name="user_email" value="<?php echo(isset($_POST['user_email']))? $_POST['user_email']:"" ?>" required>
				</div>
				<div class="wrap-two">
					<label>Username</label>
					<input type="text" name="user_uid" value="<?php echo(isset($_POST['user_uid']))? $_POST['user_uid']:"" ?>" required>
				</div>
                <div class="wrap-two">
					<label>Password</label>
					<input type="password" name="user_pwd" required>
				</div>
                <div class="wrap-two">
					<label>Confirm Password</label>
					<input type="password" name="user_pwdRepeat" required>
				</div>

				<div class="for-buttons">
					<!-- <a type="button" class="button-next" href="index-signup-page3.html">Next</a></button> -->
					<button type="submit" class="button-next">Next</button>

					<a type="button" class="button-cancel" href="<?=base_url()?>">Cancel</a></button>
				</div>

              <p>Already have an account? <a class="for-signin" href="<?=base_url()?>users/sign">Sign In</a></p>
			</form>
        </div>
    </div>

</body>
</html>