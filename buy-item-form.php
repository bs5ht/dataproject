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

$item_id=$_GET["item_id"];

$sql = "SELECT * FROM items WHERE item_id = $item_id";
$result = $conn->query($sql);
if ($result->num_rows == 1) {

	 while($row = $result->fetch_assoc()) {
        //print_r($row);
        echo "<table>";
        echo "<tr>";
        echo "<td><b>Item Name:</b> ".$row["name"]. "</td>";
        echo "<td><b>Price:</b> ". $row["price"]. "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Description: <br>". $row["description"]."</td>";
        echo "</tr>";
        echo "</table>";
        $price = $row["price"];
        $seller_id = $row["seller_id"];
    }
    echo "<br><br>";
    echo '
    <form method="post" action="buy-item.php"> 
      <input type="hidden" name="item_id" value='.$item_id.'>
      <input type="hidden" name="price" value='.$price.'>
      <input type="hidden" name="seller_id" value='.$seller_id.'>


	   First Name: <input type="text" name="first_name">
	   <br><br>
	   Last Name: <input type="text" name="last_name">
	   <br><br>
	   Address: <textarea name="address" rows="1" cols="50"></textarea>
	  <br><br>
	   City: <input type="text" name="city">
	  <br><br>
	   State: <input type="text" name="state">
	  <br><br>
	   Zipcode: <input type="number" name="zipcode">
	   <br><br>
	   	Card Number: <input type="number" name="card_number">
	   <br><br>
	   	Expiration Date: <input type="month" name="expiration_date">
	   <br><br>
	    CVV: <input type="number" name="cvv">
	    <br><br>
	   <input type="submit" name="submit" value="Submit"> 
	</form>';
    
} else {
    echo "item was not found!";
}