<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FolioHub | UPDATE PROJECT</title>
  <link rel="icon" href="<?=base_url()?>assets/css-img/addproject/foliohub-logo.png">
  <link rel="stylesheet" href="<?=base_url()?>assets/css-img/addproject/style-addproject-page.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <!-- navigation -->
   <?php $this->load->view('elements/navbar-logged')?>
</header>

<div class="container">
  <div class="for-vector-pic">
    <img src="<?=base_url()?>assets/css-img/addproject/vector-image-addproject.png">
  </div>
  <div class="addproject-content">
  <?php if(isset($error)){ ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $error ?>
				</div>
				<?php } ?>
    <form method="POST" id="try" action="<?=base_url()."project/addprojectpic/".$project['project_id']."/".$_SESSION['user_id']?>" enctype="multipart/form-data">
        <h2>Add Picture</h2>
 
      <div class="wrap-two">
        <input type="hidden" name="trigger" value="submit">
        <label>Select more images</label>
        <input type="file" name="project_picture[]" multiple required>
      </div>

      <div class="for-buttons">
        <!-- <button type="submit" class="button">Submit</button> -->
        <a class="button-next" onclick="document.getElementById('try').submit()">Submit</a>
        <a type="button" class="button-cancel" href="<?php echo base_url()."project/view/".$project['project_id']."/".$project['project_publisher_id']?>">Cancel</a></button>
      </div>
    </form>
  </div>
</div>

</body>
</html>