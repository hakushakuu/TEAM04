<?php
    $this->load->view('elements/header');
?>

<?php
    $id = $_SESSION['user_id'];
    echo $_SESSION['user_uid'].">Account Settings"
?>
    <div>
        <button type='button'><a href='<?php echo base_url()."index.php/users/account_update_form"?>'>Update</a></button>
        <button type='button'><a href='<?php echo base_url()."index.php/users/account_delete_confirm"?>'>Delete</a></button>
    </div>

<?php
    $this->load->view('elements/footer');
?>
