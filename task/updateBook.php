<?php

@include 'config.php';

	session_start();

	if(!isset($_SESSION['author_name'])){
	   header('location:author_page.php');
	}




    if(isset($_POST['submit'])){

    $title = $_POST["title"];
	$edition = $_POST["edition"];
    $no_of_pages = $_POST["no_of_pages"];

    $q = "UPDATE books SET title = '".$title."', edition = '".$edition."', no_of_pages = '".$no_of_pages."' WHERE id='" . $_GET["id"] . "'";

    if ($conn->query($q) === TRUE) {
        ?>
        <script type="text/javascript">
			alert("Your book is updated");
      window.location.href = "author_page.php";
		</script>.
        <?php
    } else {
        echo "Error updating book: " . $conn->error;
    }
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

      <form action="" method="POST">
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
    <input type="submit" name="submit" class="btn" value="Update">
  </div>
</div>
      </form>



    <div class="text-center">
       <p>Don't Update Book Go To <a href="author_page.php">Home Page</a></p>
    </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
