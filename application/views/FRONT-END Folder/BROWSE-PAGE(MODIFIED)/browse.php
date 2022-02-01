<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FolioHub | BROWSE</title>
  <link rel="icon" href="<?=base_url()?>assets/css-img/browse/foliohub-logo.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/browse/style-browsepage.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>

<!-- Content of browse page -->

<!-- navigation -->
<div class="wrapper">
    <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>

        <div class="content">
            <div class="logo"><a href="<?=base_url()?>">
		        <img src="<?=base_url()?>assets/css-img/browse/foliohub-logo.png" width="30" height="30">FolioHub</a>
            </div>
        </div>

        <!-- <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label> -->
        

        <form method="post">
            <input type="text" name="searchKeyword" value="<?php echo $searchKeyword ?>" placeholder="Type Something to Search...">
            <button type="submit" name="submitSearch" value="Search">Submit</button>
        </form> 
    </nav>
</div>


<div class="projects" id="projectpage">
    <div class="post-heading text-center">
        <h3 class="display-4 text-uppercase">browse Projects </h3>
    </div>
    <div class="main">
        <?php if(!empty($project)){ foreach($project as $prj){ ?>
			<div class="card">
            <div class="image">
                <img src="<?=$prj['project_picture']?>">
            </div>
            <div class="title">
                <h1><?=$prj['project_title']?></h1>
            </div>
            <div class="des">
                <a href="<?php echo base_url()."project/view/".$prj['project_id']."/".$prj['project_publisher_id'] ?>">
                <button>View More</button>
                </a>
            </div>
        </div>
		<?php } }else{ ?>
			<p>Post(s) not found...</p>
		<?php } ?>
        <!-- Display pagination links -->
        <div class="pagination-pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>   

	































<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
