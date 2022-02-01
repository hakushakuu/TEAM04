<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FolioHub | VIEW SPECIFIC PROJECT</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css-img/viewproject/style-viewspecific-page.css">
<link rel="icon" href="<?=base_url()?>assets/css-img/viewproject/foliohub-logo.png">
</head>
<body>

  <?php 
  if($image != NULL){
    $bilang = count($image);
  } ?>
 <?php if($project['project_publisher_id'] === $_SESSION['user_id']){?>
 <a href="<?php echo base_url()."project/addprojectpic/".$project['project_id']."/".$_SESSION['user_id']?>">
  <div class="for-buttons">
    <button type="button" class="button">
      <span class="button-icon">
        <ion-icon name="duplicate-outline"></ion-icon>
      </span>
      <span class="button-text">Add Images</span>
    </button>
  </a>

    <a href="<?php echo base_url()."project/update/".$project['project_id']."/".$_SESSION['user_id']?>">
    <button type="button" class="button">
      <span class="button-icon">
        <ion-icon name="refresh-outline"></ion-icon>
      </span>
      <span class="button-text">Update Project</span>
    </button>
    </a>

    <a href="<?php echo base_url()."project/delete/".$project['project_id']."/".$_SESSION['user_id']?>">
    <button type="button" class="button">
      <span class="button-icon">
        <ion-icon name="trash-outline"></ion-icon>
      </span>
      <span class="button-text">Delete Project</span>
    </button>
    </a>
  </div>
  <?php } ?>

<div class="container">
<?php for($i=1;$i<=$bilang;$i++){?>
  <div class="mySlides">
    <div class="numbertext"><?=$i?> / <?=$bilang?></div>
    <img src="<?php echo ($image[$i-1] != NULL)? $image[$i-1]['project_picture']: base_url()."assets/img/temp/no-image.png"?>" style="width:100%">
      <div class="caption-container" style="height: 86px;">
      <?php if($project['project_publisher_id'] === $_SESSION['user_id']){?>
      <?php if($i != 1){ ?>
        <div class="for-buttons">
        <a href="<?php echo base_url()."project/change_cover/".$project_id."/".$image[$i-1]['project_picture_id']."/".$_SESSION['user_id']?>">
        <button type="button" class="button-carousel">
          <span class="button-icon">
            <ion-icon name="image-outline"></ion-icon>
          </span>
          <span class="button-text">Make as a Cover</span>
        </button>
        </a>

        <a href="<?php echo base_url()."project/delete_pic/".$project_id."/".$image[$i-1]['project_picture_id']."/".$_SESSION['user_id']?>")>
        <button type="button" class="button-carousel">
          <span class="button-icon">
            <ion-icon name="trash-outline"></ion-icon>
          </span>
          <span class="button-text">Delete Image</span>
        </button>
        </a>
      </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
<?php } ?>
  
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <!-- <div class="caption-container">
    <p id="caption"></p>
  </div> -->

  

  <div class="row">
    <?php for($i=1;$i<=$bilang;$i++){?>
    <div class="column">
      <img class="demo cursor" src="<?php echo ($image[$i-1] != NULL)? $image[$i-1]['project_picture']: base_url()."assets/img/temp/no-image.png"?>" style="width:100%" onclick="currentSlide(<?=$i?>)">
    </div>
    <?php } ?>
  </div>
</div>

<div class="project-description">
    <div class="project-content">
        <h1 class="project-name"><?php echo $project['project_title']?></h1>
        <a href="<?=base_url()."users/profile/".$project['project_publisher_id']?>"><p class="project-developer"><?=($project['project_publisher_name'] != NULL)? $project['project_publisher_name']:"NULL" ?></p></a>

        <div class="text-content">
          <p><?php echo $project['project_details']?></p>
        <br>
        <br>
        </div>

        <div class="for-buttons">
          <a class="button" href="<?php echo base_url()."project/".$request?>" target="_blank">
            <span class="button-icon">
              <ion-icon name="arrow-undo-outline"></ion-icon>
            </span>
            <span class="button-text">Previous Page</span>
          </a>

          <a class="button" href="<?=base_url()?>" target="_blank">
            <span class="button-icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="button-text">Back to Home</span>
          </a>
        </div>

        <!-- <button type="button" class="button">
            <span class="button-icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="button-text">Back to Home</span>
          </button> -->
    </div> 
</div> 

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    
</body>
</html>
