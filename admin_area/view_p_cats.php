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
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				View Product Categories
			</li>
		</ol><br>

		<p class="lead text-dark"><b class="text-danger">Note:</b> You cannot deactivate a category if it has products associated with it i.e the Number Of Products in below table should be 0 for a category to be deactivated</p>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				 
				View Product Categories

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-bordered">
						
						<thead>
							<tr>
								<th>S.No:</th>
								<th>Name:</th>
								<th class="text-center">Number Of Products:</th>
								<th>Status:</th>
								<th>Action:</th>
							</tr>
						</thead>

						<tbody>
							<?php

								$i=0; 

								$getViewPro = "SELECT cat_id,cat_name,status FROM product_cat";

								$runViewPro = mysqli_query($con,$getViewPro);

								while ($rowViewPro = mysqli_fetch_array($runViewPro)) 
								{
									$idViewPro = $rowViewPro["cat_id"];

									$nameViewPro = $rowViewPro["cat_name"];

									$statusViewPro = $rowViewPro["status"];

									$getViewCount = "SELECT COUNT(p_id) as countCatPro FROM products WHERE cat_id = $idViewPro";

									$runViewCount = mysqli_query($con,$getViewCount);

									$rowViewProCount = mysqli_fetch_array($runViewCount);

									$countCatPro = $rowViewProCount["countCatPro"];


									$i++;

							?>
							<tr>

								<td><?php echo ($i); ?></td>

								<td><?php echo ($nameViewPro); ?></td>

								<td><p class="number-of-pro-com"><?php echo ($countCatPro); ?></p></td>								

								<td>
									<?php if ($statusViewPro==1): ?>
										<b class="text-success">Active</b>
									<?php endif ?>

									<?php if ($statusViewPro!=1): ?>
										<b class="text-secondary">Deactive</b>
									<?php endif ?>
								</td>

								<td>
									<?php if ($statusViewPro==1): ?>

										<?php if ($countCatPro==0): ?>

											<a href="cat_deactivate.php?deactiveateId=<?php echo($idViewPro); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to deactivate this product category?')">

													Deactivate
											</a>
											
										<?php endif ?>



										<?php if ($countCatPro!=0): ?>

											<button class="btn btn-sm btn-dark">Disabled Deactivation</button>

										<?php endif ?>

										

									<?php endif ?>

									<?php if ($statusViewPro!=1): ?>
										<a href="cat_activate.php?activeateId=<?php echo($idViewPro); ?>" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure ?')">Activate</a>
									<?php endif ?>
								</td>

							</tr>

							<?php } ?>
						</tbody>

					</div>

			</div>

		</div>

	</div>
</div>
