<?php
	

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	if (isset($_GET["edit_policy"])) 
	{
		$edit_policy_id = $_GET["edit_policy"];

		$get_policy_query = "SELECT p_desc FROM policy WHERE id = $edit_policy_id";

		$run_edit = mysqli_query($con,$get_policy_query);

		$row_edit = mysqli_fetch_array($run_edit);

		$policy_desc_edit = $row_edit["p_desc"];		
	}


	if (isset($_POST["submit"])) 
	{
		$policy_desc = preg_replace('/\s+/', ' ',$_POST["policy_desc"]);


	 	$update_policy = "UPDATE policy SET p_desc='$policy_desc' WHERE id = $edit_policy_id";

	 	$run_policy = mysqli_query($con,$update_policy);

	 	if ($run_policy) 
	 	{
			echo "<script>alert('Policy has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_policy','_self');</script>";
		}
		else
		{
			echo "<script>alert('Policy updation was not successful')</script>";
			echo "<script>window.open('index.php?view_policy','_self');</script>";
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
				Edit Policy
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					Edit Policy
					<a href="index.php?view_com" class="btn btn-primary float-right">Cancel Edit</a>
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="policyil">Policy Statement *</label>

							<div class="col-md-6">

							   <textarea class="form-control" pattern="[A-Za-z0-9 @$&().,#]{1,300}" name="policy_desc" id="policyil" cols="19" rows="8" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 300')"><?php echo ($policy_desc_edit); ?></textarea>  
							</div>
					
					</div>

					<div class="form-group mt-5 row"> 

							<div class="offset-md-3 col-md-6"> 
							  <input class="btn btn-success" style="width: 100%;" value="Update Policy" type="submit" name="submit">
							</div>
					
					</div>

				</form>

			</div>


		</div>

	</div>
</div>