<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="top.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="bottom.css">
    <link rel="stylesheet" href="locations.css">
    <link rel="stylesheet" href="register.css">
    <style>
        .error {
            color: red;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
   
  <div class="header">
    <div class="header-div">
      <div class="header-logo">
          <img class="logo" src="calories.png">
      </div>
      
      <div class="header-options">
          <a class="home" href="index.html">home</a>
          <a class="login" href="login.html">login</a>
          <a class="register" href="register.php">register</a>
          <a class="contact-us" href="contactus.html">contact us</a>
          <a class="calories" href="#">calories</a>
          

      </div>
      
      <div class="profile">
          <button id="profile-button">
              <img class="profile-image" src="/train booking/images/user.png">
          </button>
      </div>     
    </div>   
  </div>  


<!-- Form -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                
                <div class="card-body">
                    <form id="signupForm" method="post" action="signup_process.php">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"required>
                            <span class="error" id="usernameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <span class="error" id="emailError"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <span class="error" id="passwordError"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                            <span class="error" id="confirmPasswordError"></span>
                        </div>
                        <div class="form-group">
                            <label for="height">Height (in cm):</label>
                            <input type="number" class="form-control" id="height" name="height" placeholder="Height (in cm): " required>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight (in kg):</label>
                            <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight (in kg):" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Age:" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <p>&copy; 2024 Your Website. All Rights Reserved.</p>
    </div>
</footer>

<script>
    // Client-side validation
    document.getElementById("signupForm").addEventListener("submit", function(event) {
        var isValid = true;

        // Validate username
        var username = document.getElementById("username").value;
        if (!username.match(/^[a-zA-Z0-9_]+$/)) {
            document.getElementById("usernameError").innerText = "Username must contain only letters, numbers, and underscores.";
            isValid = false;
        } else {
            document.getElementById("usernameError").innerText = "";
        }

        // Validate email
        var email = document.getElementById("email").value;
        if (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
            document.getElementById("emailError").innerText = "Invalid email address.";
            isValid = false;
        } else {
            document.getElementById("emailError").innerText = "";
        }

        // Validate password
        var password = document.getElementById("password").value;
        if (password.length < 8) {
            document.getElementById("passwordError").innerText = "Password must be at least 8 characters long.";
            isValid = false;
        } else {
            document.getElementById("passwordError").innerText = "";
        }

        // Validate confirm password
        var confirmPassword = document.getElementById("confirmPassword").value;
        if (confirmPassword !== password) {
            document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
            isValid = false;
        } else {
            document.getElementById("confirmPasswordError").innerText = "";
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>
