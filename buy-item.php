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

$item_id = $_POST["item_id"];
$price = $_POST["price"];
$seller_id = $_POST["seller_id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipcode = $_POST["zipcode"];
$card_number = $_POST["card_number"];
$expiration_date = $_POST["expiration_date"];
$cvv = $_POST["cvv"];

session_start();
$buyer_id = $_SESSION["userinfo"]["user_id"];

//$sql = "INSERT INTO card_info
//VALUES ('$buyer_id','$first_name', '$last_name', $card_number,'$address','$city','$state',$zipcode,$expiration_date,$cvv);";

$sql = "INSERT INTO transaction (`buyer_id`,`seller_id`,`item_id`,`date`)
	VALUES ('$buyer_id', '$seller_id','$item_id','".date('Y-m-d')."');";

$sql .=  "UPDATE top_buyers set items_bought = items_bought+1, total_money_spent = total_money_spent+$price 
				WHERE user_id=$buyer_id;";

$sql .= "UPDATE top_sellers set items_sold = items_sold+1, total_money_made = total_money_made+$price 
					WHERE user_id=$seller_id;";


if (mysqli_multi_query($conn, $sql)) {
	echo "Sucessfull transaction! <br>";
	echo "buyer id = ".$buyer_id."<br>";
	echo "seller id = ".$seller_id. "<br>";
	echo "item id = ".$item_id. "<br>";
	echo "price = ".$price. "<br>";
	header("Location: http://plato.cs.virginia.edu/~bs5ht/dataproject/item-results.php");

}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>