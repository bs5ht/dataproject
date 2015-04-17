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
    echo '
     <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      '
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
