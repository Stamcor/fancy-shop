<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
require 'header.inc.php';
?>
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" class="form-horizontal">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-6">
                    <input type='text' name='username' id='username' class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type='email' name='email' id='email' class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-6">
                    <input type='password' name='password' id='password' class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="confirmpwd" class="col-sm-2 control-label">Confirm password</label>
                <div class="col-sm-6">
                    <input type='password' name='confirmpwd' id='confirmpwd' class="form-control" placeholder="Confirm password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="button" value="Register" class="btn btn-primary" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);">
                </div>
            </div>
        </form>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
<?php
require 'footer.inc.php';
?>
