<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: doctorRegistration.php");
    exit;
}


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "Dmedic";


$conn = new mysqli("$servername", "$username", "$password", "$dbname");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctorRegistrations WHERE approved = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Approve Doctors</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/doctorAdmin.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Doctor Registrations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>District</th>
                    <th>National ID</th>
                    <th>Registration Number</th>
                    <th>Doctor Type</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['title']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['district']}</td>
                            <td>{$row['national_id']}</td>
                            <td>{$row['registration_number']}</td>
                            <td>{$row['doctor_type']}</td>
                            <td>{$row['mobile_number']}</td>
                            <td>{$row['email']}</td>
                            <td>
                                <form action='doctorAdmindb.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' name='action' value='approve' class='btn btn-success'>Approve</button>
                                </form>
                                <form action='doctorAdmindb.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' name='action' value='reject' class='btn btn-danger'>Reject</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No pending registrations</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
