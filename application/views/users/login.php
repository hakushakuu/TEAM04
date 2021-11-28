<?php
    $this->load->view('elements/header');
?>

<p>Ito ang login</p>

<div class="login-form">
    <form method="post">
        <input type="text" name="user_uid" placeholder="Username/Email"><br>
        <input type="password" name="user_pwd" placeholder="Password"><br>
        <button type="submit">Submit</button>
    </form>

</div>

<?php
    $this->load->view('elements/footer');
?>
