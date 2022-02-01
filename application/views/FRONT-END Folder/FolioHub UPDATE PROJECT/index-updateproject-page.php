<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FolioHub | UPDATE PROJECT</title>
  <link rel="icon" href="<?=base_url()?>assets/css-img/updateproject/foliohub-logo.png">
  <link rel="stylesheet" href="<?=base_url()?>assets/css-img/updateproject/style-updateproject-page.css">
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
    <img src="<?=base_url()?>assets/css-img/updateproject/vector-image-updateproject.png">
  </div>
  <div class="addproject-content">
    <form method="POST" id="try" action="<?=base_url()."project/update/".$project['project_id']."/".$_SESSION['user_id']?>">
        <h2>Update Project</h2>
        <p>Please fill in the following.</p>
      <div class="wrap-two">
        <label>Project Title</label>
        <input type="text" value="<?php echo $project['project_title'];?>" name="project_title" required>
      </div>
      <div class="wrap-two">
        <label>Project Description</label>
        <textarea type="text" class="form-control" required name="project_details"><?php echo $project['project_details'];?></textarea>
      </div>

      <div class="for-buttons">
        <a class="button-next" onclick="document.getElementById('try').submit()">Submit</a>
        <a type="button" class="button-cancel" href="<?php echo base_url()."project/view/".$project['project_id']."/".$project['project_publisher_id']?>">Cancel</a></button>
      </div>
    </form>
  </div>
</div>

</body>
</html>