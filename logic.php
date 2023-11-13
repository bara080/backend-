<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//  PROJECT NAME :lost and found item
//  backend design by: Bara Ahmad Mohammed and Li
//
//  This is controller form , which checks for users input form validation
//
//
//
//
//  @param uid returns username
//  @param password returns users' password
//  @param repeat_pass returns users' password
//  @param email returns users' email
//
//
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////

$page_title = "The logic";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the files go here
include "login.php";

include "databaseFunctions.php";


// function insert
if (isset($_POST["submit"])) {
    // check for empty input
    if ($_POST["email"] == "" || $_POST["password"] == "" || $_POST["username"] == "") {
        echo "Some inputs are empty";
    } else {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $username = $_POST["username"];

        $conn = connectDatabase();
        createUser($conn, "", $email, $pass, $username);
        //displayInput($conn);
        mysqli_close($conn); // Close the connection when done
    }
}



?>
