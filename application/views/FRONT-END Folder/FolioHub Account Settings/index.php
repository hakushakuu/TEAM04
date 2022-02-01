<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | ACCOUNT SETTINGS</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css-img/account_settings/style.css">
	<link rel="icon" href="<?=base_url()?>assets/css-img/account_settings/foliohub-logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<?php //print_r($user); ?>
<body>
	<section class="py-5">
		<div class="container">
			<h1 class="mb-5" style="color: white; background-color: hidden; width: 350px;">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<form method="post" id="imgForm" enctype="multipart/form-data">
							<!-- <input type="file" accept="image/*" id="imgupload" style="display:none">  -->
							<input type="hidden" name="pic_trigger" value="submit">
							<input type="file" id="imgupload" onchange="displayImage(this)" name="user_pic" accept="image/*" required style="display: none";>
							<img src="<?=$user['user_pic']?>" onclick="triggerClick()" id="ImgUpload" class="shadow">
							<!-- <button id="OpenImgUpload" style="background-color: rgba(0,0,0,0); border-style:none;"><img src="img/profile-icon.jpg" alt="Image" class="shadow"></button> -->
							</form>
						</div>
						<h4 class="text-center"><?=$user['user_firstName']." ".$user['user_lastName'];?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="deact-tab" data-toggle="pill" href="#deactivate" role="tab" aria-controls="deactivate" aria-selected="false">
							<i class="fa fa-remove text-center mr-1"></i> 
							Deactivate
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<?php if(isset($error)){ ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $error ?>
						</div>
						<?php } ?>
						<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" class="form-control" value="<?=$user['user_firstName']?>" name="user_firstName" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text" class="form-control" value="<?=$user['user_lastName']?>" name="user_lastName" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" value="<?=$user['user_email']?>" name="user_email" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Username</label>
								  	<input type="text" class="form-control" value="<?=$user['user_uid']?>" name="user_uid" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Contact number</label>
								  	<input type="tel" pattern="[0-9]{11}" class="form-control" value="<?=$user['user_number']?>" name="user_number" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Bio</label>
									<textarea class="form-control" rows="4" name="user_bio" required><?=$user['user_bio']?></textarea>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" name="submit" value="submit">Update</button>
							<a href="<?=base_url()?>" type="button" class="btn btn-light">Cancel</a>
						</div>
						</form>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control" name="user_oldPwd" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control" name="user_pwd" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control" name="user_pwdRepeat" required>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" name="submit1" value="submit">Update</button>
							<a href="<?=base_url()?>" type="button" class="btn btn-light">Cancel</a>
						</div>
					</form>
					</div>
					<div class="tab-pane fade" id="deactivate" role="tabpanel" aria-labelledby="deact-tab">
						<h3 class="mb-4">Deactivate Account</h3>
						<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Password</label>
								  	<input type="password" class="form-control" name="user_pwd" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm password</label>
								  	<input type="password" class="form-control" name="user_pwdRepeat" required>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-danger" name="submit2" value="submit">Deactivate</button>
							<a href="<?=base_url()?>" type="button" class="btn btn-light">Cancel</a>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	
	</section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="<?=base_url()?>assets/css-img/account_settings/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/css-img/account_settings/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/css-img/account_settings/assets/js/script.js"></script>
	<script>
		function triggerClick(){
			document.querySelector('#imgupload').click();
		}

		function displayImage(e){
			if(e.files[0]){
				var reader = new FileReader();
			}

			reader.onload = function(e){
				document.querySelector('#imgupload').setAttribute('src', e.target.result);
				document.getElementById('imgForm').submit()
			}
			reader.readAsDataURL(e.files[0]);
			
		}
	</script>

</body>
</html>