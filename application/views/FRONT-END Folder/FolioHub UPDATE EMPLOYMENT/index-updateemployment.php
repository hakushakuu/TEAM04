<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | UPDATE EMPLOYMENT</title>
	<link rel="icon" href="<?=base_url()?>assets/css-img/addupdateemployment/foliohub-logo.png">

	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/addupdateemployment/style-updateemployment.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets/css-img/addupdateemployment/vector-image-updateemployment.png">
		</div>

		<div class="updateemployment-content">
			<form method="post" id="try">
				<h2>Update Information</h2>
				<p>Please complete the following information.</p>
				
				<div class="wrap-two">
					<label>Company Name</label>
					<input type="text" name="employment_company" value="<?php echo $employment['employment_company'] ?>" required>
					<span class="event-one"></span>
				</div>
				<div class="wrap-two">
					<label>Title/Position</label>
					<input type="text" name="employment_position" value="<?php echo $employment['employment_position'] ?>" required>
					<span class="event-one"></span>
				</div>
           		
				<!-- <div class="wrap-two">
					<label>Work Location</label>
					<input type="text">
					<span class="event-one"></span>
				</div> -->

				<div class="wrap-two">
					<label>Date Start</label>
					<input type="month" name="employment_start" value="<?php echo $employment['employment_start'] ?>" required>
					<span class="event-one"></span>
				</div>

				<div class="wrap-one">
					<div class="cont-one">
						<label>Date End</label>
						<input type="month" id="monthInput" value="<?=($employment['employment_end'] != "Present")? $employment['employment_end']:""?>" <?=($employment['employment_end'] == "Present")? "disabled":""?> name="employment_end" required>
					</div>
					<div class="cont-two">
						<label>Up to Present</label>
						<div class="for-present">&nbsp;
							<input type="checkbox" class="checkbox-size" id="checkbox" class="checkbox-size" name="employment_end" value="Present" <?=($employment['employment_end'] == "Present")? "checked":"" ?> required/><span class="event-one"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Present</span> 
						</div>
					</div>
				</div> 

				<div class="for-buttons">
				<a class="button-submit" onclick="document.getElementById('try').submit()">Submit</a>

				<a type="button" class="button-cancel" href="<?php echo base_url()."users/employment/".$_SESSION['user_id']?>">Cancel</a></button>
				</div>

			</form>
        </div>
    </div>

<script>
	document.getElementById('checkbox').onchange = function() {
		document.getElementById('monthInput').value = "";
		document.getElementById('monthInput').disabled = this.checked;
	}
</script>

</body>
</html>