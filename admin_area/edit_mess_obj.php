<?php
	
	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


	
	if (isset($_GET["edit_mess_obj"])) 
	{
		$get_mo_query = "SELECT message,objective FROM message_objective";

		$run_edit_mo = mysqli_query($con,$get_mo_query);

		$row_edit_mo = mysqli_fetch_array($run_edit_mo);

		$message_edit = $row_edit_mo["message"];

		$objective_edit = $row_edit_mo["objective"];		
	}


	if (isset($_POST["submit"])) 
	{
		$update_mess = preg_replace('/\s+/', ' ',$_POST["mess"]);

		$update_obj = preg_replace('/\s+/', ' ',$_POST["obj"]);

	 	$update_mo = "UPDATE message_objective SET message='$update_mess',objective='$update_obj'";

	 	$run_mo = mysqli_query($con,$update_mo);

	 	if ($run_mo) 
	 	{
			echo "<script>alert('Message - Objective has been updated successfully')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}
		else
		{
			echo "<script>alert('Message - Objective updation was not successful')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
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
				Edit Message - Objective
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					Edit Message - Objective
					<a href="index.php?dashboard" class="btn btn-primary float-right">Cancel Edit</a>
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="message">Message *</label>

							<div class="col-md-6">

							   <textarea class="form-control" pattern="[A-Za-z0-9 @$&().,#]{1,400}" name="mess" id="message" cols="19" rows="14" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 400')"><?php echo ($message_edit); ?></textarea>  
							</div>
					
					</div>


					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="objective">Objective *</label>

							<div class="col-md-6">

							   <textarea class="form-control" pattern="[A-Za-z0-9 @$&().,#]{1,400}" name="obj" id="objective" cols="19" rows="14" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 400')"><?php echo ($objective_edit); ?></textarea>  
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