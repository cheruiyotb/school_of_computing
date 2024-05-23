<?php
include 'db.php'; // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data with enhanced validation
  $applicantName = trim(htmlspecialchars($_POST['applicantName'])); // Sanitize and trim name
  $applicantEmail = filter_var($_POST['applicantEmail'], FILTER_VALIDATE_EMAIL); // Validate email
  $programmeId = (int)$_POST['programme']; // Cast to integer for programme ID

  // Check for validation errors
  $errors = [];
  if (empty($applicantName)) {
    $errors[] = "Applicant name is required.";
  }
  if (!filter_var($applicantEmail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }
  if (empty($programmeId)) {
    $errors[] = "Please select a programme.";
  }

  // If no errors, proceed with submission
  if (empty($errors)) {
    try {
    
      // Prepare a secure statement using PDO
      $stmt = $conn->prepare("INSERT INTO applications (applicant_name, applicant_email, programme_id, status) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $applicantName, $applicantEmail, $programmeId );

      // Execute the statement
      if ($stmt->execute()) {
        // Success message and optional redirection
        echo "Application submitted successfully!";
        // header("Location: application_confirmation.php"); // Optional redirection
      } else {
        throw new Exception("Error: Application submission failed."); // Handle exceptions
      }

      $stmt->close();
    } catch (Exception $e) {
      // Display a more informative error message
      echo "Error: " . $e->getMessage();
    }
  } else {
    // Display validation errors
    echo "Validation errors:";
    foreach ($errors as $error) {
      echo "<br>$error";
    }
  }
}

$conn->close(); // Close database connection
