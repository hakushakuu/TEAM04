<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | SIGN UP</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/signup/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/signup/style.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
	
	<!------- NAVBAR ------->
	<header>
	<?php $this->load->view('elements/navbar');?>

	<!------- CONTENT ------->
	<section class="Form my-4 mx-5 w-50 mx-auto text-center" id="logincontainer">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-8 px-3 pt-3 mx-auto">
					<h1 class="font-weight-bold py-2">
						<img src="<?php echo base_url(); ?>assets/img/signup/ee.png" width="50" height="50" class="d-inline-block align-top" alt=""> E-FOLIO
					</h1>
					<h5>Register Here:</h5>
					<form method="POST">
						<!-- HIDDEN VALUES FOR USER TYPE -->
						<!-- BY DEFAULT, USER TYPE WILL BE USER -->
						<input type="hidden" name="user_type" value="user">

						<div class="form row">
							<div class="col-lg-6">
								<input type="text" placeholder="First name"  class="form-control p-3" name="user_firstName" required>
							</div>
							<div class="col-lg-6">
								<input type="text" placeholder="Last name"  class="form-control p-3" name="user_lastName" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="Contact Number (09xx-xxx-xxxx)" class="form-control my-3 p-3" name="user_number" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="Address"  class="form-control my-3 p-3" name="user_address" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="email" placeholder="Email"  class="form-control my-3 p-3" name="user_email" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="Username"  class="form-control my-3 p-3" name="user_uid" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="password" placeholder="Password" class="form-control my-3 p-3" name="user_pwd" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="password" placeholder="Confirm Password" class="form-control my-3 p-3" name="user_pwdRepeat" required>
							</div>
						</div>
						<div>
							<div class="col-lg-12 mx-auto">
								<button type="submit" class="btn1 mt-3 mb-4">Next</button>
							</div>
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
