<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | UPDATE COLLEGE</title>
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
					<h5>Update College:</h5>
					<form method="POST">

						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="College Name"  class="form-control my-3 p-3" name="college_name" value="<?php echo $college['college_name'] ?>" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
							<select name="college_degree" class="form-control my-3 p-3" required>
								<option hidden disabled selected value  > -- select an option -- </option>
								<option value="Associate">Associate</option>
								<option value="Bachelor">Bachelor</option>
								<option value="Master">Master</option>
								<option value="Doctor">Doctor</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="College Course"  class="form-control my-3 p-3" name="college_course" value="<?php echo $college['college_course'] ?>" required>
							</div>
						</div>
						
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="College Start Year" pattern="[0-9]{4}" class="form-control my-3 p-3" name="college_date_start" value="<?php echo $college['college_date_start'] ?>" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-12">
								<input type="text" placeholder="College End Year" pattern="[0-9]{4}" class="form-control my-3 p-3" name="college_date_end" value="<?php echo $college['college_date_end'] ?>" required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 mx-auto">
								<button class="btn1 mt-3 mb-4"><a href="<?php echo base_url()."users/college/".$_SESSION['user_id']?>">Cancel</a></button>
							</div>
							<div class="col-lg-6 mx-auto">
								<button type="submit" class="btn1 mt-3 mb-4">Submit</button>
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
