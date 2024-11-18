<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" href="assets/images/hospital-logo.png" type="image/icon">
    <style>
        body {
            background-image: url('assets/images/hospital-background.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #c8e6c9;
            height: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .row.equal-height {
            display: flex;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Centered Title -->
            <h2 class="navbar-text mx-auto" style="font-weight: bold;">
            Hospital Management System
            </h2>
        </div>
    </nav>

    <div class="container">
        <header>
            <h1></h1>
            <p class="text-muted"></p>
        </header>
        <hr>
        <div class="row equal-height mt-5">
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Doctor Module</h5>
                        <p class="card-text">Add and manage doctor profiles, appointments, and schedules.</p>
                        <a href="doctor/doctor.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Pharmacy Module</h5>
                        <p class="card-text">Manage inventory, prescriptions, and billing records.</p>
                        <a href="pharmacy/pharmacy.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Laboratory Module</h5>
                        <p class="card-text">Handle lab tests, samples, and result reporting.</p>
                        <a href="laboratory/laboratory.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row equal-height mt-4">
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Patient Registration</h5>
                        <p class="card-text">Register new patients and manage check-ins and appointments.</p>
                        <a href="patient/patient.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Billing Module</h5>
                        <p class="card-text">Handle patient billing, insurance, and payment records.</p>
                        <a href="billing/billing.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card text-center w-100">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">Generate and download various hospital reports.</p>
                        <a href="reports/generate.php" class="btn btn-primary">Access</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="footer text-center bg-dark">
        <hr>
        <p style="color: white;"><strong>Hospital Management System | &copy; Copyright 2024. All Rights Reserved.</strong></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
