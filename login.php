<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - School of Computing and Information Technology</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> </head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        </div>
    </nav>
  </header>

  <main class="container">
    <section class="my-5">
      <h2 class="text-center mb-4">Login</h2>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="login_process.php" method="post" novalidate>
            <?php
              // Generate CSRF token (session must be started before)
              session_start();
              $_SESSION['csrf_token'] = base64_encode(random_bytes(32));
            ?>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="form-group">
              <label for="username" aria-label="Username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required aria-required="true">
              <div class="invalid-feedback">
                Please enter your username.
              </div>
            </div>
            <div class="form-group">
              <label for="password" aria-label="Password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required aria-required="true" autocomplete="off">
              <div class="invalid-feedback">
                Please enter your password.
              </div>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
              <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="text-center mt-3">
            <a href="reset_password.php">Forgot your password?</a>
          </div>
          <div class="alert alert-danger mt-3" role="alert" style="display: none;">
            Invalid login credentials.
          </div>
        </div>
      </div>
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
  <script>
    // Client-side validation (optional)
    var form = document.getElementById('myForm'); // Replace with actual form ID
    var username = document.getElementById('username');
    var password = document.getElementById('password');

    form.addEventListener('submit', function(event) {
      if (username.value === '' || password.value === '') {
        event.preventDefault();
        username.classList.add('is-invalid');
        password.classList.add('is-invalid');
      }
    });
  </script>
</body
