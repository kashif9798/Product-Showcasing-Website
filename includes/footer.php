
<footer class="footer blue darken-3 white-text">
      <div class="container">
       <div class="row">
        <div class="col s6 m4 l3">
           <h5 class="footer-headings">Products</h5>
          <ul>

            <!-- Footer Product categories retreival -->

            <?php

              $get_pc_footer = "SELECT * FROM product_cat WHERE status = 1";

              $run_pc_footer = mysqli_query($con,$get_pc_footer);

              while ($row_pc_footer=mysqli_fetch_array($run_pc_footer)):

                $catId_footer = $row_pc_footer["cat_id"];               

                $catName_footer = $row_pc_footer["cat_name"];

            ?>

              <li class="footer-links">

                <a href="products.php?catId=<?php echo($catId_footer); ?>" class="footer-text-links">

                  <i class="material-icons tiny footer-icons">chevron_right</i> <?php echo ($catName_footer); ?>

                </a>

              </li>

            <?php endwhile; ?>

            <li class="footer-links"><a href="products.php" class="footer-text-links"><i class="material-icons tiny footer-icons">chevron_right</i> All Prodcuts</a></li>

          </ul>
        </div>


        <div class="col s6 m4 l3">
         <h5 class="footer-headings">Companies</h5>
         <ul>

            <!-- Footer companies retreival -->

            <?php 

              $get_com_footer = "SELECT * FROM companies";

              $run_com_footer = mysqli_query($con,$get_com_footer);

              while ($row_com_footer=mysqli_fetch_array($run_com_footer)):

                $comId_footer = $row_com_footer["com_id"];                

                $comName_footer = $row_com_footer["com_name"];

            ?>


               <li class="footer-links">

                <a href="products.php?comId=<?php echo ($comId_footer); ?>" class="footer-text-links">

                  <i class="material-icons tiny footer-icons">chevron_right</i> <?php echo ($comName_footer); ?>

                </a>

              </li>

          <?php endwhile; ?>


         </ul>
        </div>

        <!-- contact data retrieval -->

        <?php
      
		     $get_contact = "SELECT * FROM contact";

		     $run_contact = mysqli_query($con,$get_contact);

		     $row_contact = mysqli_fetch_array($run_contact);

		     $cTel1 = $row_contact["tel1"];

		     $cfacebook = $row_contact["facebook"];

		     $cInstagram = $row_contact["instagram"];

		     $cGmail1 = $row_contact["gmail1"];

		     $cAddress = $row_contact["Address"];

		?>

        <div class="col s6 m4 l3">
         <h5 class="footer-headings">Find Us</h5>
          <p class="footer-address blue-grey-text text-lighten-5">
            <i class="material-icons footer-icons tiny white-text">place</i> &nbsp <?php echo ($cAddress); ?>
          </p>
          <p class="footer-address blue-grey-text text-lighten-5">
            <i class="material-icons footer-icons tiny white-text">call</i> &nbsp 0<?php echo ($cTel1); ?>
          </p>
        </div>
        <div class="col s6 offset-m8 m4 l3">
         <h5 class="footer-headings">Connect via</h5>        	


           	<?php if(!empty($cfacebook)): ?>

           		<a href="<?php echo($cfacebook) ?>" target="_blank"><i class="fab fa-facebook-f small social-media"></i></a>

      	  	<?php endif; ?>


           	<?php if(!empty($cInstagram)): ?>

           		<a href="<?php echo($cInstagram) ?>" target="_blank"><i class="fab fa-instagram small social-media"></i></a>

      	 	<?php endif; ?>


           	<?php if(!empty($cGmail1)): ?>

           		<a class="tooltip" onclick="copyclip()"><i class="far fa-envelope small social-media"></i> <span class="tooltiptext">Email Copied</span></a>

      	  	<?php endif; ?>

         
        </div>
      </div>
      <div class="footer-hrule"></div>

      <div class="col s12 copyright">&copy; 2019-<span id="showyear"></span></div>

</footer>

<script>
  
  var d = new Date();
  document.getElementById("showyear").innerHTML = d.getFullYear();
  
  M.AutoInit();
  
  // //dropdown
  $(document).ready(function() {
    $(".dropdown-trigger").dropdown({
      hover: true,
      inDuration: 300,
      constrainWidth: false,
      coverTrigger: false
    });


  });


function copyclip() {

	var email = "<?php echo($cGmail1) ?>";
	var x = $('<input id="clip">').val(email).appendTo('body').select();
	document.execCommand('copy');
	$("#clip").remove();
	$(".tooltiptext").css({"visibility": "visible", "opacity": "1"});
	setTimeout(function(){ $(".tooltiptext").css({"visibility": "hidden", "opacity": "0"}); }, 4000);
}

</script>
