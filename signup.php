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
$name = $_POST["name"];
$email_address = $_POST["email_address"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipcode = $_POST["zipcode"];
$password = $_POST["password"];

$sql = "INSERT INTO user (`name`,`email_address`,`address`,`city`,`state`,`zipcode`,`password`,`seller_rating`,`role`)
VALUES ('$name', '$email_address','$address','$city','$state','$zipcode','$password',0,'seller')";

if (mysqli_query($conn, $sql)) {
    echo "You have sucessfully signed up with the email ". "'$email_address'" ."!";
    header("Location: http://plato.cs.virginia.edu/~bs5ht/dataproject/login-form.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

/*
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email_address;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $zipcode;
echo "<br>";
echo $password;
*/

?>