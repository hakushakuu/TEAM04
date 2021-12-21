<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | VIEW USER</title>
  <link rel="icon" href="<?php echo base_url() ?>assets/img/signup/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/viewuser/style.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>

<!------- NAVBAR ------->
<header>
	<?php $this->load->view('elements/navbar');?>
<!------- CONTENT ------->

<div class="userinfo">
  <h1>Browse</h1>
  <div class="container">
  <?php print_r($_GET); ?>
    <form method="get" action="<?php echo base_url()."browse/result"?>" class="Form text-align">
      <input type="text" placeholder="Search" name="keywords" value="<?php echo(isset($_GET['keywords']))? $_GET['keywords']:"" ?>">
      <button type="submit">Search</button>
      <div>
        <input type="radio" name="search" value="project" <?php echo(isset($search)&&$search =='project')?  "checked":"checked" ?>>
        <label>Projects</label>
        <input type="radio" name="search" value="user" <?php echo(isset($search)&&$search =='user')?  "checked":"" ?>>
        <label>Users</label>
      </div>
    </form>
  </div>

  <div>
    
    <?php if(isset($project)){
      if(count($project) != 0){
        foreach($project as $proj){
           ?>
          <a href="<?php echo base_url()."project/view/".$proj['project_id']."/".$proj['project_publisher_id'] ?>" style="color:black"><?php echo $proj['project_id'] ?></a> <br>
          <?php
        }
      }
      else{
        echo "No Project Found!";
      }
    }else{
      if(count($users) != 0){
        foreach($users as $user){
          ?>
          <a href="<?php echo base_url()."users/profile/".$user['user_id']?>" style="color:black"><?php echo $user['user_id'] ?></a> <br>
          <?php
        }
      }
      else{
        echo "No Users Found!";
      }
    } ?>
  </div>
</div>

	<!------- FOOTER ------->
	<footer>
		<div class="socmed-links">
			<a href="index.html" target="_blank"> <i class="fab fa-facebook-f"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-instagram"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-twitter"></i></a>
            <a href="index.html" target="_blank"> <i class="fab fa-linkedin"></i></a>
		</div>
		<h5>Copyright &copy;2021 E - FOLIO | All Rights Reserved</h5>
	  </footer>

	

	 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>