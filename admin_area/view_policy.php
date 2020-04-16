<?php 


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

?>


<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				View Policy
			</li>
		</ol><br>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				 
				View Policy

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-bordered">
						
						<thead>
							<tr>
								<th>S.No:</th>
								<th>Policy:</th>
								<th>Delete:</th>
								<th>Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_view_policy = "SELECT * FROM policy";

								$run_view_policy = mysqli_query($con,$get_view_policy);

								while ($row_view_policy = mysqli_fetch_array($run_view_policy)) 
								{
									$view_policy_id = $row_view_policy["id"];

									$view_policy_name = $row_view_policy["p_desc"];

									$i++;
							?>
							<tr>

								<td><?php echo ($i); ?></td>

								<td><?php echo ($view_policy_name); ?></td>

								<td>
									
									<a onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm" href="delete_policy.php?deletepolicy=<?php echo ($view_policy_id); ?>">

										Delete

									</a>


								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?edit_policy=<?php echo ($view_policy_id); ?>">

										Edit

									</a>
								</td>

							</tr>

							<?php } ?>
						</tbody>

					</div>

			</div>

		</div>

	</div>
</div>