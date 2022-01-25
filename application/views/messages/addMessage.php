<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | COMPOSE</title>
	<link rel="icon" href="img/foliohub-logo.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/message/style-compose.css"></link>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
	<div class="container col-lg-9">
        <div class="row inbox">
            <!-- for the left-side -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body inbox-menu">						
                        <p class="banner text-center">Messaging</p>
                        <ul>
                            <li id="compose">
                            <a href="<?php echo base_url()."messages/addMessage"?>"><i class="fa fa-pen"></i> Compose</a>
                            </li>
                            <li>
                            <a href='<?php echo base_url()."messages/outbox"?>'><i class="fa fa-inbox">Sent </i> </a>
                            </li>
                            <li>
                            <a href='<?php echo base_url()."messages/inbox"?>'><i class="fa fa-inbox">Inbox </i> </a>
                            </li>
                        </ul>
                    </div>	
                </div>
            </div>
            
            <!-- for the right side -->
                <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-body message">
                                <p class="text-center upper">New Message</p>
                                    <form method="POST">
                                        <div class="row">

                                        <input type="hidden" name="senderId" value="<?php echo $_SESSION['user_id'] ?>">

                                            <div class="form-group col-lg-6 col-md-12 col-sm-12 col-12">
                                                <label for="username" class="col-sm control-label">Username:</label>
                                                <!-- <input type="" class="form-control" placeholder="Type username" tabindex="-1"> -->
                                                <select name="receiverId">
                                                    <?php foreach($receivers as $receive) : ?>
                                                    <option value="<?=$receive['user_id']?>"><?=$receive['user_uid']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-6 col-md-12 col-sm-12 col-12">
                                                <label for="subject" class="col-sm control-label">Subject:</label>
                                                <input type="text" placeholder="Type subject" name="Subject" class="form-control" tabindex="-1">
                                            </div>
                                        </div>  
                                    
                                    
                                    <div>
                                        <textarea class="form-control mb-3 mt-4" id="message" name="messageContent" rows="12" placeholder="Write your message here..." id="#" cols="10" rows="10"></textarea>
                                    </div> 
                                        
                                    <div class="form-group for-buttons">	
                                        <button type="submit" class="btn-send" id="send">Send</button>
                                        <a href="<?php echo base_url()."messages/inbox"?>"><button type="button" class="btn-discard">Discard</button></a>
                                </div>
                                </form> 
                            </div>	
                        </div>	
                </div>	
        </div>		
    </div>
        
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>