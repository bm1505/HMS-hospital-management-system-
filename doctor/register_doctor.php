<?php
// Assuming we have a database connection here
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctorName = $_POST['doctorName'];
    $specialty = $_POST['specialty'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    
    // Form validation: Check if all fields are filled
    if (empty($doctorName) || empty($specialty) || empty($contactNumber) || empty($email) || empty($qualification) || empty($address)) {
        $error = "All fields are required!";
    } else {
        // Insert into database
        $sql = "INSERT INTO doctors (doctorName, specialty, contactNumber, email, qualification, address) 
                VALUES ('$doctorName', '$specialty', '$contactNumber', '$email', '$qualification', '$address')";
        
        if (mysqli_query($conn, $sql)) {
            $success = "Doctor Registered Successfully!";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <h4 class="navbar-text mx-auto" style="font-weight: bold; color: white;">
                Doctor Module - Register Doctor
            </h4>
        </div>
    </nav>

    <!-- Doctor Registration Form -->
    <div class="container mt-5">
        <h2>Register a New Doctor</h2>
        <?php if (isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="doctorName">Doctor Name</label>
                <input type="text" class="form-control" id="doctorName" name="doctorName" required>
            </div>

            <div class="form-group">
                <label for="specialty">Specialty</label>
                <input type="text" class="form-control" id="specialty" name="specialty" required>
            </div>

            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="qualification">Qualification</label>
                <input type="text" class="form-control" id="qualification" name="qualification" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <!-- Buttons for registering and going back -->
            <button type="submit" class="btn btn-primary">Register Doctor</button>
            <a href="javascript:history.back()" class="btn btn-secondary ml-3">Go Back</a>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Hospital Management System</p>
    </footer>

    <!-- Optional JavaScript for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
