<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FolioHub | VIEW USER</title>
  <link rel="icon" href="<?=base_url()?>assets/css-img/viewuser/foliohub-logo.png">
  <link rel="stylesheet" href="<?=base_url()?>assets/css-img/viewuser/style-viewuser-page.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

  <header>
    <!-- navigation -->
   <?php $this->load->view('elements/navbar-logged'); ?>
</header>

<!------- CONTENT ------->
<div class="user-info">
    <div class="heading">
        <h2>User Information</h2>
    </div>
  
    <div class="main-content">
    <img src="<?php echo ($user['user_pic']===NULL)? base_url()."assets/img/temp/Portrait_Placeholder.png" : $user['user_pic'] ?>">
  
        <div class="text-box">
            <h1><b><?= $user['user_firstName']." ".$user['user_lastName'] ?></b></h1>
            <p><b><span>Address:</span> </b><?=$user['user_address']?>
              <br><b><span>Email:</span>
              </b><?=$user['user_email']?></a>
              
              <?php if($_SESSION['user_id'] == $user['user_id']){ ?>
              <div class="for-buttons">
              <a href="<?php echo base_url()."users/education/".$user['user_id'] ?>">
              <button type="button" class="button">
                <span class="button-icon">
                <ion-icon name="create-outline"></ion-icon>
                </span>
                <span class="button-text">Education</span>
              </button>
              </a>

              <a href="<?php echo base_url()."users/employment/".$user['user_id']?>">
              <button type="button" class="button">
                <span class="button-icon">
                <ion-icon name="create-outline"></ion-icon>
                </span>
                <span class="button-text">Employment</span>
              </button>
               </a>

              <a href="<?php echo base_url()."users/skill/".$user['user_id']?>">
              <button type="button" class="button">  
                <span class="button-icon">
                <ion-icon name="create-outline"></ion-icon>
                </span>
                <span class="button-text">Skills</span>
              </button>
              </a>
            </div><br>
            <?php } ?>
              
            <p><?=$user['user_bio']?></p>

            <div class="for-buttons">
              <a href="<?php echo base_url()."users/resume/".$user['user_id'] ?>">
              <button type="button" class="button">
                <span class="button-icon">
                  <ion-icon name="arrow-down-circle-outline"></ion-icon>
                </span>
                <span class="button-text">Resume</span>
              </button>
              </a>
     
              <a href="<?php echo base_url()."project"."/".$user['user_id'] ?>">
              <button type="button" class="button">
                <span class="button-icon">
                  <ion-icon name="documents-outline"></ion-icon>
                </span>
                <span class="button-text">Projects</span>
              </button>
              </a>
            </div>
    </div>
   </div>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</div>

 



