
<?php
#header display if naka log-in
if(isset($_SESSION["user_uid"])){ ?>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-50">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo base_url()?>">
						<img src="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png" width="30" height="30" class="d-inline-block align-top" alt="">
						E-FOLIO
					</a>
					<button type="button" class="navbar-toggler" 
					data-bs-toggle="collapse" 
					data-bs-target="#navbarCollapse">
			
					<i class="fas fa-bars"></i>
					</button>
		
					<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav ms-auto">

					<form>
						<input type="text" class="search-input" 
						placeholder="Search here...">
						<button type="submit" class="search-btn"> 
							<i class="fas fa-search"></i>
						</button>
					</form>
					
					<a class="sect" href="<?php echo base_url()?>">Home</a>
					<a class="sect" href="<?php echo base_url()?>">Browse</a>
					<a class="sect" href="<?php echo base_url()."users/profile"?>"><?php echo $_SESSION['user_uid']; ?></a>
  					<a class="sect" href="<?php echo base_url()."users/account_settings"?>">Settings</a>
  					<a class="sect" href="<?php echo base_url()."users/logout"?>">Logout</a>
				</div>
			</div>		
		</div>
	</nav>
<?php } 
#header display if hindi naka log-in
else{ ?>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-50">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo base_url()?>">
						<img src="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png" width="30" height="30" class="d-inline-block align-top" alt="">
						E-FOLIO
					</a>
					<button type="button" class="navbar-toggler" 
					data-bs-toggle="collapse" 
					data-bs-target="#navbarCollapse">
			
					<i class="fas fa-bars"></i>
					</button>
		
					<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav ms-auto">

					<form>
						<input type="text" class="search-input" 
						placeholder="Search here...">
						<button type="submit" class="search-btn"> 
							<i class="fas fa-search"></i>
						</button>
					</form>
					
					<a class="sect" href="<?php echo base_url()?>">Home</a>
					<a class="sect" href="<?php echo base_url()?>">Browse</a>
  					<a class="sect" href="<?php echo base_url()."users/login"?>">Sign in</a>
  					<a class="sect" href="<?php echo base_url()."users/signup"?>">Sign up</a>
				</div>
			</div>		
		</div>
	</nav>
                    <?php } ?>
                    