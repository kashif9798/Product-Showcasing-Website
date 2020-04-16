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
	 	$user_name = $_POST["admin_name"];

	 	$user_email = $_POST["admin_email"];

	 	$user_pass = $_POST["admin_pass"];

	 	$user_contact = $_POST["admin_contact"];

	 	$user_job = $_POST["admin_job"];

	 	$user_img = $_FILES["admin_img"]["name"];

	 	$temp_name = $_FILES["admin_img"]["tmp_name"];

	 	move_uploaded_file($temp_name, "admin_images/$user_img");


	 	$insert_user = "INSERT INTO admins (admin_name,admin_pass,admin_image,admin_email,admin_job,admin_contact) VALUES ('$user_name','$user_pass','$user_img','$user_email','$user_job','$user_contact')";

	 	$run_user = mysqli_query($con,$insert_user);

	 	if ($run_user) {

			echo "<script>alert('Admin User has been inserted successfully')</script>";

			echo "<script>window.open('index.php?view_admin','_self');</script>";	

		}
		else
		{
			echo "<script>alert('Admin User updation was not successful')</script>";

			echo "<script>window.open('index.php?view_admin','_self');</script>";

		}
	 } 
?>


		<div class="row mt-5">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;">Dashboard </a>
					</li>

					<li class="breadcrumb-item active">
						Insert Admin
					</li>
				</ol><br>
				<p class="lead text-dark"><b class="text-danger">Note:</b> Don't put 0 in the start of a Telephone No. It will automatically be added at the start</p>
				<p class="lead text-dark"><b class="text-danger">Note:</b> Don't use same Email for two accounts</p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title"> Insert Admin</h4>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="name">Name: *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,40}" name="admin_name" id="name" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 40')"> 
							    </div>

							</div>

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="email">Email: *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="email" name="admin_email" id="email" required> 
							    </div>

							</div>


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="password">Password: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="password" name="admin_pass" id="password" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Contact: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[0-9]{1,20}" name="admin_contact" id="country" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with numbers only and max digits 20')"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Job: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,50}" name="admin_job" id="country" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="Image">Image: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="admin_img" id="Image" required> 
							    </div>
							</div>					

							<div class="form-group mt-5 row">   
							    <div class="offset-md-3 col-md-6">
							    	<input class="btn btn-success" style="width: 100%;" value="Insert Admin" type="submit" name="submit"> 
							    </div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
