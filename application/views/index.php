<?php
    $this->load->view('elements/header');
?>

<?php
    #display ng body if successfully naka log-in
    if(isset($_SESSION["user_uid"])){
        echo "<p>Hello, ".$_SESSION["user_uid"]."</p>";
        echo "Ito ang index. Naka log-in ka";
    }
    #display ng body if hindi pa naka log-in
    else{
        echo 
        "<div class='try1'>
         <p>Ito ang index</p>
        </div>";
    }
?>

<?php
    $this->load->view('elements/footer');
?>

