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
?>
<a href="http://plato.cs.virginia.edu/~bs5ht/dataproject/create-item-form.php">Create Item to Sell</a>
<form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <input type="text" name="name">
   <input type="submit" name="submit" value="Search"> 
</form>
<br><br>

<?php
$item_name=$_GET["name"];

$sql = "SELECT * FROM items WHERE name LIKE '%$item_name%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        //print_r($row);
        echo '<div style="width:500px;height:100px;border:1px solid #000;">';
        echo "<table>";
        echo "<tr>";
        echo "<td><b>Item Name:</b> ".$row["name"]. "</td>";
        echo "<td><b>Price:</b> ". $row["price"]. "</td>";
        echo "<td><a href=http://plato.cs.virginia.edu/~bs5ht/dataproject/buy-item-form.php?item_id=".$row["item_id"].">Buy Item</a> </td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Description: <br>". $row["description"]."</td>";
        echo "</tr>";
        //print_r($_SESSION);
        echo "</table>";
        echo "</div>";
    }
    
} else {
    echo "0 results found";
}
