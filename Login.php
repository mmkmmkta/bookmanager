<?php
session_start();
global $message;
global $username;
global $password;
global $usern;

$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");

if(isset($_POST['user']) && isset($_POST['pass'])) {
  $usern = $_POST['user'];

$query = "SELECT * FROM users WHERE username = '$usern' ";
$conres = mysqli_query($con, $query);
$con1 = mysqli_num_rows($conres);
if ($con1 == 1) {


$row = mysqli_fetch_assoc($conres);
$id = $row ['id'];
$type = $row['type']; 
$username = $row['username'];
$password = $row['password']; 


if (password_verify ($_POST['pass'],$password)){

                    if ($type == 'regular'){
                                 
      $_SESSION['loggedin'] = $id;
        header('location: index.php');
                  } else {
                    
                    $_SESSION['loggedin'] = $id;
                     header('location: indexadmin.php');
                  }
                  
         
           }else {
            $message = 'Authentication Failed';
                        }
                      }else {
                        $message = 'Authentication Failed';
                                    }
                      }

                      
                                    
        

?>
<!DOCTYPE html>
<html>
<head>
<title>Sign-in</title>
<link href="style.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
           <div id="header">
              <h1>Book Manager</h1>
              </div>
              <div id="navigation"> 
<h2>Please Sign-in</h2>
<br>
<form name="Sign-in" action="login.php" method="post">
<label>Username</label>
<input type="text" name='user' size="13">
<br>
<br>
<br>
<label>Password</label>
<input type="password" name='pass' size="13" required>
<br>
<br>
<br>
<input class="log"  type="submit" value="Sign-in" required>
</form>
<br>
<button class="b"><a href="signup.php" class="su" href=" ">Sign-Up</a></button>
<br>
<br>
<br>
<?php global $message;
echo $message;
?>
            </div>
              <div id="footer">Copyright 2020, Book Manager</div>
           

</body>
</html>
