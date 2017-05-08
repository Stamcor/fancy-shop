<?php
include_once 'db_connect.php';
include_once 'db_config.php';
 
/**
 *	Register new user to DB script.
 *	WARNING: This script assumes the following tables exist:
 *				members ( id, username, email, password )
 *	id - int;	username - string;	email - string; password - string (hash)
 *
 *	TODO: more testing of the script and associated functions - might have a bug that lets only one user
 *	be added to the db.
 *	TODO: prevent script from being accessed externally
 */
 $error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<li>The email address you entered is not valid</li>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<li>Invalid password configuration.</li>';
    }
 
    // Username validity and password validity have been checked client side.
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<li>A user with this email address already exists.</li>';
                        $stmt->close();
        }
    } else {
        $error_msg .= '<li>Database error Line 39</li>';
                $stmt->close();
    }
 
    // check existing username
    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<li>A user with this username already exists</li>';
                        $stmt->close();
                }
        } else {
                $error_msg .= '<li>Database error line 55</li>';
                $stmt->close();
        }

 
    if (empty($error_msg)) {
 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $username, $email, $password);

            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
    $error_msg = '<div class="row"><div class="alert alert-danger col-sm-offset-2 col-sm-6"><ul>' . $error_msg . '</ul></div></div>';
}
?>