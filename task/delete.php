<?php

	@include 'config.php';

	session_start();

	if(!isset($_SESSION['author_name'])){
	   header('location:author_page.php');
	}

	
	$q= "DELETE FROM books WHERE id='" . $_GET["id"] . "'";

	if(mysqli_query($conn, $q)){
		echo "Data deleted";?>
		<script type="text/javascript">
			alert("Data deleted");
			window.location.href= "author_page.php";
		</script>
		<?php
	}else{
		echo "Failed to delete data";
		echo $con->error();

	}

?>
