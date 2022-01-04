<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - FOLIO | RESUME</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/bahaypahina/ee.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/viewuser/resume-css.css">
</head>
<body>
    <?php $full_name = $user['user_firstName']." ".$user['user_lastName']; ?>
    <?php
        define(date("Y"), "Present");
        define("Associate", "A in ");
        define("Bachelor", "BS in ");
        define("Master", "MS in ");
        define("Doctor", "PhD in ");
    ?>
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="resume">
       <div class="resume_left">
         <div class="resume_profile">
           <!-- <img src="https://i.imgur.com/eCijVBe.png" alt="profile_pic"> -->
           <img src="<?php echo ($user['user_pic']===NULL)? base_url()."assets/img/temp/Portrait_Placeholder.png" : $user['user_pic'] ?>" alt="profile_pic">
         </div>
         <div class="resume_content">
           <div class="resume_item resume_info">
             <div class="title">
               <p class="bold"><?php echo $full_name ?></p>
             </div>
             <ul>
               <li>
                 <div class="icon">
                   <i class="fas fa-map-signs"></i>
                 </div>
                 <div class="data">
                 <?php echo $user['user_address']; ?>
                 </div>
               </li>
               <li>
                 <div class="icon">
                   <i class="fas fa-mobile-alt"></i>
                 </div>
                 <div class="data">
                   <?php echo $user['user_number'] ?>
                 </div>
               </li>
               <li>
                 <div class="icon">
                   <i class="fas fa-envelope"></i>
                 </div>
                 <div class="data">
                 <?php echo $user['user_email']; ?>
                 </div>
               </li>
             </ul>
           </div>
           <?php if(isset($skills[0])){ ?>
           <div class="resume_item resume_skills">
             <div class="title">
               <p class="bold">skills</p>
             </div>
             <ul class="skills">
               <?php foreach ($skills as $skill){?>
                <li>
                 <div class="skill_name">
                   <?php echo($skill['user_skills']); ?>
                 </div>
               </li>
               <?php } ?>
               
           </div>
           <?php } ?>
           
         </div>
      </div>
      <div class="resume_right">
        <div class="resume_item resume_about">
            <div class="title">
               <p class="bold">About Me</p>
             </div>
            <p><?php echo $user['user_bio'] ?></p>
        </div>
        <?php if(isset($employment[0])){ ?>
            <div class="resume_item resume_work">
            <div class="title">
               <p class="bold">Work Experience</p>
             </div>
            <ul>
                <?php foreach ($employment as $job){ ?>
                    <li>
                    <div class="date"><?php echo $job['employment_start']." - "?><?php echo (date("Y")===$job['employment_end'])? "Present":$job['employment_end']; ?></div> 
                    <div class="info">
                         <p class="semi-bold"><?php echo $job['employment_company']?></p> 
                      <p><?php echo $job['employment_position']?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        <?php if(isset($college[0])){ ?>
        <div class="resume_item resume_education">
          <div class="title">
               <p class="bold">Education</p>
             </div>
          <ul>
                <?php foreach ($college as $school){?>
                    <li>
                    <div class="date"><?php echo $school['college_date_start'] ?> - <?php echo (date("Y")===$school['college_date_end'])? "Present":$school['college_date_end'];?></div> 
                    <div class="info">
                         <p class="semi-bold"><?php echo constant($school['college_degree'])." ".$school['college_course'] ?> <br> (<?php echo $school['college_name'] ?>)</p> 
                    </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        
        </div>
      </div>
    </div>

</body>
</html>