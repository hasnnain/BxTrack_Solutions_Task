<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>H&Z Travels</title>
    
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

      <h1 class="display-7" align="center"><span><?php echo $_SESSION['user_name'] ?></span></h1>

    <?php

			$q= "select * from books";
			$rs=$conn->query($q);

			echo "<table class=table table-dark table-striped table-hover>";

			echo"<th>Title</th>";
			echo"<th>Author</th>";
			echo"<th>Edition</th>";
            echo"<th>No. of Pages</th>";

			while($r=$rs->fetch_assoc()){
				echo "<tr>";

				echo "<td>".$r["title"]." </td>";
				echo "<td>".$r["author"]." </td>";
				echo "<td>".$r["edition"]." </td>";
                echo "<td>".$r["no_of_pages"]." </td>";

				echo "</tr>";
			}

			echo "</table>";


		?>

    <div class="text-center">
       <button type="button" class="btn btn-dark btn-lg btn-block" align="center" onclick="window.location.href='changepassword.php'">Change Password</button>
       <button type="button" class="btn btn-dark btn-lg btn-block" align="center" onclick="window.location.href='logout.php'">logout</button>
    </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>
