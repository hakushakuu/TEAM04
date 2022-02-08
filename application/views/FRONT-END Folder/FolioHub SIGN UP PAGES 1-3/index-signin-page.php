<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | SIGN IN</title>
	<link rel="icon" href="<?=base_url()?>assets\css-img\signin-signup\foliohub-logo.png">
	<link rel="stylesheet" href="<?=base_url()?>assets\css-img\signin-signup\style-signin-page.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets\css-img\signin-signup\vector-image-signin.jpg">
		</div>
		<div class="signin-content">
			<form method="post">
				<h2>Welcome</h2>
				<?php if(isset($error)){ ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $error ?>
						</div>
					<?php } ?>
           		<div class="input-div one">
           		   <div class="for-icons">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="for-content">
           		   		<input type="text" class="input" name="user_uid" placeholder="Username/Email" value="<?php echo (isset($_POST['user_uid']))?$_POST['user_uid']:"" ?>" required>
						
           		   </div>
           		</div>

           		<div class="input-div two">
           		   <div class="for-icons"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="for-content">
           		    	<input type="password" name="user_pwd" class="input" placeholder="Password" required>
            	   </div>
            	</div>
            	
              <input type="submit" class="button-login">
              <p>Don't have an account? <a class="for-create" href="<?=base_url()?>users/signup">Sign Up</a></p>
            </form>
        </div>
    </div>
	<script src="<?=base_url()?>assets\css-img\signin-signup\event.js"></script>
</body>
</html>