<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

/**
 *	Login page. The includes are especially dangerous as they allow anyone to map out the application easily.
 *
 */

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FancyShop: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
		<!-- Notice the reference to the scripts embedded within the page: a rather misleading hint for a hacker
			 since the scripts aren't vulnerable. -->
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form"> 			
            Email: <input type="text" name="email" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p><br>
		<a href="protected_page.php">Main page.</a>
    </body>
</html>