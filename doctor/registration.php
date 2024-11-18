<?php
// Start session and ensure the user is logged in
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit();
}

// Include database connection
include __DIR__ . '/../includes/db.php';

// Initialize variables
$doctorName = $specialization = $phoneNumber = $email = $address = $gender = $dob = $joiningDate = '';
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $doctorName = $_POST['doctorName'];
    $specialization = $_POST['specialization'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $joiningDate = $_POST['joiningDate'];

    // Validate fields
    if (empty($doctorName)) $errors[] = "Doctor's Name is required.";
    if (empty($specialization)) $errors[] = "Specialization is required.";
    if (empty($phoneNumber)) $errors[] = "Phone Number is required.";
    if (empty($email)) $errors[] = "Email Address is required.";
    if (empty($address)) $errors[] = "Address is required.";
    if (empty($gender)) $errors[] = "Gender is required.";
    if (empty($dob)) $errors[] = "Date of Birth is required.";
    if (empty($joiningDate)) $errors[] = "Joining Date is required.";

    // If no errors, proceed with insertion
    if (empty($errors)) {
        $sql = "INSERT INTO doctors (doctorName, specialization, phoneNumber, email, address, gender, dob, joiningDate)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$doctorName, $specialization, $phoneNumber, $email, $address, $gender, $dob, $joiningDate]);
        
        // Redirect to the doctor listing page
        header("Location: viewDoctors.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
</head>
<body>

    <!-- Include Navbar -->
    <?php include __DIR__ . '/../includes/navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Doctor Registration</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display error messages if any -->
                        <?php if (!empty($errors)) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error) { echo "<li>$error</li>"; } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <!-- Registration Form -->
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label for="doctorName">Doctor's Name</label>
                                <input type="text" class="form-control" id="doctorName" name="doctorName" value="<?php echo $doctorName; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="specialization">Specialization</label>
                                <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $specialization; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="joiningDate">Joining Date</label>
                                <input type="date" class="form-control" id="joiningDate" name="joiningDate" value="<?php echo $joiningDate; ?>" required>
                            </div>
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success btn-lg">Register Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
