<!-- Bradley Deku -->


<?php
// Start the session
session_start();
require __DIR__."/database_credentials.php";


//Create Connection
$conn = new mysqli(servername,username,password,dbname);

if($conn->connect_error) {
  die("Connection failed: ".$conn->connect_error);
  echo "Connection Failed.";
}

else {
  echo "";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Search Forms</title>
</head>

<body>
  <form method="POST">
    <h2>BYTESearch 1</h2>

    <?php
    $search1Value = (isset($_POST['search1']))
     ? htmlentities($_POST['search1']) : '';
     $_SESSION['search']=$search1Value;
   ?>

    <div>
      <input type="text" placeholder="Enter Search Item" name="search1" value="<?= $search1Value ?>">

    </div>
    <button type="submit" value="search">Submit</button>
  </form>
  <br>
  <br>
  <br>

  <h2>BYTESearch 2</h2>

  <form method="POST">
    <div>
      <input type="text" placeholder="Enter Search Item" name="search2">
    </div>
    <button type="submit" value="search">Submit</button>
  </form>

  <br>
  <br>
  <br>

  <h2>Table Details</h2>

  <table border="2">
    <tr>
      <td>Search Term</td>

      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php

  // Using database connection file here
  //include "database_connection.php";


  if(isset($_POST['search1'])){

    $user_search = $_POST['search1'];

  //Display all records from Database and Fetching Data from database
  $sql = "SELECT * FROM practical_lab_table where Search_term='$user_search' " ;// fetch data from database
  $searchResult = $conn->query($sql);

  if ($searchResult -> num_rows > 0){

  while ($row = $searchResult->fetch_assoc()){
  ?>
    <tr>
      <td> <?php echo $row['Search_term']; ?></td>
             <!-- Edit button -->
      <td><form method="POST" action="edit_form.php">

    <input type="submit" name="edit" value="Edit">
  </form></td>

         <!-- Delete button -->
      <td><form method="POST" action="delete.php">

    <input type="submit" name="delete" value="Delete">
  </form></td>

    </tr>
  <?php
  }

  }
  else
    {
      echo "0 search results found";
    }
  }


  ?>












</body>

</html>
