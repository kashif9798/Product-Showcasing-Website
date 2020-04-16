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
	
	if (isset($_GET["delete_slide"])) 
	{
		$delete_id = $_GET["delete_slide"];

		$delete_slide = "DELETE FROM slider WHERE id = '$delete_id'";

		$run_delete = mysqli_query($con,$delete_slide);

		if ($run_delete) 
		{
			echo "<script>alert('One of your slide has been deleted');</script>";

			echo "<script>window.open('index.php?view_slides','_self');</script>";

		}
	}

?>