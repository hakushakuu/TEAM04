<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | MESSAGE</title>
	<link rel="icon" href="img/foliohub-logo.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/message/style-view.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <header>
    <?php $this->load->view('elements/navbar');?>
 

<form method="POST" action="/messages/addMessage">

    <div class="container-buttons">
        <div class="for-buttons">
            <button type="button" class="buttontop">
                <a class="button-text" href="<?php echo base_url();?>messages/inbox">
                <span class="button-icon">
                    <ion-icon name="arrow-undo-outline"></ion-icon>
                </span>
                Previous Page </span></a>
            </button>
            
            <button type="button" class="buttontop">
                <a class="button-text" href="<?php echo base_url()?>">
                <span class="button-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                Back to Home </span>
            </a></button>
            
        </div> 
    </div>
    <?php
        foreach($message as $msg) ?>
    <div class="card bg-dark border border 3 p-1 m-5" style="width:70%; height:50%;">
        <div class="message-body ">
            <div class="heading ">
                <h5 style="color: white"><span class="icon fas fa-envelope"></span><?php echo $_SESSION['user_uid'] ?></h5>
               
                <h5 style="color: white"><span class="icon fas fa-calendar"></span><?php echo(date("F j, Y", $msg['dateCreated']));?></h5>
            </div>
            <div class="message">
                <p style="color: white"><?php echo $msg['messageContent'];?></p>
            </div>
        </div>
    </div>


<form method="POST" action="<?php echo base_url();?>/messages/addMessage">

    
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>