<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login page</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">-->
  <link rel="stylesheet" href="style.css"> 
</head>
<body>
<section class='login' id='login'>
  <div class='head'>
  </div>
  <p class='msg'>Welcome</p>
  <div class='form'>
    <form action="crud/inven.php" method= "post">
  <input type="text" placeholder='Username' class='text' id='username' name='username' required><br>
  <input type="password" placeholder='••••••••••••' class='password' name='password'><br>
  <button class="btn-login" type="submit" name="login">Login</button>
  <a href="#" class='forgot'>Forgot?</a>
    </form>
  </div>
</section>
  <!-- <script  src="script.js"></script> -->

</body>
</html>