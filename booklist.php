<?php
session_start();

if (!isset($_SESSION["loggedin"])){
  header('location: login.php');
} 
?>


<!DOCTYPE html>
<html>
<head>
<title>Book List</title>
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
            <table>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Author(s)</th>
        <th>Publication Year</th>
        <th>Language</th>
        <th>Edition</th>
        <th>Pages</th>
</tr>

<?php 

$identification = $_SESSION['loggedin'];

$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");
$query = "SELECT * FROM users WHERE id ='$identification'";
$conresult = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($conresult);
$type = $row['type'];




if ($type == 'admin') {
$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");

$query = "SELECT * FROM booklist";
$conresult = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($conresult)){

  $no = $row['id'];
  $title = $row ['title'];
  $author = $row['author(s)'];
  $year = $row['year'];
  $language = $row['language'];
  $edition = $row['edition'];
  $pages = $row['pages'];


    echo "<tr>
    <td>$no</td>
    <td> $title</td>
    <td>$author</td>
    <td>$year</td>
    <td>$language</td>
    <td>$edition</td>
    <td>$pages</td>
    <tr>";
}
} else {
  $con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
  die ("Sorry, something went wrong with the connection");
  $query = "SELECT * FROM booklist WHERE idusers='$identification' AND type = 'regular'";
  $conresult = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($conresult)){

    $no = $row['id'];
    $title = $row ['title'];
    $author = $row['author(s)'];
    $year = $row['year'];
    $language = $row['language'];
    $edition = $row['edition'];
    $pages = $row['pages'];
  
  
      echo "<tr>
      <td>$no</td>
      <td> $title</td>
      <td>$author</td>
      <td>$year</td>
      <td>$language</td>
      <td>$edition</td>
      <td>$pages</td>
      <tr>";
  }
}
?>
</table>
<button class="bb1"><a href="addpage.php">+Add</a></button>
<button class="bb2"><a href="deletepage.php">Delete</a></button>

              <div id="footer">Copyright 2020, Book Manager</div>

</body>
</html>
