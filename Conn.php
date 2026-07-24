<?php
$conn = mysqli_connect("localhost", "root", null, "chandan_db");
  if(! $conn)
    die("Database connection error : ".mysqli_connect_error());
?>