<?php
$servername = "localhost";
$username = "honey";
 

// Create connection
$conn = mysqli_connect($localhost, $honey, $root);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
