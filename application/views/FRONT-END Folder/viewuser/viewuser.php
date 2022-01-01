<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | VIEW USER</title>
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
	<?php $this->load->view('elements/navbar');?>
<!------- CONTENT ------->

<div class="userinfo">
  <div class="heading">
      <h1>User Information</h1>
  </div>

  <div class="content">
      <img src="<?php echo ($user['user_pic']===NULL)? base_url()."assets/img/temp/Portrait_Placeholder.png" : "data:image;base64,".$user['user_pic'] ?>">

      <div class="textbox">
          <h1><b><?php echo $user['user_firstName']." ".$user['user_lastName']; ?></b></h1>
		  <p><b>Address: </b><?php echo $user['user_address']; ?>
			<br><b>Email: </b><a href="mailto:" class="email-link"><?php echo $user['user_email']; ?></a>
          <p><?php echo $user['user_bio']; ?></p>
        
      <?php if($_SESSION['user_id'] == $user['user_id']){ ?>
        <div>
        <a href="<?php echo base_url()."users/college/".$user['user_id'] ?>" type="button" class="button">College</a>
        
        <a href="<?php echo base_url()."users/employment/".$user['user_id']?>" type="button" class="button">Employment</a>
        
        <a href="<?php echo base_url()."users/skill/".$user['user_id']?>" type="button" class="button">Skill</a>
      </div>
      <?php } ?>
			
      <a href="<?php echo base_url()."users/resume" ?>" type="button" class="button" target="_blank">Resume</a>
			
		  <a href="<?php echo base_url()."project"."/".$user['user_id'] ?>" type="button" class="button" target="_blank">Projects</a>
			
		  <a href="#" type="button" class="button" target="_blank">Fields</a>
      </div>

  </div>
</div

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