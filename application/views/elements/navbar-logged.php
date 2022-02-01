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
              <li><a href="<?=base_url()?>dev" target="_blank">Developers</a></li>
            </ul>
          </li>

          <li>
            <a href="#" class="desktop-link"><i class="fas fa-envelope"><span> Message </span></i></a>
            <input type="checkbox" id="show-featurestwo">
            <label for="show-featurestwo"><i class="fas fa-envelope"><span> Message </span></i></label>
            <ul>
              <li><a href="<?=base_url()?>messages/addMessage">Compose Message</a></li>
              <li><a href="<?=base_url()?>messages/inbox">Inbox</a></li>
              <li><a href="<?=base_url()?>messages/outbox">Sent Box</a></li>
            </ul>
          </li>
 
          <li>
            <a href="#" class="desktop-link"><i class="fas fa-user"><span> User </span></i></a>
            <input type="checkbox" id="show-featuresthree">
            <label for="show-featuresthree"><i class="fas fa-user"><span> <?=$_SESSION['user_uid']?> </span></i></label>
            <ul>
              <li><a href="<?=base_url()?>users/profile">My Profile</a></li>
              <li><a href="<?=base_url()?>users/settings">Account Settings</a></li>
              <li><a href="<?=base_url()?>users/logout">Log Out</a></li>
            </ul>
          </li>

       </ul>
     </div>

      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
      </form>
   
    </nav>
  </div>