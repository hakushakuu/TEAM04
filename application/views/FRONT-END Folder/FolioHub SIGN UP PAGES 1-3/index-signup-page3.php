<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | SIGN UP PAGE 3</title>
	<link rel="icon" href="<?=base_url()?>assets\img\sign\img\foliohub-logo.png">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url()?>assets\css\sign\style-signup-page.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets\img\sign\img\vector-image-signup.png">
		</div>

		<div class="signup-content">
			<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="trigger" value="true">
                <div class="wrap-two">
					<!-- <label for="fileField"><img src="img/profile-icon.jpg" id="photo" onclick="triggerClick()"></label> -->
					<img src="<?=base_url()?>assets\img\sign\img\profile-icon.jpg" onclick="triggerClick()" id="photo">
					<input type="file" id="fileField" onchange="displayImage(this)" name="user_pic" accept="image/*" required style="display: none";>
					<p>Click on image to upload user icon</p>
				</div>
                <div class="wrap-two">
					<label>Biography</label>
					<textarea type="text" class="form-control" name="user_bio" required><?php echo(isset($_POST['user_bio']))? $_POST['user_bio']:""?></textarea>
				</div>

				<div class="for-buttons">
					<!-- <a type="button" class="button-next" href="index-signup-page3.html">Submit</a></button> -->
					<button type="submit" class="button-next">Submit</button>

					<a type="button" class="button-cancel" href="<?=base_url()?>">Cancel</a></button>
				</div>

              <p>Already have an account? <a class="for-signin" href="<?=base_url()?>users/sign">Sign In</a></p>
			</form>
        </div>
    </div>

	<script>
		function triggerClick(){
			document.querySelector('#fileField').click();
		}

		function displayImage(e){
			if(e.files[0]){
				var reader = new FileReader();
			}

			reader.onload = function(e){
				document.querySelector('#photo').setAttribute('src', e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	</script>
</body>
</html>