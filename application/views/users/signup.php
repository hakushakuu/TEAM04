<?php
    $this->load->view('elements/header');
?>

<p>Ito ang signup</p>

<div class="signup-form">
    <form  method="post">
        <input type="text" name="user_firstName" placeholder="First Name..."required><br>
        <input type="text" name="user_lastName" placeholder="Last Name..."required><br>
        <input type="email" name="user_email" placeholder="Email..."required><br>
        <input type="text" name="user_uid" placeholder="Username..."required><br>
        <input type="password" name="user_pwd" placeholder="Password..."required><br>
        <input type="password" name="user_pwdRepeat" placeholder="Repeat Password..."required><br>
        <select name="user_type" required>
        <option hidden disabled selected value  > -- select an option -- </option>
        <option>User</option>
        <option>Client</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>

<?php
    $this->load->view('elements/footer');
?>