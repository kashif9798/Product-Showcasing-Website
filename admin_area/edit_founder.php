<?php 


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	
	if (isset($_GET["edit_founder"])) 
	{
		$get_founder = "SELECT * FROM founder";

		$run_edit = mysqli_query($con,$get_founder);

		$row_edit = mysqli_fetch_array($run_edit);

		$f_name = $row_edit["f_name"];

		$f_position = $row_edit["f_position"];

		$f_img = $row_edit["f_img"];

		$f_message = $row_edit["f_message"];		


	}

?>


<?php 

	if (isset($_POST["update"])) 
	{
		$update_f_name = preg_replace('/\s+/', ' ',$_POST["f_name"]);

		$update_f_posi = preg_replace('/\s+/', ' ',$_POST["f_position"]);

		$update_f_mess = preg_replace('/\s+/', ' ',$_POST["f_mess"]);

	 	$update_f_img = $_FILES["f_img"]["name"];

	 	$temp_name = $_FILES["f_img"]["tmp_name"];
	
	 	move_uploaded_file($temp_name,"../images/founder/$update_f_img");	 	

	 	$update_founder = "UPDATE founder SET f_img='$update_f_img',f_name='$update_f_name',f_position='$update_f_posi',f_message='$update_f_mess'";

	 	$run_founder = mysqli_query($con,$update_founder);

	 	if ($run_founder) 
	 	{
			echo "<script>alert('Team Member has been updated successfully')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}
		else
		{
			echo "<script>alert('Team Member  updation was not successful')</script>";
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
						Edit Founder
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title">
							Edit Founder
							<a href="index.php?view_team" class="btn btn-primary float-right">Cancel Edit</a>
						</h4>

					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="founderN">Founder Name *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 @]{1,40}" name="f_name" id="founderN" value="<?php echo($f_name); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="founderP">Founder Position *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 @$&().,#]{1,40}" name="f_position" id="founderP" value="<?php echo($f_position); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>

							</div>

							


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="founder-img">Founder Picture *</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="f_img" id="founder-img" required>

							    	<br>

							    	<img class="img_admin_view_pro" src="../images/founder/<?php echo($f_img); ?>">

							    </div>
							</div>


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="f_message">Founder Message *</label>

									<div class="col-md-6">

									   <textarea class="form-control" pattern="[A-Za-z0-9 @$&().,#]{1,500}" name="f_mess" id="f_message" cols="19" rows="14" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 500')"><?php echo ($f_message); ?></textarea>  
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

