

<?php
function connectDatabase() {
    // TODO: Declare and initialize local variables
$host = 'localhost';      // localhost name of DB
$username = 'root';       // localhost user name
$password = '';  // password to access the DB
$database = 'lamda';   // create a database

// TODO: Create a connection to the database using mysqli_connect
$conn = mysqli_connect($host, $username, $password, $database);

//  TODO:    CHECK FOR CONNECTION
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//mysqli_close($conn);
return $conn;

}
?>

