<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli("$servername", "$username", "$password", "$dbname");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, first_name, last_name, dob, gender,district,national_id, registration_number, doctor_type,mobile_number,email FROM doctorRegistrations WHERE approved = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Approved Doctors</title>
  <style>
    .doctor-box {
        border: 2px solid green;
        padding: 10px;
        margin: 10px 0;
    }
  </style>
</head>
<body>




  <h1>Approved Doctors</h1>

  <?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo '<div class="doctor-box">';
          echo '<form action="approve_Doctor_Edit.php" method="post">';
          echo '<input type="hidden" name="doctor_id" value="' . $row["id"] . '">';
          echo '<p><strong>Doctor ID:</strong> ' . $row["id"] . '</p>';
          echo '<p><strong>Title:</strong> <input type="text" name="title" value="' . $row["title"] . '"></p>';
          echo '<p><strong>First Name:</strong> <input type="text" name="first_name" value="' . $row["first_name"] . '"></p>';
          echo '<p><strong>Last Name:</strong> <input type="text" name="last_name" value="' . $row["last_name"] . '"></p>';
          echo '<p><strong>DOB: </strong> <input type="text" name="dob" value="' . $row["dob"] . '"></p>';
          echo '<p><strong>Gender:</strong> <input type="text" name="gender" value="' . $row["gender"] . '"></p>';
          echo '<p><strong>District:</strong> <input type="text" name="district" value="' . $row["district"] . '"></p>';
          echo '<p><strong>National Id:</strong> <input type="text" name="national_id" value="' . $row["national_id"] . '"></p>';
          echo '<p><strong>Registration Number:</strong> <input type="text" name="registration_number" value="' . $row["registration_number"] . '"></p>';
          echo '<p><strong>Doctor Type:</strong> <input type="text" name="doctor_type" value="' . $row["doctor_type"] . '"></p>';
          echo '<p><strong>Mobile Number:</strong> <input type="text" name="mobile_number" value="' . $row["mobile_number"] . '"></p>';
          echo '<p><strong>Email:</strong> <input type="text" name="email" value="' . $row["email"] . '"></p>';
          echo '<button type="submit">Save Changes</button>';
          echo '</form>';
          echo '</div>';
      }
  } else {
      echo "No approved doctors found.";
  }
  $conn->close();


