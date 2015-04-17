<?php
$servername = "stardock.cs.virginia.edu";
$username = "cs4750bs5ht";
$password = "ricerice";
$dbname = "cs4750bs5ht";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email_address = $_POST["email_address"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE email_address = '$email_address' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	session_start();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " " . $row["email_address"]. "<br>";
        $_SESSION["userinfo"] = $row;
        //print_r($_SESSION["userinfo"]);
        header("Location: http://plato.cs.virginia.edu/~bs5ht/dataproject/item-results.php");
    }
} else {
    echo "The email or password you entered is incorrect.";
}
