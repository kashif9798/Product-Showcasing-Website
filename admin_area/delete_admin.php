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
	
	if (isset($_GET["delete_admin"])) 
	{
		$delete_admin_id = $_GET["delete_admin"];

		$get_delete_admin = "DELETE FROM admins WHERE admin_id = '$delete_admin_id'";

		$run_delete_admin = mysqli_query($con,$get_delete_admin);

		if ($run_delete_admin) 
		{
			echo "<script>alert('One of your Admin has been deleted');</script>";

			echo "<script>window.open('index.php?view_admin','_self');</script>";

		}
	}

?>