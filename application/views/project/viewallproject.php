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

	<div class="userinfo">
		<h1>Ito ang all project</h1>
		
		<button><a href="<?php echo base_url()."users/profile/".$request?>">Back</a></button>
		<?php if($request == $_SESSION['user_id']){?>
			<button><a href="<?php echo base_url()?>project/add">Add project</a></button>
		<?php } ?>
		
	<div class="container">
		<div class="row g-3">
		<?php if(isset($project[0]['project_title'])){ ?>
		<?php foreach ($project as $projects){ ?>
			<div class="col-lg-3 col-md-6">
			<div class="card">
				<img src="<?php echo base_url()?>assets/img/temp/no-image.png" class="card-img-top" >
				<div class="card-body">
					<h5 class="card-title"><?php echo $projects['project_title']?></h5>
					<p class="card-text"><?php echo $projects['project_details']?></p>
						<a href="<?php echo base_url()."project/view/".$projects['project_id']."/".$projects['project_publisher_id']?>" class="btn btn-primary">Go somewhere</a>
						<p><?php echo $projects['project_id']?></p>
				</div>
			</div>
		</div>
			
		<?php } ?>
		<?php }else{?>
			<!-- kapag walang nahanap na project -->
			<p>No projects found!</p>
		<?php } ?>
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