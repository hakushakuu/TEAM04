<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | VIEW SKILLS</title>
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
		<h1>Ito ang all skills</h1>
		
		<button><a href="<?php echo base_url()?>users/profile">Go back</a></button>
		<button><a href="<?php echo base_url()."users/addSkills/".$_SESSION['user_id']?>">Add Skills</a></button>
		
	<div class="container">
		<div class="row g-3">
		<?php if(isset($skills[0]['skills_id'])){ ?>
		
			<div>
				<table style="width:100%">
					<tr>
						<th>Listed Skills</th>
					</tr>
					<?php foreach($skills as $skill){?>
						<tr>
							<td><?php echo $skill['user_skills']?></td>
							<td>
								<a href="<?php echo base_url()."users/updateSkills/".$skill['skills_id'] ?>"style="color:blue">Update</a>
								<a href="<?php echo base_url()."users/deleteSkills/".$skill['skills_id'] ?>" style="color:blue">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		<?php }else{?>
			<!-- kapag walang nahanap na project -->
			<p>No skills listed!</p>
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