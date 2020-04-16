    <?php

    $page = 'details';
    
      include('includes/DBconn.php'); 

      include('includes/headertop.php'); 

    ?>

<style>
  
  .slider_innerdiv
  {
    width: 100%;
    object-fit: cover !important;
  }
  @media (min-width: 666px)
  {
    .next-prev-text
    {
      font-size: 2vw !important;
    }

  }

  .carousel .indicators .indicator-item {

    background-color: rgb(25, 118, 210,0.5);

  }
  .carousel .indicators .indicator-item.active{
    background-color: #1976d2;

  }
  .mob-img-slider
  {
    height: 500px;
    object-fit: cover;
  }
  .slider-cursor
  {
    cursor: zoom-in;
  }
</style>



  </head>
  <body>


    <?php

      include('includes/headernav.php'); // for including the whole navbar

    ?>

    <?php 

    	$sentProductId = $_GET["proIdDetails"];

    	$getProductDetail = "SELECT p_name,p_desc,formulation,img1,img2,img3,img4,com_id FROM products WHERE p_id=$sentProductId";

    	$runProductDetail = mysqli_query($con,$getProductDetail);

    	$rowProductDetail = mysqli_fetch_array($runProductDetail);

    	$proNameDetail = $rowProductDetail["p_name"];

    	$proDescDetail = $rowProductDetail["p_desc"];

    	$proFormDetail = $rowProductDetail["formulation"];

    	$proImg1Detail = $rowProductDetail["img1"];

    	$proImg2Detail = $rowProductDetail["img2"];

    	$proImg3Detail = $rowProductDetail["img3"];

    	$proImg4Detail = $rowProductDetail["img4"];

    	$proComIdDetail = $rowProductDetail["com_id"];

    	$getComDetail = "SELECT * FROM companies WHERE com_id=$proComIdDetail";

    	$runComDetail = mysqli_query($con,$getComDetail);

    	$rowComDetail = mysqli_fetch_array($runComDetail);

    	$proComNameDetail = $rowComDetail["com_name"];



    ?>


      <div class="row">
        <!-- mobile-screen slides -->
        <div class="col s12 center-align hide-on-large-only" style="margin-top: -50px">
          <div class="carousel">

        	<?php if (!empty($proImg1Detail)): ?>
        	        
            	<a class="carousel-item" style="width: 80%;height:80%;" href="#one!">

              		<img src="admin_area/products_pictures/<?php echo($proImg1Detail); ?>" class="mob-img-slider slider-cursor userselect" id="mobsliderimg1"  onclick="mobfullimg()"/>

            	</a>

            <?php endif ?>


            <?php if (!empty($proImg2Detail)): ?>

            	<a class="carousel-item" href="#two!" style="width: 80%;height:80%;">

              		<img src="admin_area/products_pictures/<?php echo($proImg2Detail); ?>" class="mob-img-slider slider-cursor userselect" id="mobsliderimg2" onclick="mobfullimg2()"/>

            	</a>

            <?php endif ?>


            <?php if (!empty($proImg3Detail)): ?>

            	<a class="carousel-item" href="#three!" style="width: 80%;height:80%;">

              		<img src="admin_area/products_pictures/<?php echo($proImg3Detail); ?>" class="mob-img-slider slider-cursor userselect" id="mobsliderimg3" onclick="mobfullimg3()"/>

            	</a>

            <?php endif ?>


            <?php if (!empty($proImg4Detail)): ?>

            	<a class="carousel-item" href="#three!" style="width: 80%;height:80%;">

             		<img src="admin_area/products_pictures/<?php echo($proImg4Detail); ?>" style="object-fit: fill;" class="mob-img-slider slider-cursor userselect" id="mobsliderimg4" onclick="mobfullimg4()"/>

            	</a>

            <?php endif ?>

          </div>
        </div>
      </div>


    <!-- Large-slides -->
    <div class="container">
      <div class="row">

        <div class="col s12">
          <div class="carousel carousel-slider center custom-slider hide-on-med-and-down" data-indicators="true">
              <a href="Previo" id="prev-btn" class="movePrevCarousel next-prev btn-large btn-floating waves-effect waves-light">
                <i class="material-icons next-prev-text">chevron_left</i>
              </a>
               
              <a href="Siguiente" id="next-btn" class=" moveNextCarousel next-prev btn-large btn-floating waves-effect waves-light">
                <i class="material-icons next-prev-text">chevron_right</i>
              </a>


			  <?php if (!empty($proImg1Detail)): ?>

	              	<div class="carousel-item">

	                	<img class="slider_innerdiv slider-cursor userselect" id="sliderimg1" onclick="fullimg()" src="admin_area/products_pictures/<?php echo($proImg1Detail); ?>">

	              	</div>

			  <?php endif ?>


			  <?php if (!empty($proImg2Detail)): ?>	

	              	<div class="carousel-item">

	                	<img class="slider_innerdiv slider-cursor userselect" id="sliderimg2" onclick="fullimg2()" src="admin_area/products_pictures/<?php echo($proImg2Detail); ?>">

	              	</div>

			  <?php endif ?>


			  <?php if (!empty($proImg3Detail)): ?>	

	              	<div class="carousel-item">

	                	<img src="admin_area/products_pictures/<?php echo($proImg3Detail); ?>" onclick="fullimg3()" class="slider_innerdiv slider-cursor userselect" id="sliderimg3">

	              	</div>

			  <?php endif ?>


 			  <?php if (!empty($proImg4Detail)): ?>	             	

	              <div class="carousel-item">

	                <img src="admin_area/products_pictures/<?php echo($proImg4Detail); ?>" onclick="fullimg4()" class="slider_innerdiv slider-cursor userselect" id="sliderimg4">

	              </div>

 			  <?php endif ?>             

          </div>
        </div>

      </div>
    </div>


    <!-- text about slider -->
    <div class="container">
      <div class="row">
        <div class="col s12">
          
          <p class="flow-text center-align blue-grey-text hide-on-med-and-down tip-slider-lg">Click on the image above to enlarge it</p>

          <p class="flow-text center-align blue-grey-text hide-on-large-only tip-slider-sm">Tap on the image above to enlarge it</p>

        </div>
      </div>
    </div>


    <!-- //Product Title -->
    <div class="container">
    	<div class="row">
        	<div class="col s12">
          		<h5 class="blue-text text-darken-2">Product Title</h5>
          		<p>
          			&nbsp &nbsp <?php echo ($proNameDetail); ?>
          		</p>
        	</div>
    	</div>
    </div>


    <!-- //Product Formula -->
    <div class="container">
    	<div class="row">
        	<div class="col s12">
          		<h5 class="blue-text text-darken-2">Formulation</h5>
          		<p>
          			&nbsp &nbsp <?php echo ($proFormDetail); ?>
          		</p>
        	</div>
    	</div>
    </div>

    <?php if (!empty($proDescDetail)): ?>
    	
	    <!-- //Description -->
	    <div class="container">
	    	<div class="row">
	        	<div class="col s12">
	          		<h5 class="blue-text text-darken-2">Description</h5>
	          		<p>
	          			&nbsp &nbsp <?php echo ($proDescDetail); ?>
	          		</p>
	        	</div>
	    	</div>
	    </div>

   <?php endif ?>  



    <!-- //manufactured by -->
    <div class="container">
    	<div class="row">
        	<div class="col s12">
          		<h5 class="blue-text text-darken-2">Manufactured By</h5>
          		<p>
          			&nbsp &nbsp <?php echo ($proComNameDetail); ?>
          		</p>
        	</div>
    	</div>
    </div>


<!-- footer -->

<?php 
  
  include('includes/footer.php');

?>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intense-images/1.0.7/intense.min.js"></script>



<script>
  $(document).ready(function () {

    // if (document.body.clientWidth > 983) {
  
    //carousel
    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true,
    });
    // }



    // move next carousel
    $('.moveNextCarousel').click(function(e){
      e.preventDefault();
      e.stopPropagation();
      $('.carousel').carousel('next');
      clearInterval(slider);
    });

    // move prev carousel
    $('.movePrevCarousel').click(function(e){
      e.preventDefault();
      e.stopPropagation();
      $('.carousel').carousel('prev');
      clearInterval(slider);
    });

    var slider = setInterval(function(e){        
      $('.carousel').carousel('next');
    }, 5000);


  });

function fullimg() {

  var x = document.getElementById('sliderimg1');

  Intense(x);
}

function fullimg2() {

  var x = document.getElementById('sliderimg2');

  Intense(x);
}

function fullimg3() {

  var x = document.getElementById('sliderimg3');

  Intense(x);
}

function fullimg4() {

  var x = document.getElementById('sliderimg4');

  Intense(x);
}


// for mobile intense

function mobfullimg() {

  var x = document.getElementById('mobsliderimg1');

  Intense(x);
}

function mobfullimg2() {

  var x = document.getElementById('mobsliderimg2');

  Intense(x);
}

function mobfullimg3() {

  var x = document.getElementById('mobsliderimg3');

  Intense(x);
}

function mobfullimg4() {

  var x = document.getElementById('mobsliderimg4');

  Intense(x);
}
</script>

</html>







      







