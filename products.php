    <?php

      if (!empty($_GET["comId"])) {

      	$comId_pro = $_GET["comId"];
      }
      
      if (!empty($_GET["catId"])) {

      	$catId_pro = $_GET["catId"];
      }

      $page = 'products';
    	   
      include('includes/DBconn.php'); 
      
      include('includes/headertop.php'); 

    ?>





  </head>
  <body>
    <?php

      include('includes/headernav.php'); // for including the whole navbar

    ?>



<!-- breadcrumbs -->
    <div class="row">
        <div class="col s12">
            <ul class="breadcrumb-list">
                <li><a href="index.php">Home</a></li>/

                <?php if(!empty($catId_pro)): 


		            $get_procat = "SELECT cat_name FROM product_cat Where cat_id=$catId_pro";

		            $run_procat = mysqli_query($con,$get_procat);

		            $row_procat = mysqli_fetch_array($run_procat);

		            $proCatName = $row_procat["cat_name"];


               ?>


                	<li><a href="products.php">Products</a></li>/

                	<li><a class="blue-grey-text text-lighten-2"><?php echo ($proCatName); ?></a></li>

            	<?php endif; ?>




                <?php if(!empty($comId_pro)): 


		            $get_procom = "SELECT com_name FROM companies Where com_id=$comId_pro";

		            $run_procom = mysqli_query($con,$get_procom);

		            $row_procom = mysqli_fetch_array($run_procom);

		            $proComName = $row_procom["com_name"];


               ?>


                	<li><a class="blue-grey-text text-lighten-2">Companies</a></li>/

                	<li><a class="blue-grey-text text-lighten-2"><?php echo ($proComName); ?></a></li>

            	<?php endif; ?>




                <?php if(empty($catId_pro) && empty($comId_pro)): ?>


                	<li><a class="blue-grey-text text-lighten-2">Products</a></li>/

                	<li><a class="blue-grey-text text-lighten-2">All Products</a></li>

            	<?php endif; ?>

            </ul>
        </div>
    </div>

<!-- cards-section -->

<div class="row card-wrapper">

	<?php 

		$perPage=8;

		if (!empty($_GET["paginationId"])) {

			$paginationNo = $_GET["paginationId"];

		}else{

			$paginationNo = 1;

		}

		$startFrom = ($paginationNo-1) * $perPage;

		if(!empty($catId_pro))
		{

			$get_products = "SELECT p_id,p_name,formulation,img1 FROM products WHERE cat_id=$catId_pro ORDER BY p_name ASC LIMIT $startFrom,$perPage";

			$get_pagCount = "SELECT COUNT(p_id) as count_pro FROM products WHERE cat_id=$catId_pro"; //for pagination used at the end of the page
			

		}

		if(!empty($comId_pro))
		{

			$get_products = "SELECT p_id,p_name,formulation,img1 FROM products WHERE com_id=$comId_pro ORDER BY p_name ASC LIMIT $startFrom,$perPage";

			$get_pagCount = "SELECT COUNT(p_id) as count_pro FROM products WHERE com_id=$comId_pro"; //for pagination used at the end of the page

		}

		if(empty($catId_pro) && empty($comId_pro))
		{

			$get_products = "SELECT p_id,p_name,formulation,img1 FROM products ORDER BY p_name ASC LIMIT $startFrom,$perPage";

			$get_pagCount = "SELECT COUNT(p_id) as count_pro FROM products"; //for pagination used at the end of the page

		}

		$run_products = mysqli_query($con,$get_products);

		while($row_products=mysqli_fetch_array($run_products)):

			$p_id_products = $row_products["p_id"];		

			$p_name_products = $row_products["p_name"];

			$formulation_products = $row_products["formulation"];

			$img1_products = $row_products["img1"];		

	?>	

		    <div class="col offset-s1 s10 m6 l3">
		      <div class="card card-hover">

		        <div class="card-image">
		          <a href="details.php?proIdDetails=<?php echo($p_id_products); ?>"><img src="admin_area/products_pictures/<?php echo($img1_products); ?>" class="img_custom_index"></a>
		        </div>

		        <div class="card-content">
		          <a href="details.php?proIdDetails=<?php echo($p_id_products); ?>">
		            <h5 class="blue-text text-darken-2"><?php echo ($p_name_products); ?></h5>
		            <p class="black-text"><?php echo ($formulation_products); ?></p>
		          </a>
		        </div>

		        <a href="details.php?proIdDetails=<?php echo($p_id_products); ?>">
		          <div class="card-action card-details-text">
		            Details
		          </div>
		        </a>

		      </div>
		    </div>

    	<?php endwhile; ?>

</div>
 

<!-- pagination -->
<div class="row">
    <div class="container">
        <div class="col s12">
            <ul class="pagination center-align text-blue">

	        <?php 

	            $run_pagCount = mysqli_query($con,$get_pagCount);

	            $row_pagCount = mysqli_fetch_array($run_pagCount);

	            $totalRecords = $row_pagCount["count_pro"];

				$totalPages = ceil($totalRecords / $perPage);   			

	        ?>	

            <!-- left symbol of pagination -->	        

	        <?php if ($paginationNo==1): ?>

                <li class="waves-effect disabled"><a><i class="material-icons">chevron_left</i></a></li>

	        <?php endif; ?>

	        <?php if ($paginationNo!=1): ?>

	        	<li class="waves-effect"><a href="products.php?paginationId=<?php echo((int)$paginationNo-1); if (!empty($_GET['comId'])) {echo('&comId='.$comId_pro);} if (!empty($_GET['catId'])) {echo('&catId='.$catId_pro);} ?>"><i class="material-icons">chevron_left</i></a></li>
	        	
	        <?php endif; ?>


	        <!-- pagination numbers dynamics -->

	        <?php for ($i=1; $i <= $totalPages; $i++): ?>

	        	<?php if ($paginationNo == $i): ?>

                	<li class="waves-effect active"><a><?php echo($i); ?></a></li>

                <?php endif; ?>

                <?php if ($paginationNo != $i): ?>

                	<li class="waves-effect">

                		<a href="products.php?paginationId=<?php echo($i); if (!empty($_GET['comId'])) {echo('&comId='.$comId_pro);} if (!empty($_GET['catId'])) {echo('&catId='.$catId_pro);} ?>">
                			<?php echo($i); ?>                				
                		</a>
                	</li>

                <?php endif; ?>

            <?php endfor; ?>




            <!-- right symbol of pagination -->

	        <?php if ($paginationNo == $totalPages): ?>

                <li class="waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>

	        <?php endif; ?>

	        <?php if ($paginationNo != $totalPages): ?>

                <li class="waves-effect"><a href="products.php?paginationId=<?php echo((int)$paginationNo+1); if (!empty($_GET['comId'])) {echo('&comId='.$comId_pro);} if (!empty($_GET['catId'])) {echo('&catId='.$catId_pro);} ?>"><i class="material-icons">chevron_right</i></a></li>


	        <?php endif; ?>

            </ul>
        </div>
    </div>
</div>

<!-- footer -->

<?php 
  
  include('includes/footer.php');

?>

</body>

</html>
