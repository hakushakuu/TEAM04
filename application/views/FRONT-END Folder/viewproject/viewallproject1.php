<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>FolioHub | VIEW PROJECT</title>
   <link rel="icon" href="<?=base_url()?>assets/css-img/viewproject/foliohub-logo.png">
   <link rel="stylesheet" href="<?=base_url()?>assets/css-img/viewproject/style-viewproject-page1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</head>
<body>
<section class="top-buttons">
   </section>
     <?php if(isset($project[0]['project_title'])){ ?>
         <div class="slider owl-carousel">
         <?php foreach ($project as $projects){ ?>
           <div class="card">
               <div class="card-image">
               <img src="<?php echo ($projects['project_picture']!=NULL)? $projects['project_picture']:base_url()."assets/img/temp/no-image.png"?>" alt=""></div>
                 <div class="content">
                   <div class="title">
                   <?= $projects['project_title']?></div>
                   <div class="sub-title">
                   <?php echo($projects['project_publisher_name'] != NULL)? $projects['project_publisher_name']:"NULL" ?></div>
                   <p class="text-ellipsis">
                     <?=$projects['project_details']?></p>
                   <div class="btn">
                     <a href="<?= base_url()."project/view/".$projects['project_id']."/".$projects['project_publisher_id']?>" target="_blank"><button>Read more</button></a></div>
                 </div>
             </div>
            <?php } ?>
          </div>
      <?php }else{?>
           <!-- kapag walang nahanap na project -->
           <center><p>No projects found!</p></center>
        <?php } ?>
        
            
        <a href="<?= base_url()."users/profile/".$request?>">
         <div class="for-buttons">
          <button type="button" class="button">
            <span class="button-icon">
              <ion-icon name="arrow-undo-outline"></ion-icon>
            </span>
            <span class="button-text">Previous Page</span>
          </button>
          </a>

          <?php if($request == $_SESSION['user_id']){?>
          <a href="<?= base_url()."project/add/".$request?>">
          <button type="button" class="button">
            <span class="button-icon">
              <ion-icon name="add-circle-outline"></ion-icon>
            </span>
            <span class="button-text">Add Project</span>
          </button>
          </a>
          <?php } ?>
      
          <a href="<?=base_url()?>">
          <button type="button" class="button">
            <span class="button-icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="button-text">Back to Home</span>
          </button>
          </a>
        </div>
       
           <script>
             $(".slider").owlCarousel({
               loop: false,
               autoplay: false,
               autoplayTimeout: 2000, //2000ms = 2s;
               autoplayHoverPause: true,
             });
           </script>
       
       <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>