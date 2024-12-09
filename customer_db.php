<?php
// Database configuration
include "config.php";
// Retrieve form data
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $patient_status = $_POST['patient_status'];
    $patient_name = $_POST['patient_name'] ?? null; // Use null coalescing in case the field is empty
    $relationship = $_POST['relationship'];
    $full_name = $_POST['full_name'];
    $emergency_contact_number = $_POST['emergency_contact_number'];
    $date_of_joining = $_POST['date_of_joining'];
    $blood_group = $_POST['blood_group'];
    $medical_conditions = $_POST['medical_conditions'];
    $email = $_POST['email'];
    $patient_age = $_POST['patient_age'];
    $gender = $_POST['gender'];
    $care_requirements = $_POST['care_requirements'];
  
  
    $mobility_status = $_POST['mobility_status'];
    $address = $_POST['address'];

    // File Uploads (if any)
    $care_aadhar = $_FILES['care_aadhar']['name'];
    $discharge = $_FILES['discharge']['name'];

    // Move uploaded files to the server (you may need to adjust the folder path)
    move_uploaded_file($_FILES['care_aadhar']['tmp_name'], 'uploads/' . $care_aadhar);
    move_uploaded_file($_FILES['discharge']['tmp_name'], 'uploads/' . $discharge);

    // SQL Query to Insert Data into customer_master table
    $sql = "INSERT INTO customer_master (patient_status, patient_name, relationship, full_name, emergency_contact_number, date_of_joining, blood_group, medical_conditions, email, patient_age, gender, care_requirements,  mobility_status, address, care_aadhar, discharge)
            VALUES ('$patient_status', '$patient_name', '$relationship', '$full_name', '$emergency_contact_number', '$date_of_joining', '$blood_group', '$medical_conditions', '$email', '$patient_age', '$gender', '$care_requirements',  '$mobility_status', '$address', '$care_aadhar', '$discharge')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>