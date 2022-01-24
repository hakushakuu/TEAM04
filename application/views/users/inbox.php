<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | INBOX</title>
	<link rel="icon" href="img/foliohub-logo.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/inbox/style-inbox.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
        <div class="row inbox">
            <!-- for the left-side -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body inbox-menu">						
                        <p class="banner text-center">Messaging</p>
                        <ul>
                            <li>
                            <a href="<?php echo base_url()."messages/addMessage"?>"><i class="fa fa-pen"></i> Compose</a>
                            </li>
                            <li id="inbox-message">
                            <a href='<?php echo base_url()."messages/inbox"?>'><i class="fa fa-inbox">Inbox </i> </a>
                            </li>
                            <li>
                            <a href='<?php echo base_url()."messages/outbox"?>'><i class="fa fa-inbox">Sent </i> </a>
                            </li>
                        </ul>
                    </div>	
                </div>
            </div>
            
            <!-- for the right side -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- for the upper buttons -->
                        <div class="container-btn">

                            <div class="for-buttons">
                              
                              <button type="button" class="button">
                                <span class="button-icon">
                                  <ion-icon name="home-outline"></ion-icon>
                                </span>
                                <span class="button-text"><a class="sect" href="<?php echo base_url()?>">Home</a></span>
                              </button>
                            </div>
                            
                    </div> 
                        <!-- for the messaging list -->
                        <?php if($message == null){ ?>
                            <!-- NO MESSAGE  -->
                        <?php } 
    
                        else{?>
                            <?php  foreach($message as $output){ ?>
                        <ul class="messages-list">
                            <li class="unread">
                                <a href="">
                                    <div class="header">
                                        <span class="action"></i><i class="fa fa-square"></i></span> 
                                        <?php 
                                        echo   '<a href="getMessage/'.$output['id'].'"><span class="from">'.   $output['user_uid'] . "</span></a>";
                                        echo   '<a href="getMessage/'.$output['id'].'"><span class="date"><span class="fa fa-paper-clip">'.   $output['dateCreated']. "</span></span></a>";
                                        ?>
                                        </div>	
                                    <div class="description">
                                    <?php echo   '<a href="getMessage/'.$output['id'].'">'.   $output['Subject']  .  "</a>";?>
                                    </div>
                                </a>		
                            </li>

                        </ul> 
                        <?php  } ?>

<<<<<<< Updated upstream
            </tr>
            
        <?php    
               foreach($message as $output){ ?>
                <tr>
                    
                    <td> <?php echo $output['id']   ?> </td>
                    <td> <?php echo $output['user_uid']   ?> </td>
                    <td> <?php echo $output['user_email']   ?> </td>
                    <td> <?php echo $output['dateCreated']   ?> </td>
                    <td> <?php echo $output['Subject']   ?> </td>
                </tr>

                
       
            
          <?php  } ?>

        </table>
=======
        
>>>>>>> Stashed changes
                <?php } ?>
                    </div>	 
                </div>	   
            </div>       
        </div>
    </div>
        
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>