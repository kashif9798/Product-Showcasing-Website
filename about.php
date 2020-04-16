
    <?php

    $page = 'about';

      include('includes/DBconn.php'); 

      include('includes/headertop.php'); 

    ?>





  </head>
  <body>


    <?php

      include('includes/headernav.php'); 

    ?>





  <!-- parallex temp -->
    <div id="index-banner" class="parallax-container">
      <div class="parallax">
        <img src="images/parallax/about1.jpg" alt="about img 1" />
      </div>
    </div>


    <!-- mession objective data retriveal from database -->
    <?php
      
      $get_mo = "SELECT * FROM message_objective";

      $run_mo = mysqli_query($con,$get_mo);

      $row_mo = mysqli_fetch_array($run_mo);
          
      $moMessage = $row_mo["message"];

      $moObjective = $row_mo["objective"];

    ?>

    <!-- mission objective container -->
    <div class="container">
      <div class="section">
        <!--   Icon Section   -->
        <div class="row miss-obj-row">
          <div class="col s12 m6 mission center-align">
            <h4 class="brown-text text-darken-1">Mission</h4>
            <p><?php echo ($moMessage); ?></p>
          </div>
          <div class="objective col s12 m6 center-align">
            <h4 class="brown-text text-darken-1">Objective</h4>
            <p><?php echo ($moObjective); ?></p>
          </div>
        </div>
      </div>
    </div>




    <div class="parallax-container valign-wrapper">

      <div class="parallax">
        <img src="images/parallax/about2.jpg" alt="about img 2" />
      </div>
    </div>



    <!-- policy container container -->
    <div class="container">
      <div class="section">
        <!--   Icon Section   -->
        <div class="row miss-obj-row">
          <div class="col s12 mission">
            <h4 class="brown-text text-darken-1 center-align">Our Policy</h4>
            <ul class="left-align policy-ul">

              <!-- policy data retriveal from database -->

              <?php
                
                $get_policy = "SELECT * FROM policy";

                $run_policy = mysqli_query($con,$get_policy);

                while ($row_policy=mysqli_fetch_array($run_policy)):

                  $policy = $row_policy["p_desc"];

              ?>

              	<li><?php echo ($policy); ?></li>

              <?php endwhile; ?>

            </ul>

          </div>
          
        </div>
      </div>
    </div>



    <div class="parallax-container valign-wrapper">

      <div class="parallax">
        <img src="images/parallax/about3.jpg" alt="about img 3" />
      </div>
    </div>



<!-- team container -->
    <div class="container pl-contact-us">
      <div class="section">
        <div class="row">
          <div class="col s12 center">
            <h4 class="brown-text text-darken-1">Team</h4>
              <div class="row administration-cards">

              <!-- policy data retriveal from database -->

              <?php
                
                $get_team = "SELECT * FROM team";

                $run_team = mysqli_query($con,$get_team);

                while ($row_team=mysqli_fetch_array($run_team)):

                  $t_img = $row_team["t_img"];

                  $t_name = $row_team["t_name"];

                  $t_position = $row_team["t_position"];


              ?>

                <div class="col s6 l3">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/team/<?php echo($t_img) ?>" class="team-img">
                    </div>
                    <div class="card-content left-align">
                      <b><?php echo($t_name) ?></b>
                      <p><?php echo($t_position) ?></p>

                    </div>
                  </div>
                </div>

              <?php endwhile; ?>

              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="parallax-container valign-wrapper pl-con-last">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="row center">

          </div>
        </div>
      </div>
      <div class="parallax">
        <img src="images/parallax/about4.jpg" alt="about img 4" />
      </div>
    </div>

<!-- footer -->

<?php 
  
  include('includes/footer.php');

?>


</body>

</html>
