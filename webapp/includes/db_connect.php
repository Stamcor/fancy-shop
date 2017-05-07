<?php
/**
 *	DB connect script stub.
 *	TODO: add extra functionality if necessary
 *	TODO: add protection against unauthorized access of this file!
 */
 
include_once 'db_config.php';   // Needed because functions.php is not included

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}