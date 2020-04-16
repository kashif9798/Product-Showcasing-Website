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
		$slide_text = preg_replace('/\s+/', ' ',$_POST["slide_text"]);

	 	$slide_image = $_FILES["slide_image"]["name"];

	 	$temp_name = $_FILES["slide_image"]["tmp_name"];
	
	 	move_uploaded_file($temp_name,"slide_images/$slide_image");	 	

	 	$insert_slide = "INSERT INTO slider (img,slide_text) VALUES ('$slide_image','$slide_text')";

	 	$run_slide = mysqli_query($con,$insert_slide);

	 	if ($run_slide) 
	 	{
			echo "<script>alert('Slide has been inserted successfully')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";
		}
		else
		{
			echo "<script>alert('Slide Insertion was not successful')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";
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
					Insert Slide
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					Insert Slide
				</h4>
			</div>

			<div class="card-body">

				<form method="post" enctype="multipart/form-data">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="slider_text">Slide Text</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" pattern="[A-Za-z0-9 @]{1,50}" name="slide_text" id="slider_text" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							</div>
					
					</div>

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="slide-image">Slide Image *</label>

							<div class="col-md-6">
							   <input class="form-control-file" type="file" name="slide_image" id="slide-image" required>
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
