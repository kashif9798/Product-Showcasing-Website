<?php

	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

    $get_admin_dash = "SELECT admin_image,admin_email,admin_job,admin_contact FROM admins WHERE admin_email = '$admin_session'";

    $run_admin_dash = mysqli_query($con,$get_admin_dash);

    $row_admin_dash = mysqli_fetch_array($run_admin_dash);

    $admin_email = $row_admin_dash["admin_email"];

    $admin_image = $row_admin_dash["admin_image"];

    $admin_contact = $row_admin_dash["admin_contact"];

    $admin_job = $row_admin_dash["admin_job"];



    $get_count_products = "SELECT COUNT(p_id) as countProducts FROM products";

    $run_count_products = mysqli_query($con,$get_count_products);

    $row_count_products = mysqli_fetch_array($run_count_products);

    $count_products = $row_count_products["countProducts"];



    $get_count_category = "SELECT COUNT(cat_id) as countcategories FROM product_cat WHERE status=1";

    $run_count_category = mysqli_query($con,$get_count_category);

    $row_count_category = mysqli_fetch_array($run_count_category);

    $count_category = $row_count_category["countcategories"];




    $get_count_companies = "SELECT COUNT(com_id) as countcompanies FROM companies";

    $run_count_companies = mysqli_query($con,$get_count_companies);

    $row_count_companies = mysqli_fetch_array($run_count_companies);

    $count_companies = $row_count_companies["countcompanies"];



    $get_count_policy = "SELECT COUNT(id) as countPolicy FROM policy";

    $run_count_policy = mysqli_query($con,$get_count_policy);

    $row_count_policy = mysqli_fetch_array($run_count_policy);

    $count_policy = $row_count_policy["countPolicy"];

?>



<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header pl-3 mb-4 display-4 pt-5">Dashboard</h1>
	</div>
</div>

<div class="row">

	<div class="col-md-6 col-lg-3 mt-4">

    	<div class="card">

     		<div class="card-body bg-primary text-light">

       				<div class="card-title dash-card-text">

       					Products

                <span class="huge float-right">

                  <?php echo $count_products; ?>

                </span>

       				</div>

      		</div>

      		<a href="view_products.php" class="btn-outline-primary dash-card-link">

            <div class="card-footer">View Details</div>

    		  </a>

    	</div>
    	
	</div>



  <div class="col-md-6 col-lg-3 mt-4">

      <div class="card">

        <div class="card-body bg-success text-light">

              <div class="card-title dash-card-text">

                Active Categories

                <span class="huge float-right">

                  <?php echo $count_category; ?>

                </span>

              </div>

          </div>

          <a href="index.php?view_p_cats" class="btn-outline-success dash-card-link">

            <div class="card-footer">View Details</div>

          </a>

      </div>
      
  </div>




  <div class="col-md-6 col-lg-3 mt-4">

      <div class="card">

        <div class="card-body bg-danger text-light">

              <div class="card-title dash-card-text">

                Companies

                <span class="huge float-right">

                  <?php echo $count_companies; ?>

                </span>

              </div>

          </div>

          <a href="index.php?view_com" class="btn-outline-danger dash-card-link">

            <div class="card-footer">View Details</div>

          </a>

      </div>
      
  </div>




  <div class="col-md-6 col-lg-3 mt-4">

      <div class="card">

        <div class="card-body bg-dark text-light">

              <div class="card-title dash-card-text">

                Policy

                <span class="huge float-right">

                  <?php echo $count_policy; ?>

                </span>

              </div>

          </div>

          <a href="index.php?view_policy" class="btn-outline-dark dash-card-link">

            <div class="card-footer">View Details</div>

          </a>

      </div>
      
  </div>

</div>








<div class="row">




  <!-- Featured products table -->

  <div class="col-lg-8 mt-5">
    
    <div class="card">
      
      <div class="card-header bg-primary text-white">
        
        <h5 class="card-title">
          
          Featured Products List <span class="dash-lf-text float-right text-warning">Must be exactly 4 products</span>

        </h5>

      </div>


      <div class="table-responsive">
          
          <table class="table table-hover table-striped table-bordered">
            
            <thead>
              <tr>
                <th>Name:</th>
                <th>Image:</th>
                <th>Action:</th>
              </tr>
            </thead>

            <tbody>

            <!-- Featured Products Retrieval -->

            <?php

              $get_feature_pro = "SELECT p_id,p_name,img1 FROM products WHERE featured=1";

              $run_feature_pro = mysqli_query($con,$get_feature_pro);

              while($row_feature_pro=mysqli_fetch_array($run_feature_pro)):

                $p_id_feature_pro = $row_feature_pro["p_id"];

                $p_name_feature_pro = $row_feature_pro["p_name"];

                $img1_feature_pro = $row_feature_pro["img1"];   

            ?>


              <tr>

                <td>
                  <?php echo ($p_name_feature_pro); ?>
                </td>

                <td>
                  <img src="products_pictures/<?php echo($img1_feature_pro); ?>" class="img-lu">
                </td>

                <td>

                    <a href="remove_feature_list_item.php?removeId=<?php echo($p_id_feature_pro); ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Remove</a>

                </td>

              </tr>

            <?php endwhile; ?>



            </tbody>

          </table>

      </div>

    </div>

  </div>





  <!-- admin data -->

  <div class="col-lg-4 mt-5">

		<div class="card">
			<div class="card-header">

    		<img class="card-img-top rounded-circle img-fluid" src="admin_images/<?php echo $admin_image; ?>" alt="Card image"></div>

    		<div class="card-body">

      			<h4 class="card-title text-center"><?php echo $admin_name; ?></h4>

     			<p class="card-text text-center"><?php echo $admin_job; ?></p>

    		</div>

    		<div class="card-footer">

    			<div class="mb-md">
    				
    				<div class="widget-content-expanded">
    					
    				  <span class="pr-4">Email:</span> <?php echo $admin_email; ?><br>

    				  <span class="pr-2">Contact:</span> 0<?php echo $admin_contact; ?><br>

    				</div>

    			</div>

    		</div>

		</div>

	</div>


</div>

<br><br><br>