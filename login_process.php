<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Include database connection
  include 'db.php';

  // CSRF Token Validation (Improvement)
  if (empty($_POST['csrf_token']) || !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    echo "Invalid CSRF token";
    exit;
  }

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $remember_me = isset($_POST['remember_me']);  // Check if checkbox is checked

  // Basic input validation
  if (empty($username) || empty($password)) {
    echo "Username or Password is empty";
    exit;
  }

  // Prepare and execute the query
  $conn = connect();; // Assuming 'connect' function is defined in db.php

  $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed_password, $role);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['role'] = $role;

      // Remember Me Functionality (Improvement)
      if ($remember_me) {
        $selector = base64_encode(random_bytes(16));
        $validator = base64_encode(random_bytes(32));

        // Hash the validator for security
        $hashed_validator = password_hash($validator, PASSWORD_DEFAULT);

        // Insert data into a separate "remember_me" table (replace with your table structure)
        $stmt = $conn->prepare("INSERT INTO remember_me (user_id, selector, validator, expires) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $id, $selector, $hashed_validator); 
        $stmt->execute();

        // Create a cookie with selector and hashed validator
        setcookie(
          "remember_me",
          $selector . ':' . $validator,
          time() + 60 * 60 * 24 * 7, // Expires in a week
          "/",
          "",
          true, // HttpOnly flag
          true  // Secure flag
        );
      }

      header("Location: dashboard.php"); // Redirect to a protected page
      exit;
    } else {
      echo "Invalid password";
    }
  } else {
    echo "No user found with that username";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid request method";
}
