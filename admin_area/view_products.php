<?php 

	session_start();

	include("includes/db.php");

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

		$active_arrow="product";

		$admin_session = $_SESSION["admin_email"];

		$get_admin = "SELECT admin_name FROM admins WHERE admin_email = '$admin_session'";

		$run_admin = mysqli_query($con,$get_admin);

		$row_admin = mysqli_fetch_array($run_admin);

		$admin_name = $row_admin["admin_name"];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medlea - Admin Area</title>
	<link rel="icon" href="../images/logo/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


</head>

<body>
	<div id="wrapper">
		<div class="container-fluid ninja">
		<?php include("includes/sidebar.php"); ?>
		</div><br>
		<div id="page-wrapper">
			<div class="container-fluid">				

				<div class="row mt-5">
					<div class="col-lg-12">

						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;">Dashboard </a>
							</li>

							<li class="breadcrumb-item active">
								View Products
							</li>
						</ol>

					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						
						<div class="card">
							
							<div class="card-header">
							
							<h3 class="card-title">
								
								View Products

							</h3>	

							</div>

							<div class="card-body">
								
								<div class="table-responsive">
									
									<table class="table table-hover table-bordered" id="view_product_datatable">
										
										<thead>
											<tr>
												<th>S.No:</th>
												<th>Name:</th>
												<th>Formulation</th>								
												<th>Image:</th>
												<th>Featured:</th>
												<th>Category</th>
												<th>Company</th>
												<th>Delete:</th>
												<th>Edit:</th>
											</tr>
										</thead>

										<tbody>
											<?php 
												$i=0;

												$get_pro = "SELECT products.p_id,products.p_name,products.formulation,products.img1,products.featured,products.cat_id,companies.com_name FROM products INNER JOIN companies ON products.com_id=companies.com_id ORDER BY products.p_id DESC";

												$run_pro = mysqli_query($con,$get_pro);

												while ($row_pro = mysqli_fetch_array($run_pro)) 
												{
													$viewId = $row_pro["p_id"];

													$viewName = $row_pro["p_name"];

													$viewForma = $row_pro["formulation"];

													$viewImg1 = $row_pro["img1"];

													$viewFeat = $row_pro["featured"];

													$viewCat = $row_pro["cat_id"];

													$viewCom = $row_pro["com_name"];

													$i++;
											?>
											<tr>
												<td id="title_admin_view_pro"><?php echo ($i); ?></td>

												<td id="title_admin_view_pro"><?php echo ($viewName); ?></td>

												<td id="title_admin_view_pro"><?php echo ($viewForma); ?></td>

												<td><img class="img_admin_view_pro" src="products_pictures/<?php echo ($viewImg1); ?>"></td>

												<td>

													<?php 
														if ($viewFeat==1) {

															echo "<span class='text-success'>Yes</span>";

														}else{

															echo "<span>No</span>";

														} 

													?>

												</td>


												<td>

													<?php if ($viewCat==1): ?>

														Pharmaceutical
														
													<?php endif ?>

													<?php if ($viewCat==2): ?>

														Nutraceutical
														
													<?php endif ?>


													<?php if ($viewCat==3): ?>

														Cosmeceutical
														
													<?php endif ?>


													<?php if ($viewCat==4): ?>

														Herbal
														
													<?php endif ?>


													<?php if ($viewCat==5): ?>

														Consumer
														
													<?php endif ?>
													
												</td>

												<td><?php echo ($viewCom); ?></td>

												<td>
													<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="delete_product.php?delete_pro=<?php echo ($viewId); ?>">

														Delete

													</a>
												</td>

												<td>
													<a class="btn btn-info btn-sm" href="index.php?edit_product=<?php echo ($viewId); ?>">

														Edit

													</a>
												</td>

											</tr>

											<?php } ?>
										</tbody>
									</table>
								</div>

							</div>

						</div>

					</div>
				</div>


			</div>
		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$("#view_product_datatable").DataTable();
	});
</script>