<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School of Computing and Information Technology</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS file -->
  <style>
    .jumbotron {
      background-image: url('Designer9.jpeg'); /* Replace 'Designer9.jpeg' with the path to your background image */
      background-size: cover;
      background-position: center;
      color: white; /* Adjust text color for better readability */
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="logo.png" alt="School Logo" style="height: 40px;"> <!-- Add your logo image here -->
        </a>
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

  <main>
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="display-4">Welcome to the School of Computing and Information Technology</h1>
        <p class="lead">Explore our academic programs, payment methods, and more.</p>
        <a href="apply.php" class="btn btn-primary">Apply Now</a>
      </div>
    </section>

    <section class="container mt-5">
      <h2>Current Activities</h2>
      <div class="activities">
        <?php
        include 'db.php';

        $sql = "SELECT title, description, date FROM activities";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='activity'>";
                echo "<h3>" . $row["title"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p><small>" . $row["date"] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No current activities available.</p>";
        }

        $conn->close();
        ?>
      </div>
    </section>

    <section class="container mt-5">
      <h2>Message from the Director</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt magna eu justo rhoncus tincidunt.</p>
      <!-- Add more specific content or quotes from the director here -->
    </section>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">© 2024 School of Computing and Information Technology. All rights reserved.</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
