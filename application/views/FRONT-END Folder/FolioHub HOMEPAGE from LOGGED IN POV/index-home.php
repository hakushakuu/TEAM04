<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>FolioHub | HOME</title>
   <link rel="icon" href="<?=base_url()?>assets/css-img/home-dev/foliohub-logo.png">
   <link rel="stylesheet" href="<?=base_url()?>assets/css-img/home-dev/style-home-logged.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<header>
   <!-- navigation -->
   <?php $this->load->view('elements/navbar-logged'); ?>

      <!-- banner -->
   <div class="title">
      <div class="container">
         <h1 class="main-title"><span>Folio</span>Hub</h1>
         <p> A Wonderful place to showcase, explore, and discover. </p>
         <a href="#content-section" type="button" class="button-explore">EXPLORE</a>
      </div>
   </div>
</header>
      <!-- end of the nav and banner -->

      <!-- content -->
   <div class="section-container" id="content-section">
      <div class="columns content">
         <div class="content-container">
            <h1>what is folioHub</h1>
            <p>
            FolioHub is an online portfolio, which is a platform that represents the work, achievements, and skills of Team 4 or the developers. This includes their biography, a summary of their skills and qualifications, achievements, projects, or design samples and more. Team 4 decided to develop an online portfolio to make a way to showcase and promote their work individually or the group. 
            This FolioHub will give people an access to the Team’s work and will have a better idea of their abilities and skills. There are also articles or projects that a user can view, and possibly for marketing and scouting purposes. This portfolio doesn’t only focus on programming, the user may indicate what field his project is in. 
            </p>
         </div>
      </div>
         <div class="columns image"><img src="<?=base_url()?>assets/css-img/home-dev/vector1.png" width="100%" height="100%">&nbsp;</div>
   </div>

   <div class="section-container">
      <div class="columns image"><img src="<?=base_url()?>assets/css-img/home-dev/vector2.png" width="100%" height="100%">&nbsp;</div>
      <div class="columns content">
         <div class="content-container">
            <h1>how folioHub works</h1>
            <p>
               This project also tends to be used in the future. With this portfolio, other users can also create their own account in FolioHub. Upon registration, the new user may also indicate information about him, such as his name, contact info, education, and even employment history if he is employed. And by having an account, they can now also start showcasing their own works and projects.
            </p>
            <div class="for-buttons">
               <a class="button-contact" href="mailto:bscs3abteam04@gmail.com" target="_blank">
                 <span class="button-text">Contact Us!</span>
               </a>
            </div>
         </div>
      </div>
   </div>

      <!-- footer -->
<footer>
   <div class="socmed-links">
         <a href="#" > <i class="fab fa-facebook-f"></i></a>
         <a href="#" > <i class="fab fa-instagram"></i></a>
         <a href="#" > <i class="fab fa-twitter"></i></a>
         <a href="#" > <i class="fab fa-linkedin"></i></a>
   </div>
         <span>Copyright &copy;2021 FolioHub | All Rights Reserved</span>
</footer>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>