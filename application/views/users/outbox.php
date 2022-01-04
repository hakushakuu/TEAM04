<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | SETTINGS</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">


  <!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/styles.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>

    <?php $this->load->view('elements/navbar');?>
        <div>
            <button type='button'><a href='<?php echo base_url()."messages/inbox"?>'>Back</a></button>
            <br>
    <?php if($message == null){ ?>
                <!-- NO MESSAGE  -->
    <?php } 
    
        else{?>

            <table>
            <tr>
                <th>#</th>
                <th>To</th>
                <th>Email</th>
                <th>Sent</th>
                <th>Subject</th>

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
                <?php } ?>
        </div>
 
    <?php $this->load->view('elements/footer');?>
    
</body>
</html>