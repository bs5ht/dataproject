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
$description = $_POST["description"];
$price = $_POST["price"];

session_start();
$seller_id = $_SESSION["userinfo"]["user_id"];
//add SESSION to insert SELLER ID when creating ITEM (replace 88)
//print_r($_SESSION);

$sql = "INSERT INTO items (`name`,`description`,`price`,`seller_id`)
VALUES ('$name', '$description','$price','$seller_id')";

if (mysqli_query($conn, $sql)) {
	//print_r($_SESSION);
    echo "You have sucessfully created the item with the name ". "'$name'" ."!";
    header("Location: http://plato.cs.virginia.edu/~bs5ht/dataproject/item-results.php");

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