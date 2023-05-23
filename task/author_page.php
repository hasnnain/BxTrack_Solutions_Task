<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['author_name'])){
   header('location:login_form.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Author Panel</title>

    <style>
      body{background-color: #485461;
           background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
           text-transform: capitalize;
           color: #29d9d5;
         }
    </style>
  </head>
  <body>
      <h1 class="display-9" align="center">wellcome</h1>

      <h1 class="display-7" align="center"><span><?php echo $_SESSION['author_name'] ?></span></h1>

      <h1 class="display-9" align="center">Add New Book</h1>

      <form action="bookInsert.php" method="POST">
      <div class="row text-center">
  <div class="col">
    <input type="text" class="form-control" name="title" placeholder="Title" aria-label="Title">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="edition" placeholder="Edition" aria-label="Edition">
  </div>
  <div class="col">
    <input type="number" class="form-control" name="no_of_pages" placeholder="No. of Pages" aria-label="No. of Pages">
  </div>
  <div class="col">
    <input type="submit" class="btn" value="Add">
  </div>
</div>
      </form>

      <h1 class="display-9" align="center">Your Books List</h1>

      <?php
$q = "SELECT * FROM books WHERE author = '".$_SESSION['author_name']."'";
$rs = $conn->query($q);

if ($rs) {
    echo "<table class='table table-striped table-hover'>";
    echo "<th>Id</th>";
    echo "<th>Title</th>";
    echo "<th>Author</th>";
    echo "<th>Edition</th>";
    echo "<th>No. of Pages</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";

    while ($r = $rs->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$r["id"]."</td>";
        echo "<td>".$r["title"]."</td>";
        echo "<td>".$r["author"]."</td>";
        echo "<td>".$r["edition"]."</td>";
        echo "<td>".$r["no_of_pages"]."</td>";
        echo "<td><a href='updateBook.php?id=".$r["id"]."' class='badge badge-pill badge-dark btn btn-small active'>Update</a></td>";
        echo "<td><a href='delete.php?id=".$r["id"]."' class='badge badge-pill badge-dark btn btn-small active'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error executing the query: ".$conn->error;
}
?>


    <div class="text-center">
    <button type="button" class="btn btn-dark btn-lg btn-block" align="center" onclick="window.location.href='changeAuthorPass.php'">Change Password</button>
       <button type="button" class="btn btn-dark btn-lg btn-block" align="center" onclick="window.location.href='logout.php'">logout</button>
    </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
