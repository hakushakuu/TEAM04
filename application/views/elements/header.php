<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>css/styles.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Efolio Home</title>
</head>
<body>
    
<header>
    <div class="navbar">
        <div class="nav-container">
            <a href="<?php echo base_url()?>" class="navbar-brand">Efolio</a>
            <div class="navbar-nav">
                <a href="<?php echo base_url()?>">Home</a>
                <?php
                    #header display if naka log-in
                    if(isset($_SESSION["user_uid"])){ ?>
                        <a href='<?php echo base_url()."index.php/users/profile"?>'>Profile</a>
                        <a href='<?php echo base_url()."index.php/users/account_settings"?>'>Settings</a>
                        <a href='<?php echo base_url()."index.php/users/logout"?>''>Log Out</a>
                        
                    <?php } 
                    #header display if hindi naka log-in
                    else{ ?>
                        <a href='<?php echo base_url()."index.php/users/login"?>'>Login</a>
                        <a href='<?php echo base_url()."index.php/users/signup"?>'>Sign up</a>
                    <?php } ?>
            </div>
        </div>
    </div>
</header>