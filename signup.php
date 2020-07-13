<?php

global $message;
global $user;
global $id;
$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");
if(isset ($_POST['sb'])) {
$user = $_POST['userid'];

$query = "SELECT username FROM users WHERE username = '$user'";
$conresult = mysqli_query($con, $query);
$con1 = mysqli_num_rows($conresult);
if ($con1 == 1) {
  $message = 'Username already exists';
} else {
  $type = 'regular';  
 $username = $_POST['userid'];
 $password = password_hash($_POST['psw'], PASSWORD_BCRYPT);
echo $password;
$query = "INSERT INTO users Values (?,?,?,?)";
$constmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($constmt, "isss", $id,$type,$username,$password);
mysqli_stmt_execute($constmt);
mysqli_close($con);
header('location:login.php');
}
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Sign-Up</title>
<link href="style.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
           <div id="header">
              <h1>Book Manager</h1>
              </div>
              <div id="navigation">
               <h2>Sign-Up</h2>
               </div>
<form action="signup.php" name="sign-up" method="post">
  <div class="container">
    <h3 id="sh3">Please fill in this form to create an account.</h3>
    <hr>
    <label class="sl" for="id"><b>User-ID</b></label>
    <input type="text" placeholder="Enter ID" name="userid" required>
<br>
<br>
    <label class="sl" for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
<br>
<br>
    <div class="clearfix">
      <button type="button" class="cancelbtn"><a href="login.php" style='color:inherit;'>Cancel</a></button>
      <button type="submit" class="signupbtn" name='sb'>Sign Up</button>
    </div>
    <hr>
 
  </div>
  <?php  echo $message; ?>
</form>
              <div id="footer">Copyright 2020, Book Manager</div>

</body>
</html>
