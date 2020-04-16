<?php 

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


	if (isset($_GET["edit_admin"]))
	{

		$edit_user = $_GET["edit_admin"];

		$get_admin_edit = "SELECT * FROM admins WHERE admin_id='$edit_user'";

		$run_user_edit = mysqli_query($con,$get_admin_edit);

		$row_user_edit = mysqli_fetch_array($run_user_edit);

		$user_name_edit = $row_user_edit["admin_name"];

		$user_pass_edit = $row_user_edit["admin_pass"];

		$user_email_edit = $row_user_edit["admin_email"];

		$user_image_edit = $row_user_edit["admin_image"];

		$user_contact_edit = $row_user_edit["admin_contact"];

		$user_job_edit = $row_user_edit["admin_job"];		

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


	 	$update_user = "UPDATE admins SET admin_name='$user_name',admin_pass='$user_pass',admin_image='$user_img',admin_email='$user_email',admin_job='$user_job',admin_contact='$user_contact' WHERE admin_id=$edit_user";

	 	$run_update = mysqli_query($con,$update_user);

	 	if ($run_update) {

			echo "<script>alert('Admin User has been updated successfully, you will be logged out')</script>";

			echo "<script>window.open('logout.php','_self');</script>";	

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
						Edit Admin
					</li>
				</ol><br>
				<p class="lead text-dark"><b class="text-danger">Note:</b> Don't put 0 in the start of a Contact No. It will automatically be added at the start</p>
				<p class="lead text-dark"><b class="text-danger">Note:</b> Don't use same Email for two accounts</p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title"> 
							Edit Admin
							<a href="index.php?view_admin" class="btn btn-primary float-right">Cancel Edit</a>
						</h4>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="name">Name: *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,40}" name="admin_name" id="name" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 40')" value="<?php echo($user_name_edit); ?>"> 
							    </div>

							</div>

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="email">Email: *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="email" name="admin_email" id="email" required value="<?php echo($user_email_edit); ?>"> 
							    </div>

							</div>


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="password">Password: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="admin_pass" id="password" required value="<?php echo($user_pass_edit); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Contact No: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[0-9]{1,20}" name="admin_contact" id="country" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with numbers only and max digits 20')" value="<?php echo($user_contact_edit); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Job: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,50}" name="admin_job" id="country" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')" value="<?php echo($user_job_edit); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="Image">Image: *</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="admin_img" id="Image" required>

							    	<br>

							    	<img class="img_admin_view_pro" src="admin_images/<?php echo($user_image_edit); ?>"> 
							    </div>
							</div>					

							<div class="form-group mt-5 row">   
							    <div class="offset-md-3 col-md-6">
							    	<input class="btn btn-success" style="width: 100%;" value="Update Admin" type="submit" name="submit"> 
							    </div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
