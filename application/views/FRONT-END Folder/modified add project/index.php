<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - FOLIO | ADD PROJECT</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/addproject/ee.png">

  	<!------- CSS ------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>assets/css/addproject/style.css"></link>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
	
	<!------- NAVBAR ------->
	<header>
	<?php $this->load->view('elements/navbar');?>

    <section class="Form my-4 mx-5 w-50 mx-auto text-center" id="addprojectcontainer">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-8 px-3 pt-3 mx-auto">
					<h1 class="font-weight-bold py-2">
						<img src="<?php echo base_url(); ?>assets/img/addproject/ee.png" width="50" height="50" class="d-inline-block align-top" alt=""> E-FOLIO
					</h1>
					<h3>Add a Project</h3>
                    <form method="POST">
                        <div class="form-control">
                            <label for="title" id="label-title">
                                Project Title
                            </label>
                 
                            <input type="text" id="title" name="project_title"
                                placeholder="Enter Project Title" required>
                        </div>

                        <div class="form-control">
                            <label for="file" id="label-file">
                                Select File to Upload
                            </label>

                            <input type="file" id="file">
                        </div>
                  
                        <div class="form-control">
                            <label for="description">
                                Project Description</label>
                            
                            <textarea placeholder="Enter description here.." required name="project_details"></textarea>
                        </div>
                        
                        <button type="button" class="button"><a href="<?php echo base_url()."project/".$_SESSION['user_id']?>">Cancel</a></button>
                        <button type="submit" class="button">Submit</button>
                    </form>              
        </div>
            </div>
                </div>
    </section>

</header>
<!------- FOOTER ------->
<?php
        $this->load->view('elements/footer');
    ?>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
