<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Methods - School of Computing and Information Technology</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS file -->
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">School of Computing and Information Technology</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="academics.php">Academics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payment.php">Payment Methods</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="programmes.php">Programmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php">Staff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apply.php">Apply Now</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
    <section class="my-5">
      <h2 class="text-center mb-4">Payment Methods</h2>
      <div class="row">
        <?php
        include 'db.php';

        $sql = "SELECT method, description FROM payment_methods";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 mb-4'>";
                echo "<h3>" . htmlspecialchars($row["method"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No payment methods found.</p>";
        }

        $conn->close();
        ?>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3>Payment via M-Pesa</h3>
          <form id="mpesaPaymentForm">
            <div class="form-group">
              <label for="mpesaPhoneNumber">M-Pesa Phone Number</label>
              <input type="tel" class="form-control" id="mpesaPhoneNumber" placeholder="Enter your M-Pesa phone number" required>
            </div>
            <div class="form-group">
              <label for="admissionNumber">Admission Number</label>
              <input type="text" class="form-control" id="admissionNumber" placeholder="Enter your admission number" required>
            </div>
            <button type="button" onclick="initiateSTKPush()" class="btn btn-primary">Pay with M-Pesa</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">© 2024 School of Computing and Information Technology</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    function initiateSTKPush() {
      // Get phone number and admission number from form
      var mpesaPhoneNumber = document.getElementById('mpesaPhoneNumber').value;
      var admissionNumber = document.getElementById('admissionNumber').value;

      // Perform validation if needed

      // Initiate STK Push with the provided data
      // Example: Call backend API to initiate STK Push with mpesaPhoneNumber and admissionNumber

      // Simulated success message
      alert("STK Push initiated for M-Pesa phone number: " + mpesaPhoneNumber + "\nAdmission number: " + admissionNumber);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
