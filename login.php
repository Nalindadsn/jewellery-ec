<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/nav.css" />

  </head>
  <body>
    <div class="login-wrapper">
      <!-- welcome Section -->
      <div class="welcome-section">
        <div class="image-section">
          <img src="images/login 3.jpg" alt="Login Image" />
        </div>
      </div>

      <!-- Login Form Section -->
      <div class="login-container">
        <h2>Login</h2>
        <form action="dashboard.php" method="POST">
          <label for="email">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
          />

          <label for="password">Password:</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
          />

          <button type="submit">Login</button>
        </form>
        <br />
        <p class="register-link">
          Don't have an account?
          <a href="register.php">Register here</a>
        </p>
      </div>
    </div>
  </body>
</html>
