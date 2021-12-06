<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | HOME</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">

  	<!------- CSS ------->
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/bahaypahina/style.css"></link>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
	
	<!------- NAVBAR ------->
	<header>
	<?php $this->load->view('elements/navbar');?>

	<div class="title">
		<div class="container">
			<h1 class="main-title">
				<span>E - </span> Folio
			</h1>
			<p> A Wonderful place to showcase, explore, and discover. 
			</p>
			<a href="#contentsection" type="button" class="button">EXPLORE</a>
		</div>
	</div>
	</header>
	
	<!------- CONTENT ------->
	<div class="content" id="contentsection">
		<div class="post-heading text-center">
            <h3 class="display-4 text-uppercase">projects & works</h3>
        </div>

	<div id="carouselExampleCaptions" class="carousel slide col-lg-8 col-md-7 col-sm-8 mx-auto" data-bs-ride="carousel">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>

		<div class="carousel-inner">
		  <div class="carousel-item active">
			<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/bahaypahina/background1.jpeg" class="d-block w-100" alt=""></a>
			<div class="carousel-caption d-none d-sm-block">
			  <h5>Project title</h5>
			  <p>Some representative placeholder content for the first slide.</p>
			</div>
		  </div>

		  <div class="carousel-item">
			<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/bahaypahina/borjpayroll (1).png" class="d-block w-100" alt=""></a>
			<div class="carousel-caption d-none d-sm-block">
			  <h5>Second slide label</h5>
			  <p>Some representative placeholder content for the second slide.</p>
			</div>
		  </div>

		  <div class="carousel-item">
			<a href="<?php echo base_url()?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/bahaypahina/background4.jpg" class="d-block w-100" alt=""></a>
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

	</div>

	<!------- FOOTER ------->
	<footer>
		<div class="socmed-links">
			<a href="<?php echo base_url()?>" target="_blank"> <i class="fab fa-facebook-f"></i></a>
            <a href="<?php echo base_url()?>" target="_blank"> <i class="fab fa-instagram"></i></a>
            <a href="<?php echo base_url()?>" target="_blank"> <i class="fab fa-twitter"></i></a>
            <a href="<?php echo base_url()?>" target="_blank"> <i class="fab fa-linkedin"></i></a>
		</div>
		<h5>Copyright &copy;2021 E - FOLIO | All Rights Reserved</h5>
	  </footer>




























<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
