<?php 

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


	// data retreival for edit
	if (isset($_GET["edit_product"])) 
	{
		$edit_id = $_GET["edit_product"];

		$get_p = "SELECT * FROM products WHERE p_id = $edit_id";

		$run_edit = mysqli_query($con,$get_p);

		$row_edit = mysqli_fetch_array($run_edit);

		$edit_name = $row_edit["p_name"];		

		$edit_desc = $row_edit["p_desc"];

		$edit_formu = $row_edit["formulation"];

		$edit_img1 = $row_edit["img1"];

		$edit_img2 = $row_edit["img2"];

		$edit_img3 = $row_edit["img3"];

		$edit_img4 = $row_edit["img4"];

		$edit_feat = $row_edit["featured"];

		$edit_cat = $row_edit["cat_id"];

		$edit_com = $row_edit["com_id"];

	}













	// when data is submited
	if (isset($_POST["update"])) {

	 	$product_name = preg_replace('/\s+/', ' ',$_POST["product_name"]);

	 	$product_cat  = $_POST["product_cat"];

	 			 $com = $_POST["com"];

	 	 $formulation = preg_replace('/\s+/', ' ',$_POST["formulation"]);

	 	 if(isset($_POST["featured"]))
	 	 {
	 	 	$featured = $_POST["featured"];
	 	 }
	 	 else
	 	 {
	 	 	$featured = 0;
	 	 }
	  		
	 	$product_desc = mysqli_real_escape_string($con,$_POST["product_desc"]);

	 	$product_img1 = $_FILES["product_img1"]["name"];

	 	$product_img2 = $_FILES["product_img2"]["name"];

	 	$product_img3 = $_FILES["product_img3"]["name"];

	 	$product_img4 = $_FILES["product_img4"]["name"];

	 	  $temp_name1 = $_FILES["product_img1"]["tmp_name"];

	 	  $temp_name2 = $_FILES["product_img2"]["tmp_name"];

	 	  $temp_name3 = $_FILES["product_img3"]["tmp_name"];

	 	  $temp_name4 = $_FILES["product_img4"]["tmp_name"];

	 	move_uploaded_file($temp_name1, "products_pictures/$product_img1");

	 	move_uploaded_file($temp_name2, "products_pictures/$product_img2");

	 	move_uploaded_file($temp_name3, "products_pictures/$product_img3");

	 	move_uploaded_file($temp_name4, "products_pictures/$product_img4");

	 	$update_product = "UPDATE products SET p_name='$product_name',p_desc='$product_desc',formulation='$formulation',img1='$product_img1',img2='$product_img2',img3='$product_img3',img4='$product_img4',featured=$featured,cat_id=$product_cat,com_id=$com WHERE p_id=$edit_id";

	 	$run_product = mysqli_query($con,$update_product);


	 	if ($run_product) {
			echo "<script>alert('Product has been updated successfully')</script>";
			echo "<script>window.open('view_products.php','_self');</script>";
		}else{

			echo "<script>alert('Product updation was not successful, error occured')";
			echo "<script>window.open('view_products.php','_self');</script>";

		}
	 } 
?>


		<div class="row mt-5">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;">Dashboard </a>
					</li>

					<li class="breadcrumb-item active">
						Edit Product
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title" style="display: inline;">Edit Product</h4>
						<a href="index.php?view_products" class="btn btn-primary float-right">Cancel Edit</a>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="productTitle">Product Name *</label> 

							    <div class="col-md-6">

							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,40}" name="product_name" id="productTitle" value="<?php echo($edit_name); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field using alphabets and spaces only and max length 40 characters')"> 

							    </div>

							</div>



							<div class="form-group row">

								<label class="col-form-label col-md-3" for="formula">Formulation *</label> 

							    <div class="col-md-6">

							    	<input class="form-control" type="text" pattern="[A-Za-z0-9 ]{1,40}" name="formulation" id="formula" value="<?php echo($edit_formu); ?>" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field using alphabets and spaces only and max length 40 characters')"> 
							    	
							    </div>
							</div>



							<div class="form-group row">

								<label class="col-form-label col-md-3" for="productCategory">Category *</label> 

							    <div class="col-md-6">

							    	<select class="form-control" name="product_cat" id="productCategory" required>

							    		<option disabled="disabled"> Select a Product Category </option>

							    		<?php 

							    		$get_p_cat = "SELECT cat_id,cat_name FROM product_cat WHERE status=1";

							    		$run_p_cat = mysqli_query($con,$get_p_cat);

							    		while ($row_p_cat=mysqli_fetch_array($run_p_cat)):

							    			$cat_id = $row_p_cat["cat_id"];

							    			$cat_name = $row_p_cat["cat_name"];
							    		?>

							    			<option value='<?php echo($cat_id); ?>' <?php if ($cat_id==$edit_id) echo ("selected='true'"); ?> > <?php echo ($cat_name); ?> </option>


							    		<?php endwhile; ?>

							    		
							    	</select> 
							    </div>
							</div>


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="Companies">Company *</label> 

							    <div class="col-md-6">

							    	<select class="form-control" name="com" id="Companies" required>

							    		<option selected="true" disabled="disabled"> Select a Company </option>
							    		<?php 

							    		$get_com = "SELECT * FROM companies";

							    		$run_com = mysqli_query($con,$get_com);

							    		while ($row_com=mysqli_fetch_array($run_com)):

							    			$com_id = $row_com["com_id"];

							    			$com_title = $row_com["com_name"];
							    		?>

							    			<option value='<?php echo($com_id); ?>' <?php if ($com_id==$edit_com) echo ("selected='true'"); ?>> <?php echo ($com_title); ?> </option>
							    		
							    		<?php endwhile; ?>
							    	</select> 
							    </div>
							</div>


							<div class="form-group row">

								<label class="col-form-label col-md-3" for="productImage1">Product Image 1 *</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="product_img1" id="productImage1" required>
							    	<br>
							    	<img class="edit-products-img" src="products_pictures/<?php echo($edit_img1); ?>"> 

							    </div>

							</div>




							<div class="form-group row">

								<label class="col-form-label col-md-3" for="productImage2">Product Image 2</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="product_img2" id="productImage2">
							    	<br>
							    	<img class="edit-products-img" src="products_pictures/<?php echo($edit_img2); ?>">

							    </div>

							</div>




							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="productImage3">Product Image 3</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="product_img3" id="productImage3">

							    	<br>

							    	<?php if (!empty($edit_img3)): ?>
							    		
							    		<img class="edit-products-img" src="products_pictures/<?php echo($edit_img3); ?>"> 

							    	<?php endif ?>							    	

							    </div>

							</div>



							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="productImage4">Product Image 4</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="product_img4" id="productImage4">

							    	<br>

							    	<?php if (!empty($edit_img4)): ?>
							    		
							    		<img class="edit-products-img" src="products_pictures/<?php echo($edit_img4); ?>"> 

							    	<?php endif ?>		 

							    </div>

							</div>	
							


							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="fea">Featured</label> 

							    <div class="col-md-6">

							    	<?php 

							    		$get_feat = "SELECT COUNT(p_id) as countFeat FROM products WHERE featured=1";

							    		$run_feat = mysqli_query($con,$get_feat);

							    		$row_feat = mysqli_fetch_array($run_feat);

							    		$featCount = $row_feat["countFeat"];

							    	?>

							    	<?php if ($featCount<4): ?>

							    		<input type="checkbox" class="fea-check" value="1" <?php if ($edit_feat==1) echo "checked"; ?> name="featured" id="fea"> 

							    	<?php endif ?>

							    	<?php if ($featCount>=4): ?>

							    		<p class="text-warning">You already have 4 products which are featured. If you want to feature this product kindly <b>remove one from Featured Products List</b> in the dashboard page</p>
							    		<input type="checkbox" class="fea-check d-none" value="1" <?php if ($edit_feat==1) echo "checked"; ?> name="featured" id="fea">

							    		
							    	<?php endif ?>

							    </div>

							</div>


							<div class="form-group row">

								<label class="col-form-label col-md-3" for="productDesc">Product Description</label> 

							    <div class="col-md-6">

							    	<textarea class="form-control" name="product_desc" id="productDesc" cols="19" rows="6"><?php echo ($edit_desc); ?></textarea> 

							    </div>
							</div>

							<div class="form-group mt-5 row">   
							    <div class="offset-md-3 col-md-6">
							    	<input class="btn btn-success" style="width: 100%;" value="Update Product" type="submit" name="update"> 
							    </div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
