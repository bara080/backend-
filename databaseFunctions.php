<?php
include "databaseConfig.php";

function createUser($conn, $id, $name, $email, $pass) {

    $query = "INSERT INTO name (id, name, email, pass) VALUES (?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($statement, "isss", $id, $name, $email, $pass);

    // Execute the statement
    $result = mysqli_stmt_execute($statement);

    if (!$result) {
        // If the execution fails, handle the error
        echo "Error: " . mysqli_error($conn);
        die("Error: " . mysqli_error($conn));
    }

    // Close the statement
    mysqli_stmt_close($statement);
    //TODO: send user here
    header("location: ../index.php");
    exit();
}

function displayInput($conn) {
        // Display the inserted data
        $selectQuery = "SELECT * FROM name";
        $selectResult = mysqli_query($conn, $selectQuery);

        if ($selectResult) {
            echo "<h3>Data in the table:</h3>";
            while ($row = mysqli_fetch_assoc($selectResult)) {
                echo "User ID: " . $row['id'] . "<br>";
                echo "Name: " . $row['name'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Password: " . $row['pass'] . "<br>";
                echo "<hr>"; // Add a horizontal line for better separation
            }
        } else {
            echo "Error fetching inserted data: " . mysqli_error($conn);
        }
}

//.....check the code


function userExits($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR Email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../login.php?error=stmtFailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $username, $email);

    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }

    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}








function loginUser($conn, $username, $pass)
{
    $usernameExits = userExits($conn, $username, $username);



    if ($usernameExits == false)
    {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $passHashed = $usernameExits["pass"];
    $checkpass = password_verify($pass, $passHashed);

    if ($checkpass == false)
    {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    else if ($checkpass == true)
    {
        //  keep user the page
        session_start();

        $_SESSION["username"] = $usernameExits["username"];

        //from database
        $_SESSION["username"] = $usernameExits["username"];

        //  send user to main page
        header("location: ../index.php");
        exit();
    }

}


function passMatch($pass, $passRepeat)
{

    //pass match goes here
}















?>
