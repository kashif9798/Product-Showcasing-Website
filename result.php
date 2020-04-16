
    <?php

	    $page = 'search';

		if (isset($_GET["result_query"])) 
		{
			$result_query = preg_replace('/\s+/', ' ',$_GET["result_query"]);
		}


	    include('includes/DBconn.php'); 

	    include('includes/headertop.php'); 

    ?>





  </head>
  <body>


    <?php

      include('includes/headernav.php'); 

    ?>

    <style>
    	.mar-t
    	{
    		margin-top: 65px;
    	}
    	#text-search
    	{
    		display: inline;
    	}
    	.text-search-p
    	{
    		font-size: 20px !important;
    	}
		/*table Styling*/

		.img_table
		{
		  object-fit: cover;
		  box-shadow: 0 1px 1px rgba(0,0,0,0.5);
		  border-radius: 5px;
		}
		@media(min-width: 992px)
		{
		  .img_table
		  {
		    width: 80px !important;
		    height: 80px !important;
		  }
		}
		@media(max-width: 991px)
		{ 
		/*  #text_table
		  {
		    font-size: 12px;
		  }*/
		  .img_table
		  {
		    width: 50px !important;
		    height: 50px !important;
		  }
		}



    </style>


    <!-- //search text -->
    <div class="container mar-t">
    	<div class="row">
        	<div class="col s12">
          		<h5 class="blue-text text-darken-2" id="text-search">Search: &nbsp</h5> 
          		<p id="text-search" class="text-search-p blue-grey-text text-darken-2"><?php echo ($result_query); ?></p>
        	</div>
    	</div>
    </div>


    <!-- search table -->

    <div class="container mar-t">

    	<div class="row">

    		<div class="col s12">

			    <table class="responsive-table highlight centered">

			        <thead>

			          <tr>
			              <th>Product Title</th>
			              <th>Formulation</th>
			              <th>Image</th>
			              <th>Action</th>
			          </tr>

			        </thead>


			        <tbody>

					<?php 

						$get_pro_res = "SELECT p_id,p_name,formulation,img1 FROM products WHERE p_name LIKE '%$result_query%' || formulation LIKE '%$result_query%'";

						$run_pro_res = mysqli_query($con,$get_pro_res);

						while ($row_pro_res = mysqli_fetch_array($run_pro_res)):

							$pro_id_res = $row_pro_res["p_id"];

							$pro_name_res = $row_pro_res["p_name"];

							$pro_form_res = $row_pro_res["formulation"];

							$pro_img1_res = $row_pro_res["img1"];

					?>

			          <tr>

			            <td><a href="details.php?proIdDetails=<?php echo($pro_id_res); ?>" class="blue-grey-text text-darken-4" id="text_table"><?php echo ($pro_name_res); ?></a></td>

			            <td><a href="details.php?proIdDetails=<?php echo($pro_id_res); ?>" class="blue-grey-text text-darken-4" id="text_table"><?php echo ($pro_form_res); ?></a></td>

			            <td>

			            	<a href="details.php?proIdDetails=<?php echo($pro_id_res); ?>">

			            		<img src="admin_area/products_pictures/<?php echo ($pro_img1_res); ?>" class="img_table" >

			            	</a>

			            </td>

			            <td>

			            	<a href="details.php?proIdDetails=<?php echo($pro_id_res); ?>" class="waves-effect waves-light btn-small btn-flat blue white-text">details</a>

			            </td>

			          </tr>

			        <?php endwhile; ?>

			      </tbody>

			    </table>

			</div>

    	</div>

    </div>

    <div class="mar-t" style="visibility: hidden;">dont remove</div>
<!-- footer -->

<?php 
  
  include('includes/footer.php');

?>


</body>

</html>
