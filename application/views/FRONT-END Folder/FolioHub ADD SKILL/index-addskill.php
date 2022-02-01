<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | ADD SKILL</title>
	<link rel="icon" href="<?=base_url()?>assets/css-img/viewaddskills/foliohub-logo.png">

	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/viewaddskills/style-addskill.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets/css-img/viewaddskills/vector-image-addskill.png">
		</div>

		<div class="addskill-content">
			<form method="post" id="try">
				<h2>Add a Skill</h2>
				<p>Please fill in the following.</p><br>
				
				<div class="wrap-two">
					<input type="text" name="user_skills" required>
					<span class="event-one"></span>
				</div>
				
				<div class="for-buttons">
				<a class="button-submit" onclick="document.getElementById('try').submit()">Submit</a>

				<a type="button" class="button-cancel" href="<?php echo base_url()."users/skill/".$_SESSION['user_id']?>">Cancel</a></button>
				</div>

			</form>
        </div>
    </div>

</body>
</html>