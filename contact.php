    <?php

    $page = 'contact';
    
      include('includes/DBconn.php');
      
      include('includes/headertop.php'); 

    ?>

    <style>
      
      .contact-div
      {
        padding-bottom: 50px !important;
      }

      .contact-div p
      {
        margin-top: 10px;
        font-weight: 550;
      }
      .contact-div h4
      {
        margin-bottom: 30px;
      }
    </style>



  </head>
  <body>


    <?php

      include('includes/headernav.php'); 

    ?>


        <!-- contact data retrieval -->

        <?php
      
         $get_contact = "SELECT * FROM contact";

         $run_contact = mysqli_query($con,$get_contact);

         $row_contact = mysqli_fetch_array($run_contact);

         $cTel1 = $row_contact["tel1"];

         $cTel2 = $row_contact["tel2"];

         $cTel3 = $row_contact["tel3"];

         $cfacebook = $row_contact["facebook"];

         $cInstagram = $row_contact["instagram"];

         $cGmail1 = $row_contact["gmail1"];

         $cGmail2 = $row_contact["gmail2"];

         $cAddress = $row_contact["Address"];

    ?>

    <!-- parallex temp -->
    <div id="index-banner" class="parallax-container">
      <div class="parallax">
        <img src="images/parallax/contact1.jpg" alt="contact img 1" />
      </div>
    </div>

    <div class="api-section">
      <div class="section">
        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12">
            <div class="icon-block">
              <h4 class="center brown-text text-darken-1">
                <i class="material-icons" style="color: #de5246;">place</i>
                Find Us Here
              </h4>
              <div id="map">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="parallax-container valign-wrapper">
      <div class="parallax">
        <img src="images/parallax/contact2.jpg" alt="contact img 2" />
      </div>
    </div>

    <div class="container pl-contact-us">
      <div class="section">
        <div class="row">
          <div class="col s12 center contact-div">
            <h4 class="brown-text text-darken-1">Contact Us</h4>

              <p>

                You can catch us On

                <?php if(!empty($cfacebook)): ?>

                  <a href="<?php echo($cfacebook); ?>" target="_blank"> Facebook</a>

                <?php endif; ?>

                <?php if(!empty($cInstagram)): ?>

                  <a href="<?php echo($cInstagram); ?>" target="_blank"> , Instagram</a>

                <?php endif; ?>

              </p>


            <p class="center-align grey-text text-darken-3">
              Phone : 0<?php echo ($cTel1); ?><?php if(!empty($cTel2)): ?> , 0<?php echo ($cTel2); ?><?php endif; ?><?php if(!empty($cTel3)): ?> , 0<?php echo ($cTel3); ?><?php endif; ?>
            </p>
           

            <p class="center-align grey-text text-darken-3">
              Email: <?php echo ($cGmail1); ?><?php if(!empty($cGmail2)): ?> , <?php echo ($cGmail2); ?><?php endif; ?>
            </p>

            <p class="center-align grey-text text-darken-3">
              Office Hours: Monday - Saturday from 9 AM to 6 PM
            </p>

            <p class="center-align grey-text text-darken-3">
              Address: <?php echo ($cAddress); ?>
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="parallax-container valign-wrapper pl-con-last">
      <div class="parallax">
        <img src="images/parallax/contact3.jpg" alt="contact img 3" />
      </div>
    </div>
    
  <!-- footer -->

  <?php 
    
    include('includes/footer.php');

  ?>
      
  </body>

  <script>

    // map
    function myMap()
	  {
	  	   var positionMap = {lat:33.983821, lng:71.530045};
	  	   var map  = new google.maps.Map(document.getElementById('map') ,
	  	   {
	  	   	 zoom:17,
	  	   	 center:positionMap
	  	   });

	  	   var marker = new google.maps.Marker({
	  	   	position:positionMap,
	  	   animation: google.maps.Animation.BOUNCE
	  	   });

	  	   marker.setMap(map, marker);

	  	   var infowindow = new google.maps.InfoWindow({
	  	   		content: 'Medlea Pharmaceuticals'
	  	   });

	  	   infowindow.open(map,marker);
	  	   
	  }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTbYZF_kDxKNopcvej6oh-eVs1z9Xq2J0&callback=myMap"></script>
</html>

