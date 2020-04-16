<?php 

	session_start();

	include("includes/db.php");


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}
	
	if (isset($_GET["deleteCom"])) 
	{
		$delete_com_id = $_GET["deleteCom"];

		$delete_com= "DELETE FROM companies WHERE com_id = '$delete_com_id'";

		$run_delete = mysqli_query($con,$delete_com);

		if ($run_delete) 
		{
			echo "<script>alert('One of your company has been deleted');</script>";

			echo "<script>window.open('index.php?view_com','_self');</script>";

		}
	}

?>