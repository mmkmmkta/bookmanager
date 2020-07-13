<?php
session_start();

if (!isset($_SESSION["loggedin"])){
  header('location: login.php');
} 

$identification = $_SESSION['loggedin'];
$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");
$query = "SELECT * FROM users WHERE id = '$identification'";
$conr1 = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($conr1);
$tp = $row['type'];


$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");
$query = "SELECT * FROM booklist";
$conr2 = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($conr2)){
   $id = $row['id'];
}

if (isset($_POST['post_b'])){
$type = $tp;
$idusers = $identification;  
$id = $id +1;
$title = $_POST['title'];
$author = $_POST['author(s)'];
$year = $_POST['year'];
$language = $_POST['language'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];

$query = "INSERT INTO booklist Values (?,?,?,?,?,?,?,?,?)";
$constmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($constmt, "siissisii",$type,$idusers, $id,$title, $author, $year, $language, $edition, $pages);
mysqli_stmt_execute($constmt);
mysqli_close($con);
header('location: booklist.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add to book list</title>
<link href="style.css" media="all" rel="stylesheet" type="text/css">
<link href="addpagestyle.css" media="all" rel="stylesheet" type="text/css">
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
<form name="addbook"  action="addpage.php" method="post">
<fieldset>
  <legend>Add a new book to the list</legend>
  <br>
<label>Title</label>
<input type="text"  name="title" required>
<label>Author(s)</label>
<input type="text"  name="author(s)" required>
<label>Publication Year</label>
<input type="text"  name="year" required>
<label>Language</label>
<input type="text"  name="language" required>
<label>Edition</label>
<input type="text"  name="edition" required>
<label>Pages</label>
<input type="text"  name="pages" required>
<input type="submit" value="Submit" name="post_b">
</fieldset>
</form>

              <div id="footer">Copyright 2020, Book Manager</div>

</body>
</html>
