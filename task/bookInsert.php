<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['author_name'])){
   header('location:author_page.php');
 }

	$title = $_POST["title"];
	$edition = $_POST["edition"];
  $no_of_pages = $_POST["no_of_pages"];


	$q  =  "select * from user where name = '".$_SESSION['author_name']."'";
if ($conn->query($q)==TRUE) {
	$sql = "insert into books(title,author,edition,no_of_pages) values('".$title."','".$_SESSION['author_name']."','".$edition."','".$no_of_pages."')";
	if ($conn->query($sql)==TRUE) {
		echo "Data Inserted";?>
		<script type="text/javascript">
			alert("Your another book is added");
      window.location.href = "author_page.php";
		</script>.

		<?php
	}else{
		echo "Data not inserted";;
		$conn->close();
	}
}else {
	echo "Data is not inserted";
	echo $conn->error();
}

?>
