<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | SIGNUP</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    <header>
    <?php $this->load->view('elements/navbar');?>
 
<form method="POST" action="/messages/addMessage">
    
    <input type="hidden" name="messageId" value="<?=$message[0]['id']?>">
    Sender
    <input type="hidden" name="senderId" value="<?php echo $_SESSION['user_id'] ?>">
    <br />

    Receiver
    <input type="hidden" name="receiverId" value="<?=$message[0]['receiverId']?>">
    <input type="text" value="<?=$receiver[0]['user_uid']?>">
    <br />

    Messages
    <table>
        <tr>
            <td>Message</td>
            <td>Date Sent</td>
        </tr>
        <?php
            foreach($message as $msg) :
        ?>
                <tr>
                    <td><?php echo $msg['messageContent'];?></td>
                    <td><?php echo $msg['dateCreated'];?></td>
                </tr>
        <?php endforeach; ?>
    </table>

    Message Content
    <textarea name="messageContent" cols="80" rows="20"></textarea>

    <input type="submit" value="Reply Message">


</form>

<?php
        $this->load->view('elements/footer');
    ?>