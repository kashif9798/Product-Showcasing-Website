<?php 
	
	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	if (isset($_GET["edit_contact"])) 
	{
		$get_contact = "SELECT * FROM contact";

		$run_edit = mysqli_query($con,$get_contact);

		$row_edit = mysqli_fetch_array($run_edit);

		$edit_tel1 = $row_edit["tel1"];

		$edit_tel2 = $row_edit["tel2"];

		$edit_tel3 = $row_edit["tel3"];

		$edit_fb = $row_edit["facebook"];

		$edit_insta = $row_edit["instagram"];

		$edit_gmail1 = $row_edit["gmail1"];

		$edit_gmail2 = $row_edit["gmail2"];

		$edit_address = $row_edit["Address"]; 	


	}

?>


<?php 

	if (isset($_POST["update"])) 
	{
		$update_tel1 = $_POST["tel1"];

		$update_tel2 = $_POST["tel2"];

		$update_tel3 = $_POST["tel3"];

		$update_fb = $_POST["fb"];

		$update_insta = $_POST["insta"];

		$update_gmail1 = $_POST["gmail1"];

		$update_gmail2 = $_POST["gmail2"];

		$update_address = $_POST["addr"]; 	


	 	$update_contact = "UPDATE contact SET tel1='$update_tel1',tel2='$update_tel2',tel3='$update_tel3',facebook='$update_fb',instagram='$update_insta',gmail1='$update_gmail1',gmail2='$update_gmail2',Address='$update_address'";

	 	$run_contact = mysqli_query($con,$update_contact);

	 	if ($run_contact) 
	 	{
			echo "<script>alert('Contacts has been updated successfully')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}
		else
		{
			echo "<script>alert('Contacts updation was not successful')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}

	}
?>


		<div class="row mt-5">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
					</li>

					<li class="breadcrumb-item active">
						Edit Contact
					</li>
				</ol><br>
				<p class="lead text-dark"><b class="text-danger">Note:</b> Don't put 0 in the start of a Telephone No. It will automatically be added at the start</p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title">
							Edit Contact
							<a href="index.php?dashboard" class="btn btn-primary float-right">Cancel Edit</a>
						</h4>

					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="telep1">Telephone No 1 (footer): *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[0-9]{1,20}" name="tel1" id="telep1" value="<?php echo($edit_tel1); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with numbers only and max digits 20')"> 
							    </div>

							</div>


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="telep2">Telephone No 2: </label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[0-9]{1,20}" name="tel2" id="telep2" value="<?php echo($edit_tel2); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with numbers only and max digits 20')"> 
							    </div>

							</div>							


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="telep3">Telephone No 3: </label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[0-9]{1,20}" name="tel3" id="telep3" value="<?php echo($edit_tel3); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with numbers only and max digits 20')"> 
							    </div>

							</div>


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="faceb">Facebook link (footer):</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="fb" id="faceb" value="<?php echo($edit_fb); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with max characters 255')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="instai">Instagram link (footer):</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="insta" id="instai" value="<?php echo($edit_insta); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with max characters 255')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="gmaili1">Gmail link 1 (footer):</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="gmail1" id="gmaili1" value="<?php echo($edit_gmail1); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with max characters 255')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="gmaili2">Gmail link 2:</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="gmail2" id="gmaili2" value="<?php echo($edit_gmail2); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with max characters 255')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="address">Address: *</label>

									<div class="col-md-6">

									   <textarea class="form-control" name="addr" id="address" cols="19" rows="4" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 255')"><?php echo($edit_address); ?></textarea>  
									</div>
							
							</div>




							<div class="form-group mt-5 row">

								<label class="col-form-label col-md-3 d-none d-md-block" for="SubmitInsert"></label>

							    <div class="col-md-6">

							    	<input class="btn btn-lg btn-success" style="width: 100%;" value="Submit" id="SubmitInsert" type="submit" name="update">

							    </div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

