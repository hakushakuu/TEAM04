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
	<link rel="stylesheet" href="style-view.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-buttons">
        <div class="for-buttons">
            <button type="button" class="buttontop">
                <span class="button-icon">
                    <ion-icon name="arrow-undo-outline"></ion-icon>
                </span>
                <span class="button-text" href="<?php echo base_url();?>users/inbox">Previous Page</span>
            </button>

            <button type="button" class="buttontop">
                <span class="button-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="button-text" href="<?php echo base_url()?>">Back to Home</span>
            </button>
        </div> 
    </div>

    <div class="container-message">
        <div class="message-body">
            <div class="heading">
                <h5><span class="icon fas fa-envelope"></span><?php echo $_SESSION['user_id'] ?></h5>
                <h5><span class="icon fas fa-calendar"></span><?php echo $msg['dateCreated'];?></h5>
            </div>
            <div class="message">
                <p><?php echo $msg['messageContent'];?></p>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>