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
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;">Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				View Team
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				View Team

			</h3>

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>S.No:</th>
								<th>Name:</th>
								<th>Postion:</th>
								<th>Image:</th>
								<th>Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_team = "SELECT * FROM team";

								$run_team = mysqli_query($con,$get_team);

								while ($row_team = mysqli_fetch_array($run_team)) 
								{
									$team_id = $row_team["t_id"];

									$team_name = $row_team["t_name"];

									$team_position = $row_team["t_position"];

									$team_img = $row_team["t_img"];

									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($team_name); ?></td>

								<td id="title_admin_view_pro"><?php echo ($team_position); ?></td>

								<td class="text-center"><img class="img_admin_view_pro" src="../images/team/<?php echo ($team_img); ?>"></td>

								<td class="text-center">
									<a class="btn btn-info btn-sm" href="index.php?edit_team=<?php echo ($team_id); ?>">

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
