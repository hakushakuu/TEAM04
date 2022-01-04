<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | VIEW PROJECT</title>
  <link rel="icon" href="<?php echo base_url() ?>assets/img/signup/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/viewuser/style.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>

<!------- NAVBAR ------->
<header>
<header>
	<?php $this->load->view('elements/navbar');?>
<!------- CONTENT ------->


	<div class="userinfo text">
		<h1>Ito ang project</h1>
		<button><a href="<?php echo base_url()."project/".$request?>">Go back</a></button>
		<?php if($project['project_publisher_id'] === $_SESSION['user_id']){?>
			<button><a href="<?php echo base_url()."project/update/".$project['project_id']?>">Update</a></button>
			<button><a href="<?php echo base_url()."project/delete/".$project['project_id']?>">Delete</a></button>
		<?php } ?>

		<div class="container text-center">
			<div id="carouselExampleCaptions" class="carousel slide col-lg-8 col-md-7 col-sm-8 mx-auto py-10" data-bs-ride="carousel">
			<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>

			<div class="carousel-inner">
			<div class="carousel-item active">
				<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/temp/no-image.png" class="d-block w-100" alt=""></a>
				<div class="carousel-caption d-none d-sm-block">
				<h5>Project title</h5>
				<p>Some representative placeholder content for the first slide.</p>
				</div>
			</div>

			<div class="carousel-item">
				<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/temp/no-image.png" class="d-block w-100" alt=""></a>
				<div class="carousel-caption d-none d-sm-block">
				<h5>Second slide label</h5>
				<p>Some representative placeholder content for the second slide.</p>
				</div>
			</div>

			<div class="carousel-item">
				<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/temp/no-image.png" class="d-block w-100" alt=""></a>
				<div class="carousel-caption d-none d-sm-block">
					
				<h5>Third slide label</h5>
				<p>Some representative placeholder content for the third slide.</p>
				</div>
			</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
		<div class="pt-5">
			<h1><?php echo $project['project_title']?></h1><br>
			<p><?php echo $project['project_details']?></p>
		</div>
		</div>
		
	


	

	</div>


<!------- FOOTER ------->
<footer>
		<div class="socmed-links">
			<a href="index.html" target="_blank"> <i class="fab fa-facebook-f"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-instagram"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-twitter"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-linkedin"></i></a>
		</div>
		<h5>Copyright &copy;2021 E - FOLIO | All Rights Reserved</h5>
	  </footer>

	

	 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>