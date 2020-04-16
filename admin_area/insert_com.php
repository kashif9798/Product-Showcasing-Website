<?php

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


	if (isset($_POST["submit"])) 
	{
		$com_name = preg_replace('/\s+/', ' ',$_POST["com_name"]);


	 	$insert_com = "INSERT INTO companies (com_name) VALUES ('$com_name')";

	 	$run_com = mysqli_query($con,$insert_com);

	 	if ($run_com) 
	 	{
			echo "<script>alert('Company has been inserted successfully')</script>";
			echo "<script>window.open('index.php?view_com','_self');</script>";
		}
		else
		{
			echo "<script>alert('Company Insertion was not successful')</script>";
			echo "<script>window.open('index.php?view_com','_self');</script>";
		}
	}

?>

<div class="row mt-5">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;">
					Dashboard 
				</a>
			</li>

			<li class="breadcrumb-item active">
				Insert Company
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					Insert Company
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="company_names">Company Name *</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,25}" name="com_name" id="company_names" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 25')"> 
							</div>
					
					</div>

					<div class="form-group mt-5 row"> 

							<div class="offset-md-3 col-md-6"> 
							  <input class="btn btn-success" style="width: 100%;" value="Submit" type="submit" name="submit">
							</div>
					
					</div>

				</form>

			</div>


		</div>

	</div>
</div>