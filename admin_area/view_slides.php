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
				View Slides
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				View Slides

			</h3>

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>S.No:</th>
								<th>Text:</th>
								<th>Image:</th>
								<th>Delete:</th>
								<th>Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_slides = "SELECT * FROM slider";

								$run_slides = mysqli_query($con,$get_slides);

								while ($row_slides = mysqli_fetch_array($run_slides)) 
								{
									$slide_id = $row_slides["id"];

									$slide_image = $row_slides["img"];

									$slide_name = $row_slides["slide_text"];

									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($slide_name); ?></td>

								<td class="text-center"><img class="img_admin_view_slide" src="slide_images/<?php echo ($slide_image); ?>"></td>
					
								<td class="text-center">
									<a onclick="return confirm('Are you sure you want to delete this slider ?')" class="btn btn-danger btn-sm" href="delete_slide.php?delete_slide=<?php echo ($slide_id); ?>">

										Delete

									</a>
								</td>

								<td class="text-center">
									<a class="btn btn-info btn-sm" href="index.php?edit_slide=<?php echo ($slide_id); ?>">

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
