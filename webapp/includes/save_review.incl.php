<?php
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();
$logged_in=login_check($mysqli);
if ($logged_in) {
    if ($insert_stmt = $mysqli->prepare("INSERT INTO `reviews` (`user_id`, `product_id`, `time`, `text`) VALUES ((SELECT id from members where username=?),?,?,?);")) {
        $insert_stmt->bind_param('siis', $_SESSION["username"], $_POST["id"], time(), $_POST["input"]);
        // Execute the prepared query.
        $insert_stmt->execute();
    }
} else {
    echo "NOPEEEEE";
}
header('Location: ./../product.php?id='.$_POST["id"]);
?>