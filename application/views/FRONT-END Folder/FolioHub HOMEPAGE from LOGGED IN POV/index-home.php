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
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore rem sint reiciendis consequatur maiores praesentium quibusdam blanditiis in nam officiis a eos repellat mollitia, deserunt perferendis corrupti incidunt aut error eaque at? Quaerat laborum doloribus tempora recusandae expedita corporis. Veritatis fuga necessitatibus dolorum ullam, repudiandae facilis quam ratione voluptas soluta, earum cupiditate! Possimus itaque provident ullam fugit commodi fugiat consequatur quis quam atque consectetur harum dolorem reprehenderit explicabo non laudantium amet odio numquam id qui iusto sequi, aut adipisci sed.
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
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore rem sint reiciendis consequatur maiores praesentium quibusdam blanditiis in nam officiis a eos repellat mollitia, deserunt perferendis corrupti incidunt aut error eaque at? Quaerat laborum doloribus tempora recusandae expedita corporis. Veritatis fuga necessitatibus dolorum ullam, repudiandae facilis quam ratione voluptas soluta, earum cupiditate! Possimus itaque provident ullam fugit commodi fugiat consequatur quis quam atque consectetur harum dolorem reprehenderit explicabo non laudantium amet odio numquam id qui iusto sequi, aut adipisci sed.
            </p>
         </div>
      </div>
   </div>

   <div class="section-container">
      <div class="columns content">
         <div class="content-container">
            <h1>meet the team</h1>
            <p>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore rem sint reiciendis consequatur maiores praesentium quibusdam blanditiis in nam officiis a eos repellat mollitia, deserunt perferendis corrupti incidunt aut error eaque at? Quaerat laborum doloribus tempora recusandae expedita corporis. Veritatis fuga necessitatibus dolorum ullam, repudiandae facilis quam ratione voluptas soluta, earum cupiditate! Possimus itaque provident ullam fugit commodi fugiat consequatur quis quam atque consectetur harum dolorem reprehenderit explicabo non laudantium amet odio numquam id qui iusto sequi, aut adipisci sed.
            </p>
            <div class="for-buttons">
               <a class="button-meet" href="<?=base_url()?>dev" target="_blank">
                 <span class="button-text">Meet the Team</span>
               </a>
            </div>
         </div>
      </div>
      <div class="columns image"><img src="<?=base_url()?>assets/css-img/home-dev/vector3.png" width="100%" height="100%">&nbsp;</div>
   </div>

   <div class="section-container">
      <div class="columns image"><img src="<?=base_url()?>assets/css-img/home-dev/vector4.png" width="100%" height="100%">&nbsp;</div>
      <div class="columns content">
         <div class="content-container">
            <h1>Learn More</h1>
            <p>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore rem sint reiciendis consequatur maiores praesentium quibusdam blanditiis in nam officiis a eos repellat mollitia, deserunt perferendis corrupti incidunt aut error eaque at? Quaerat laborum doloribus tempora recusandae expedita corporis. Veritatis fuga necessitatibus dolorum ullam, repudiandae facilis quam ratione voluptas soluta, earum cupiditate! Possimus itaque provident ullam fugit commodi fugiat consequatur quis quam atque consectetur harum dolorem reprehenderit explicabo non laudantium amet odio numquam id qui iusto sequi, aut adipisci sed.
            </p>
            <div class="for-buttons">
               <a class="button-contact" href="#" target="_blank">
                 <span class="button-text">Contact Us!</span>
               </a>
            </div>
         </div>
      </div>
   </div>

      <!-- footer -->
<footer>
   <div class="socmed-links">
         <a href="index.html" target="_blank"> <i class="fab fa-facebook-f"></i></a>
         <a href="index.html" target="_blank"> <i class="fab fa-instagram"></i></a>
         <a href="index.html" target="_blank"> <i class="fab fa-twitter"></i></a>
         <a href="index.html" target="_blank"> <i class="fab fa-linkedin"></i></a>
   </div>
         <span>Copyright &copy;2021 FolioHub | All Rights Reserved</span>
</footer>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>