<?php
$servername = "localhost:4406";
$username = "root";
$password = "";
$dbname = "numberEntry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, entryDate, mOpenOP,mOpenPN FROM pNumberN";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["entryDate"]. " -Open Pana" . $row["mOpenOP"]. " -Pass No." . $row["mOpenPN"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
