    <?php

    $page = "";
    
      	include('includes/DBconn.php'); 

    	include('includes/headertop.php'); 


    ?>





    <style type="text/css">

      .slider_innerdiv
      {
        background-size: 100% !important;
        background-repeat: no-repeat !important;
        width: 100%;
      }
      @media (min-width: 666px)
      {
        .next-prev-text
        {
          font-size: 2vw !important;
        }

      }

      @media screen and (max-width: 600px) 
      {
        .counter-icons
	      {
	        font-size: 3vw !important;
	      }
      }
      nav {
          margin-top: 25px;
      }
    </style>


  </head>


  <body>

  	<div class="row marqu">
  		<div class="LU left">
    		<b class="white-text"> &nbspLatest Updates:</b>
   		</div>
   		<div class="MU right">
        <?php 

          $getMarquee = "SELECT * FROM marquee_lu LIMIT 1";

          $runMarquee = mysqli_query($con,$getMarquee);

          $rowMarquee = mysqli_fetch_array($runMarquee);

          $mNews = $rowMarquee["news"];          

        ?>

   		<marquee behavior="scroll" direction="left"> <?php echo ($mNews); ?></marquee>


   		</div>
    </div>



    <?php

    	include('includes/headernav.php'); // for including the whole navbar

    ?>


<!-- slider -->

<div class="carousel carousel-slider center custom-slider" data-indicators="true">
    <a href="Previo" id="prev-btn" class="movePrevCarousel next-prev btn-large btn-floating waves-effect waves-light">
      <i class="material-icons next-prev-text">chevron_left</i>
    </a>
     
    <a href="Siguiente" id="next-btn" class=" moveNextCarousel next-prev btn-large btn-floating waves-effect waves-light">
      <i class="material-icons next-prev-text">chevron_right</i>
    </a>

    <!-- slider data retriveal from database -->

    <?php

      $getSlider = "SELECT * FROM slider";

      $runSlider = mysqli_query($con,$getSlider);

      while ($rowSlider=mysqli_fetch_array($runSlider)):
          
          $sImg = $rowSlider["img"];
          $sText = $rowSlider["slide_text"];


        if (!empty($sImg)): ?>      
        
          <div class="carousel-item white-text slider_innerdiv" style="background-image: url('admin_area/slide_images/<?php echo ($sImg); ?>'">
         
            <?php if (!empty($sText)): ?>

              <h1 class="slider-text"><?php echo ($sText); ?></h1>
          
            <?php endif; ?>

          </div>

        <?php endif; ?>

    <?php endwhile; ?>


</div>

<!-- founders message -->
<div class="container about-us-container">
  <div class="row">

    <!-- founder data retriveal from database -->

    <?php 

      $getFounder = "SELECT * FROM founder";

      $runFounder = mysqli_query($con,$getFounder);

      $rowFounder = mysqli_fetch_array($runFounder);

      $fImg = $rowFounder["f_img"];

      $fName = $rowFounder["f_name"];

      $fPosition = $rowFounder["f_position"];

      $fMessage = $rowFounder["f_message"];

    ?>
     <div class="col offset-s3 s6 m5 offset-l1 l4">

      <img src="images/founder/<?php echo($fImg) ?>"  class="about-img circle responsive-img " alt="Owner's picture">

      <p class="center-align" id="about-img-text-h"><?php echo($fName); ?></p>

      <p class="center-align" id="about-img-text">(<?php echo($fPosition); ?>)</p>

     </div>

     <div class="col offset-s1 s1">

       <div class="divider about-us-divider center hide-on-small-and-down"></div>

     </div>


    <div class="col s12 m5 ">

      <h3 class="left-align blue-text text-darken-3 about-text-h ">Founder's message</h3>

      <p class="left-align grey-text text-darken-3 about-text">
        <?php echo($fMessage); ?>
      </p>

    </div>


  </div>
</div>


 <!-- counter up -->


 <div class="counter-up blue darken-1 ">
   <div class="container center">
     <div class="row ">

       <div class="col s4">
         <span class="counter white-text right-align">

           <!-- retriving numbers of countries for counter up -->

          <?php 

            $get_comCount = "SELECT COUNT(com_id) as countcom FROM companies";

            $run_comCount = mysqli_query($con,$get_comCount);

            $row_comCount = mysqli_fetch_array($run_comCount);

            echo ($row_comCount["countcom"]);

          ?>

         </span>
          <h6 class="white-text counter-text">Companies </h6>
          <i class=" material-icons white-text counter-icons">business</i>
       </div>


       <div class="col s4">
         <span class="counter white-text right-align">

          <!-- retriving numbers of countries for counter up -->

          <?php 

            $get_proCount = "SELECT COUNT(p_id) as countpro FROM products";

            $run_proCount = mysqli_query($con,$get_proCount);

            $row_proCount = mysqli_fetch_array($run_proCount);

            echo ($row_proCount["countpro"]);

          ?>

         </span>
         <h6 class="white-text counter-text" >Products </h6>
         <i class=" material-icons white-text counter-icons">apps</i>
       </div>

       <div class="col s4">
         <span class="counter white-text right-align">2004</span>
          <h6  class="white-text counter-text">Working Since</h6>
          <i class=" material-icons white-text counter-icons">timeline</i>
       </div>
     </div>
   </div>
 </div>

 <!-- featured products -->
 <div class="row featured-wrapper grey lighten-5 " data-scroll>
   <div class="col s1">
     <div class="blue darken-2 featured-products"></div>
   </div>
   <div class="col s11  valign-wrapper ">
     <p class="featured-txt grey-text text-darken-2">Featured products</p>
   </div>
 </div>
 <!-- display cards //featured -->
 
 <div class="row card-wrapper" data-scroll>

 	<?php

 		$get_feature_pro = "SELECT p_id,p_name,formulation,img1 FROM products WHERE featured=1 LIMIT 4";

		$run_feature_pro = mysqli_query($con,$get_feature_pro);

		while($row_feature_pro=mysqli_fetch_array($run_feature_pro)):

			$p_id_feature_pro = $row_feature_pro["p_id"];		

			$p_name_feature_pro = $row_feature_pro["p_name"];

			$formulation_feature_pro = $row_feature_pro["formulation"];

			$img1_feature_pro = $row_feature_pro["img1"];		

 	?>


		    <div class="col offset-s1 s10 m6 l3">
		      <div class="card card-hover">

		        <div class="card-image">

		          <a href="details.php?proIdDetails=<?php echo($p_id_feature_pro); ?>"><img src="admin_area/products_pictures/<?php echo ($img1_feature_pro); ?>" class="img_custom_index"></a>

		        </div>

		        <div class="card-content">
		          <a href="details.php?proIdDetails=<?php echo($p_id_feature_pro); ?>">
		            <h5 class="blue-text text-darken-2"><?php echo ($p_name_feature_pro); ?></h5>
		            <p class="black-text"><?php echo ($formulation_feature_pro); ?></p>
		          </a>
		        </div>

		        <a href="details.php?proIdDetails=<?php echo($p_id_feature_pro); ?>">
		          <div class="card-action card-details-text">
		            Details
		          </div>
		        </a>

		      </div>
		    </div>

		<?php endwhile; ?>

 </div>
 
 <!-- latest products -->
 <div class="row featured-wrapper grey lighten-5" data-scroll>
   <div class="col s1">
     <div class="blue darken-2 featured-products"></div>
   </div>
   <div class="col s11  valign-wrapper ">
     <p class="featured-txt grey-text text-darken-2">Latest products</p>
   </div>
 </div>
 <!-- latest products cards -->
 <div class="row card-wrapper" data-scroll>

  <?php

 		$get_latest_pro = "SELECT p_id,p_name,formulation,img1 FROM products ORDER BY p_id DESC LIMIT 4";

		$run_latest_pro = mysqli_query($con,$get_latest_pro);

		while($row_latest_pro=mysqli_fetch_array($run_latest_pro)):

			$p_id_latest_pro = $row_latest_pro["p_id"];		

			$p_name_latest_pro = $row_latest_pro["p_name"];

			$formulation_latest_pro = $row_latest_pro["formulation"];

			$img1_latest_pro = $row_latest_pro["img1"];		

 	?>

	    <div class="col offset-s1 s10 m6 l3">
	      <div class="card card-hover">

	        <div class="card-image">
	          <a href="details.php?proIdDetails=<?php echo($p_id_latest_pro); ?>"><img src="admin_area/products_pictures/<?php echo($img1_latest_pro); ?>" class="img_custom_index"></a>
	        </div>

	        <div class="card-content">
	          <a href="details.php?proIdDetails=<?php echo($p_id_latest_pro); ?>">
	            <h5 class="blue-text text-darken-2"><?php echo($p_name_latest_pro); ?></h5>
	            <p class="black-text"><?php echo($formulation_latest_pro); ?></p>
	          </a>
	        </div>

	        <a href="details.php?proIdDetails=<?php echo($p_id_latest_pro); ?>">
	          <div class="card-action card-details-text">
	            Details
	          </div>
	        </a>

	      </div>
	    </div>

	<?php endwhile; ?>
   
 </div>

 <!-- section before footer -->

<div class="container">
  <div class="row">
    <div class="col s12 allpro-link">
      <a href="products.php" class="all-products blue-text center-align">All products <i class="material-icons icon-all-products">chevron_right</i></a>
    </div>
  </div>
</div>

<!-- footer -->

<?php 
  
  include('includes/footer.php');

?>
    
  <!-- counter up library -->
  <script src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <!-- scroll library -->
  <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>


 


<script>
    M.AutoInit();
    //dropdown 
    $(document).ready(function () {
  
      //carousel
      $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
      });
      

      // move next carousel
     $('.moveNextCarousel').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.carousel').carousel('next');
        $(".slider-text").hide();
        $(".slider-text").fadeIn(2500);
        clearInterval(slider);
     });

     // move prev carousel
     $('.movePrevCarousel').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.carousel').carousel('prev');
        $(".slider-text").hide();
        $(".slider-text").fadeIn(2500);
        clearInterval(slider);
     });


     var slider = setInterval(function(e){        
        $('.carousel').carousel('next');
        $(".slider-text").hide();
        $(".slider-text").fadeIn(2500);
     }, 5000);

     //counter_up
  	 $('.counter').counterUp({
  		  delay: 10,
  		  time: 2000
  	  });

    ScrollOut({
      once : true
    });  
      
  });
    
</script>

</body>
</html>
