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
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/styles.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    <header>
    <?php $this->load->view('elements/navbar');?>

        
<?=isset($message) ? $message : "";?>
<button type='button'><a href='<?php echo base_url()."messages/inbox"?>'>Cancel</a></button>
<form method="POST" >
    
    <input type="hidden" name="senderId" value="<?php echo $_SESSION['user_id'] ?>">
    
    <br />

    Receiver
    <select name="receiverId">
        <?php foreach($receivers as $receive) : ?>
            <option value="<?=$receive['user_id']?>"><?=$receive['user_uid']?></option>
        <?php endforeach; ?>
    </select>
    <br />
    
    Subject
    <textarea name="Subject" cols="35" rows="2"></textarea>


    Message Content
    <textarea name="messageContent" cols="80" rows="20"></textarea>

    <input type="submit" value="Send Message">
</form>

<?php
        $this->load->view('elements/footer');
    ?>