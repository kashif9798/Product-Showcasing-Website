<?php 


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	if (isset($_GET["edit_team"])) 
	{
		$edit_id = $_GET["edit_team"];

		$get_team = "SELECT * FROM team WHERE t_id = '$edit_id'";

		$run_edit = mysqli_query($con,$get_team);

		$row_edit = mysqli_fetch_array($run_edit);

		$t_name = $row_edit["t_name"];

		$t_position = $row_edit["t_position"];

		$t_img = $row_edit["t_img"];		


	}

?>


<?php 

	if (isset($_POST["update"])) 
	{
		$update_t_name = preg_replace('/\s+/', ' ',$_POST["t_name"]);

		$update_t_posi = preg_replace('/\s+/', ' ',$_POST["t_position"]);

	 	$update_t_img = $_FILES["t_img"]["name"];

	 	$temp_name = $_FILES["t_img"]["tmp_name"];
	
	 	move_uploaded_file($temp_name,"../images/team/$update_t_img");	 	

	 	$update_team = "UPDATE team SET t_img='$update_t_img',t_name='$update_t_name',t_position='$update_t_posi' WHERE t_id=$edit_id";

	 	$run_team = mysqli_query($con,$update_team);

	 	if ($run_team) 
	 	{
			echo "<script>alert('Team Member has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_team','_self');</script>";
		}
		else
		{
			echo "<script>alert('Team Member  updation was not successful')</script>";
			echo "<script>window.open('index.php?view_team','_self');</script>";
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
						Edit Team
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title">
							Edit Team
							<a href="index.php?view_team" class="btn btn-primary float-right">Cancel Edit</a>
						</h4>

					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="teamN">Name *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 @]{1,40}" name="t_name" id="teamN" value="<?php echo($t_name); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="teamP">Position *</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 @$&().,#]{1,40}" name="t_position" id="teamP" value="<?php echo($t_position); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field with no special characters and max characters 50')"> 
							    </div>

							</div>

							


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="team-img">Picture *</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="t_img" id="team-img" required>

							    	<br>

							    	<img class="img_admin_view_pro" src="../images/team/<?php echo($t_img); ?>">

							    </div>
							</div>




							<div class="form-group mt-5 row">

								<label class="col-form-label col-md-3 d-none d-md-block" for="SubmitInsert"></label>

							    <div class="col-md-6">

							    	<input class="btn btn-lg btn-success" style="width: 100%;" value="Update Team" id="SubmitInsert" type="submit" name="update">

							    </div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

