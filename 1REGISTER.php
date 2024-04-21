<?php
include 'config.php';

if(isset($_POST['register'])){
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $age = mysqli_real_escape_string($connection, $_POST['age']);
  $height = mysqli_real_escape_string($connection, $_POST['height']);
  $weight = mysqli_real_escape_string($connection, $_POST['weight']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
  $gender = mysqli_real_escape_string($connection, $_POST['gender']); // Add this line to define $gender

  if($password === $confirm_password){
    if(!empty($username) && !empty($email) && !empty($age) && !empty($height) && !empty($weight) && !empty($confirm_password)){
      $select = mysqli_query($connection, "SELECT * FROM `user` WHERE email='$email'") or die(mysqli_error($connection));
            
      if(mysqli_num_rows($select) > 0) {
          $message[] = 'User already exists';
      } else {
        $insert=mysqli_query($connection,"INSERT INTO `user` (`username`, `password`, `email`, `height`, `weight`, `gender`, `age`) VALUES ('$username', '$password', '$email', '$height', '$weight', '$gender', '$age')") or die(mysqli_error($connection));

        if($insert){
          $message[]='Registered successfully';

          //header("Location:Mini_project/dashboard.php");
          exit;
        } else {
          $message[]= 'Failed to register';
        }
      } 
    } else {
      $message[]= 'All fields are required';
    }
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="top.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="bottom.css">
    <link rel="stylesheet" href="locations.css">
    <link rel="stylesheet" href="register.css">

</head>
<body>
<div class="header">
    <div class="header-div">
      <div class="header-logo">
          <img class="logo" src="calories.png">
      </div>
      
      <div class="header-options">
          <a class="home" href="#">HOME</a>
          <a class="login" href="#">LOGIN</a>
          <a class="register" href="#">REGISTER</a>
          <a class="contact-us" href="http://localhost/MP/contactus.html  ">CONTACT US</a>
          <a class="calories" href="#">CALORIES</a>
          

      </div>

      <div class="profile">
          <button id="profile-button">
              <img class="profile-image" src="user.png">
          </button>
      </div>     
    </div>   
  </div>  


  <div class="register-box-container">
    <div class="register-container">
        <div class="box-container">
            <img class="train-png" src="/train booking/images/trainpng.png">
            <img class="train-png2" src="/train booking/images/trainpng.png">
            <p class="register-text">REGISTER</p>

            <form class="email-pass" method="post" action="#" enctype="multipart/form-data">

            <?php
                if(isset($message)){
                    foreach($message as $already){
                        echo '<div class="message">'.$already.'</div>';
                    }
                    
                }
                
                
            ?>

            <input type="text" id="username" name="username"placeholder="Username"requied>
            <input type="email" id="email" name="email" placeholder="Email id" required oninvalid="this.setCustomValidity('enter valid email id')" oninput="this.setCustomValidity('')" >
            <input type="number" id="height" name="height"placeholder="Height in cm"requied>
            <input type="number" id="age" name="age"placeholder="Age"requied>
            <input type="number" id="weight" name="weight"placeholder="Weight in kg"requied>
            <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
        </select>
        <input type="password" id="password" name="password" placeholder="Password" required minlength="8"oninvalid="this.setCustomValidity('min 8 characters')"oninput="this.setCustomValidity('')">
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required oninput="check()">
            
            <button type="submit"  name="register" id="register-button">REGISTER</button>
        </form>
    </div>
</div>
</div>

<div class="footer-container">
    <div class=footer-links>
      <a id="about-us" href="#">HOME</a>
      <a id="features" href="#">CALORIES</a>
      <a id="sdgs" href="#">LOG IN</a>
      <a id="contact-us" href="#">CONTACT US</a>
      
    </div>
    <div class="copyright-credit">
      <p>&copy;2024 sujal,sanskar,hardik /mentor: bharthi maam</p>

    </div>
  

  </div>  
  <script>
    function check()
    {
      var pass=document.getElementById('confirm-password');
      if(pass.value !=document.getElementById('password').value)
      {
        pass.setCustomValidity("passwords must match")
      }
      else
      {
        pass.setCustomValidity("")
      }
    }
  </script>



</body>
</html>
