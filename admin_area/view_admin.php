<?php  

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


$get_admin_count = "SELECT COUNT(admin_id) as countAdmn  FROM admins";

$run_admin_count = mysqli_query($con,$get_admin_count);

$row_admin_count = mysqli_fetch_array($run_admin_count);

$countAdmin = $row_admin_count["countAdmn"];


?>

<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;">Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				View Admins
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				View Admins

			</h3>	

			<p class="lead">At least one Admin should remain in the table</p>

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered">
						
						<thead>
							<tr>
								<th>No:</th>
								<th>Name:</th>
								<th>Image:</th>
								<th>Email:</th>
								<th>Job:</th>
								<th>Contact:</th>
								<th>Delete:</th>
								<th>Edit</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_admin = "SELECT * FROM admins";

								$run_admin = mysqli_query($con,$get_admin);

								while ($row_admin = mysqli_fetch_array($run_admin))  
								{
									$User_id = $row_admin["admin_id"];

									$User_name = $row_admin["admin_name"];

									$User_img = $row_admin["admin_image"];

									$User_email = $row_admin["admin_email"];

									$User_job = $row_admin["admin_job"];

									$User_contact = $row_admin["admin_contact"];


									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($User_name); ?></td>

								<td><img class="img_admin_view_pro" src="admin_images/<?php echo ($User_img); ?>"></td>

								<td><?php echo ($User_email); ?></td>

								<td><?php echo ($User_job); ?></td>

								<td>0<?php echo ($User_contact); ?></td>								

								<td>

									<?php if ($countAdmin!=1): ?>

										<a href="delete_admin.php?delete_admin=<?php echo($User_id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to delete this admin ?')">

											Delete

										</a>

									<?php endif ?>

									<?php if ($countAdmin== 1): ?>

											<a class="btn btn-sm btn-dark text-white">Disabled Deletion</a>

									<?php endif ?>

								</td>

								<td>
									<?php if (strtolower($_SESSION["admin_email"])==strtolower($User_email)): ?>
										
									
										<a href="index.php?edit_admin=<?php echo ($User_id); ?>" class="btn btn-sm btn-primary">Edit</a>

									<?php endif; ?>	

									<?php if (strtolower($_SESSION["admin_email"])!=strtolower($User_email)): ?>

										<a class="btn btn-sm btn-dark text-white">Disabled</a>

									<?php endif; ?>		

								</td>

							</tr>

							<?php } ?>
						</tbody>

					</div>

			</div>

		</div>

	</div>
</div>