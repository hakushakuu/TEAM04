<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | MESSAGE</title>
	<link rel="icon" href="<?=base_url()?>assets/css-img/messages/foliohub-logo.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/messages/style-view.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    
    <div class="container-buttons">
        <div class="for-buttons">
            <a href="<?php echo base_url();?>messages/inbox">
            <button type="button" class="buttontop">
                <span class="button-icon">
                    <ion-icon name="arrow-undo-outline"></ion-icon>
                </span>
                <span class="button-text">Previous Page</span>
            </button>
            </a>

            <a href="<?php echo base_url();?>">
            <button type="button" class="buttontop">
                <span class="button-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="button-text" href="<?php echo base_url()?>">Back to Home</span>
            </button>
            </a>
        </div> 
    </div>

    <div class="container-message">
        <div class="message-body">
            <div class="heading">
                <h5><span class="icon fas fa-envelope"></span>From: <?php echo $sender[0]['user_firstName']." ".$sender[0]['user_lastName'] ?></h5>
                <h5><span class="icon fas fa-envelope"></span>To: <?php echo $receiver[0]['user_firstName']." ".$receiver[0]['user_lastName'] ?></h5>
                <h5><span class="icon fas fa-calendar"></span>Date: <?php echo date('F j, Y', $message[0]['dateCreated'])?></h5>
            </div>
            <div class="message">
                <p><?=$message[0]['messageContent'] ?></p>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>