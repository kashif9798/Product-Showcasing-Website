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
	
	if (isset($_GET["deletepolicy"])) 
	{
		$delete_policy_id = $_GET["deletepolicy"];

		$delete_policy= "DELETE FROM policy WHERE id = '$delete_policy_id'";

		$run_delete = mysqli_query($con,$delete_policy);

		if ($run_delete) 
		{
			echo "<script>alert('One of your policy has been deleted');</script>";

			echo "<script>window.open('index.php?view_policy','_self');</script>";

		}
	}

?>