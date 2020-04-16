<?php 
	
	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	if (isset($_GET["edit_slide"])) 
	{
		$edit_id = $_GET["edit_slide"];

		$get_slide = "SELECT * FROM slider WHERE id = '$edit_id'";

		$run_edit = mysqli_query($con,$get_slide);

		$row_edit = mysqli_fetch_array($run_edit);

		$slide_image = $row_edit["img"];

		$slide_text = $row_edit["slide_text"];		


	}

?>


<?php 

	if (isset($_POST["update"])) 
	{
		$slide_text = preg_replace('/\s+/', ' ',$_POST["slide_text"]);

	 	$slide_image = $_FILES["slide_image"]["name"];

	 	$temp_name = $_FILES["slide_image"]["tmp_name"];
	
	 	move_uploaded_file($temp_name,"slide_images/$slide_image");	 	

	 	$update_slide = "UPDATE slider SET img='$slide_image',slide_text='$slide_text' WHERE id=$edit_id";

	 	$run_slide = mysqli_query($con,$update_slide);

	 	if ($run_slide) 
	 	{
			echo "<script>alert('Slide has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";
		}
		else
		{
			echo "<script>alert('Slide updation was not successful')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";
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
						Edit Slide
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title">
							Edit Slide
							<a href="index.php?view_slides" class="btn btn-primary float-right">Cancel Edit</a>
						</h4>

					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="slider_text">Slide Text</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 @]{1,50}" name="slide_text" id="slider_text" value="<?php echo($slide_text); ?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>

							</div>

							


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="slide-image">Slide Image *</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="slide_image" id="slide-image" required>

							    	<br>

							    	<img id="img_admin_view_pro_slide" src="slide_images/<?php echo($slide_image); ?>">

							    </div>
							</div>




							<div class="form-group mt-5 row">

								<label class="col-form-label col-md-3 d-none d-md-block" for="SubmitInsert"></label>

							    <div class="col-md-6">

							    	<input class="btn btn-lg btn-success" style="width: 100%;" value="Update Slide" id="SubmitInsert" type="submit" name="update">

							    </div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

