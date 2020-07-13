<?php
session_start();

if (!isset($_SESSION["loggedin"])){
  header('location: login.php');
}
?>


<?php
$identification = $_SESSION['loggedin'];
$con = mysqli_connect("localhost", "mmk", "73mHKz74", "bookmanager") or
die ("Sorry, something went wrong with the connection");

$query = "SELECT * FROM booklist WHERE idusers = '$identification'";
$conr = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($conr)){
  
    $id = $row['id'];

 if(isset($_POST['but_delete'])){
    
      if(isset($_POST['delete'])){

        if ($_POST['delete'] == $id) {
        
          $deleteBooks = "DELETE From booklist WHERE id = $id";
          $constmt =mysqli_query($con,$deleteBooks);
          mysqli_stmt_execute($constmt);
          header('location:booklist.php');
        }
      }
 } 
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete from book list</title>
<link href="style.css" media="all" rel="stylesheet" type="text/css">
<link href="deletepagestyle.css" media="all" rel="stylesheet" type="text/css">
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
            <div class='container'>
            <form method='POST' action=''>    
<table>
<tr>
  
        <th>Highlight to delete</th>
        <th>No</th>
        <th>Title</th>
       
</tr>

<?php 


$query = "SELECT * FROM booklist WHERE idusers = '$identification'";
$conresult = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($conresult)){
  
    $id = $row['id'];
    $title = $row ['title'];
   

?>
     <tr>
     
    <td id=\"nr\"><input  type='radio' name='delete' value='<?= $id ?>'></td>
    <td> <?=$id?></td>
    <td> <?=$title?></td>
    </tr>
<?php
}
?>


<input type='submit' value='Delete' name='but_delete'>
</table>
</form>
</div>




              <div id="footer">Copyright 2020, Book Manager</div>

</body>
</html>
