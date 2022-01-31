<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | LOGIN</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/signin/style.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>

	<!------- NAVBAR ------->
	<header>
	<?php $this->load->view('elements/navbar');?>

	<!------- CONTENT ------->
	<section class="Form my-4 mx-5 w-50 mx-auto" id="logincontainer">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-7 px-4 pt-4 mx-auto">
					<h1 class="font-weight-bold py-3">
						<img src="<?php echo base_url(); ?>assets/img/signin/ee.png" width="50" height="50" class="d-inline-block align-top" alt=""> E-FOLIO
					</h1>
					<h4>Sign into your account</h4>
					<?php if(isset($error)){ ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $error ?>
						</div>
					<?php } ?>
					<form method="POST">
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" name="user_uid" placeholder="Username/Email"  class="form-control my-3 p-3" value="<?php echo(isset($_POST['user_uid']))? $_POST['user_uid']:"" ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="password" name="user_pwd" placeholder="Password" class="form-control my-3 p-3">
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<button type="submit" class="btn1 mt-3 mb-5">Login</button>
							</div>
							<a href="<?php echo base_url()."users/login"?>"><span>Forgot password</span></a>
							<p>Don't have an account?<a href="<?php echo base_url()."users/signup"?>"><span>Sign Up</span></a></a> </p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!------- FOOTER ------->
	<?php
        $this->load->view('elements/footer');
    ?>






























<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
