<?php

function connect() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "SchoolOfComputing";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

// Example usage (assuming this is included at the bottom of db.php)
// $conn = connect();

$conn = connect();