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
				View Companies
			</li>
		</ol><br>

		<p class="lead text-dark"><b class="text-danger">Note:</b> You cannot delete a company if it has products associated with it i.e the Number Of Products in below table should be 0 for a company to be deleted</p>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				 
				View Companies

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-bordered">
						
						<thead>
							<tr>
								<th>S.No:</th>
								<th>Company Name:</th>
								<th class="text-center">Number Of Products:</th>
								<th>Delete:</th>
								<th>Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_view_com = "SELECT * FROM companies";

								$run_view_com = mysqli_query($con,$get_view_com);

								while ($row_view_com = mysqli_fetch_array($run_view_com)) 
								{
									$view_com_id = $row_view_com["com_id"];

									$view_com_name = $row_view_com["com_name"];

									$getViewCount = "SELECT COUNT(p_id) as countComPro FROM products WHERE com_id = $view_com_id";

									$runViewCount = mysqli_query($con,$getViewCount);

									$rowViewProCount = mysqli_fetch_array($runViewCount);

									$countComPro = $rowViewProCount["countComPro"];

									$i++;
							?>
							<tr>

								<td><?php echo ($i); ?></td>

								<td><?php echo ($view_com_name); ?></td>

								<td><p class="number-of-pro-com"><?php echo ($countComPro); ?></p></td>

								<td>
									

									<?php if ($countComPro==0): ?>

										<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="delete_com.php?deleteCom=<?php echo ($view_com_id); ?>">

											Delete

										</a>
											
									<?php endif ?>



									<?php if ($countComPro!=0): ?>

										<button class="btn btn-sm btn-dark">Disabled Delation</button>

									<?php endif ?>

								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?edit_com=<?php echo ($view_com_id); ?>">

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