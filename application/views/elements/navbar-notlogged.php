<div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>

      <div class="content">
      <div class="logo"><a href="<?=base_url()?>">
		   <img src="<?=base_url()?>assets/css-img/home-dev/foliohub-logo.png" width="30" height="30"> FolioHub </a>
      </div>
      <ul class="links">

         <li>
            <a href="#" class="desktop-link"><i class="fab fa-firefox-browser"><span> Browse </span></i></a>
            <input type="checkbox" id="show-featuresone">
            <label for="show-featuresone"><i class="fab fa-firefox-browser"><span> Browse </span></i></label>
            <ul>
              <li><a href="<?=base_url()?>search">Projects</a></li>
              <li><a href="<?=base_url()?>dev">Developers</a></li>
            </ul>
          </li>

          <li><a href="<?=base_url()?>users/login">Sign In</a></li>
          
          <li><a href="<?=base_url()?>users/signup" class="for-join">Join Us</a></li>

       </ul>
     </div>

      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
      </form>
   
    </nav>
  </div>