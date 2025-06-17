<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css" />
  </head>
  <body>
    <div class="login-wrapper">
      <!-- welcome Section -->
      <div class="welcome-section">
        <div class="image-section">
          <img src="images/reg 1.jpg" alt="Login Image" />
        </div>
      </div>

      <!-- Login Form Section -->
      <div class="login-container">
        <h2>Sign In</h2>
        <form action="dashboard.php" method="POST">
          <label for="name">Full Name</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your full name"
            required
          />

          <label for="email">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
          />

          <label for="tp">TP-Number</label>
          <input
            type="text"
            id="tp"
            name="tp"
            placeholder="Enter your TP-Number"
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

          <button type="submit">Resister</button>
        </form>
        <br />
        <p class="Login">
          Already have an account? <a href="login.php">Login here</a>
        </p>
      </div>
    </div>
  </body>
</html>
