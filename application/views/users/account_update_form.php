<?php
    $this->load->view('elements/header');
?>

<p>Ito ang update</p>

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

<?php
    $this->load->view('elements/footer');
?>