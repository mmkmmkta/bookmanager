<?php
session_start();

if (!isset($_SESSION["loggedin"])){
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Manager</title>
<link href="style.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
           <div id="header">
              <h1>Book Manager</h1>
              </div>
              <div id="navigation">
               <h2>Menu</h2>
                <ul>
                  <li><a href="index.php">Home</a></li>
                    <li><a href="booklist.php" >Book List</a></li>
                     <li><a href="contactus.php">Contact US</a></li>
                     <li><a href="signout.php">Sign-Out</a></li>
                
                </ul>
            </div>
            <h2 id="welcome">Welcome to Book Manager</h2>
              <div id="footer">Copyright 2020, Book Manager</div>

</body>
</html>
