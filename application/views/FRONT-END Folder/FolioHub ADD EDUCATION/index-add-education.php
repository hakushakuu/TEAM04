<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | EDUCATION</title>
	<link rel="icon" href="<?=base_url()?>assets/css-img/addupdateeducation/foliohub-logo.png">

	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/addupdateeducation/style-add-educ.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="for-vector-pic">
			<img src="<?=base_url()?>assets/css-img/addupdateeducation/vector-image-educ.png">
		</div>

		<div class="addemployment-content">
			<form method="POST" id="try">
				<h2>Education Information</h2>
				<p>Please complete the following information.</p>
				
				<div class="wrap-two">
					<label>School Name</label>
					<input type="text" name="college_name" required>
					<span class="event-one"></span>
				</div>
				<div class="wrap-two">
					<label>Degree</label>
					<!-- <input type="text"> -->
					<Select name="college_degree" required>
						<option hidden disabled selected value  > -- select an option -- </option>
						<option value="Associate">Associate</option>
						<option value="Bachelor">Bachelor</option>
						<option value="Master">Master</option>
						<option value="Doctor">Doctor</option>	
					</Select>
					<span class="event-one"></span>
				</div>
           		
				<div class="wrap-two">
					<label>Course</label>
					<input type="text" name="college_course" required>
					<span class="event-one"></span>
				</div>

				<div class="wrap-two">
					<label>Date Start</label>
					<input type="month" name="college_date_start" required>
					<span class="event-one"></span>
				</div>

				<div class="wrap-one">
					<div class="cont-one">
						<label>Date End</label>
						<input type="month" name="college_date_end" id="monthInput" required>
					</div>
					<div class="cont-two">
						<label>Up to Present</label>
						<div class="for-present">&nbsp;
							<input type="checkbox" id="checkbox" class="checkbox-size" name="college_date_end" value="Present"/><span class="event-one"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Present</span> 
						</div>
					</div>
				</div> 

				<div class="for-buttons">
					<a class="button-submit" onclick="document.getElementById('try').submit()">Submit</a>

					<a type="button" class="button-cancel" href="<?php echo base_url()."users/education/".$_SESSION['user_id']?>">Cancel</a></button>
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