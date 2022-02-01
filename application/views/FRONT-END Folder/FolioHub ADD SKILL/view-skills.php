<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FolioHub | EDUCATION</title>
	<link rel="icon" href="<?=base_url()?>assets/css-img/viewaddskills/foliohub-logo.png">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url()?>assets/css-img/viewaddskills/style-skills-page.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Goblin+One&family=Noto+Serif+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Ranchers&family=Slackey&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <!-- for the upper buttons -->
    <div class="container-btn">
        
        <div class="for-buttons">
        <a href="<?=base_url()?>users/profile">
            <button type="button" class="button">
                <span class="button-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="button-text">Go to Profile</span>
            </button>
        </a>
        <a href="<?=base_url()."users/addSkills/".$_SESSION['user_id']?>">
                <button type="button" class="button">
                    <span class="button-icon">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                <span class="button-text">Add Skill</span>
            </button>
        </a>
        </div>     
    </div> 

    <div class="container">
    <?php if(isset($skills[0]['skills_id'])){ ?>
        <table class="table table-striped table-responsive-md btn-table">
            <thead>
                <tr class="header">
                    <th>Skills</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($skills as $skill){?>
                <tr class="datatable">
                    <td class="skilltext text-light"><?=$skill['user_skills']?></td>
                    <td class="optionbutton">
                    <a href="<?php echo base_url()."users/deleteSkills/".$skill['skills_id'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>   
        </table>
    <?php }else{?>
		<!-- kapag walang nahanap na project -->
		<p>No skills listed!</p>
	<?php } ?>
    </div>
    

    
    
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>