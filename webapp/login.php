<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
require 'header.inc.php';

if (isset($_GET['error'])) {
    echo '<div class="row"><div class="alert alert-danger col-sm-offset-2 col-sm-6">Error Logging In!</div></div>';
}

?> 
        <form action="includes/process_login.php" method="post" name="login_form" class="form-horizontal">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type='text' name='email' id='email' class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-6">
                    <input type='password' name='password' id='password' class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="button" value="Login" class="btn btn-primary" onclick="formhash(this.form, this.form.password);">
                </div>
            </div>
        </form>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
<?php
require 'footer.inc.php';
?>