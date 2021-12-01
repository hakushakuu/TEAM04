<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | ACCOUNT UPDATE </title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/styles.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    <?php $this->load->view('elements/navbar');?>

    <div class="signup-form">
    <form method="post">
        <input type="hidden" name="user_id" placeholder="First Name..." value="<?php echo $user['user_id'] ?>"><br>
        <input type="text" name="user_firstName" placeholder="First Name..." value="<?php echo $user['user_firstName'] ?>"><br>
        <input type="text" name="user_lastName" placeholder="Last Name..." value="<?php echo $user['user_lastName'] ?>"><br>
        <input type="email" name="user_email" placeholder="Email..." value="<?php echo $user['user_email'] ?>"><br>
        <input type="text" name="user_uid" placeholder="Username..." value="<?php echo $user['user_uid'] ?>"><br>
        <input type="password" name="user_pwd" placeholder="Password..."><br>
        <input type="password" name="user_pwdRepeat" placeholder="Repeat Password..."><br>
        <!-- <?php echo '<input type="hidden" name="user_id" value='.$id.'>'; ?> -->
        <div class="buttons">
            <button type="submit">Update</button>
            <button type="button"><a href="<?php echo base_url()."index.php/users/account_settings"?>">Cancel</a></button>
        </div>
    </form>
</div>

    <?php $this->load->view('elements/footer');?>
</body>
</html>