<?php 
  
  if (isset($_POST["search_submit"])) 
  {
    $user_query = $_POST["user_query"];

    echo "<script>window.open('result.php?result_query=$user_query','_self');</script>";

  }

?>

    <!-- navbar -->
    <div class="row" style="z-index: 2;">
      	<nav class="grey lighten-4 col s12">        
          <div class="nav-wrapper">
            <a class="brand-logo"><img class="userselect" src="images/logo/logo.png" alt="LOGO" /></a><a class="blue-text text-darken-2 logo-txt">Medlea Pharmaceuticals</a>     
            <a href="#" data-target="mobile-demo" class="sidenav-trigger userselect"><i class="material-icons blue-text text-darken-3">menu</i></a>            


			      <form method="post" class="mr50px hide-on-med-and-down right" >
                <div class="input-field inline">
                    <input id="search-bar" placeholder="Search" type="text" class="validate" required name="user_query" pattern="[A-Za-z ]+" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field using alphabets and spaces only')">

              		  <button type="submit" class="search-btn btn-floating waves-effect waves-light" name="search_submit">
                      <i class="material-icons">search</i>
                    </button>
                </div>                                      
            </form>

            <ul id="nav-mobile" class="right mr50px hide-on-med-and-down userselect">
              <li class="nav-li <?php if ($page=='index') echo('active'); ?>">
                <a href="index.php" class="nav-links">Home</a>
              </li>
              <li class="nav-li <?php if ($page=='products' || $page == 'details') echo('active'); ?>">
                <a class="nav-links dropdown-trigger" data-target="dropdown0">
                	Products
                	<i href="" class="material-icons right">arrow_drop_down</i>
              	</a>
              </li>
              <li class="nav-li <?php if ($page=='companies') echo('active'); ?>">
                <a class="nav-links dropdown-trigger" data-target="dropdown01">
                	Companies <i class="material-icons right">arrow_drop_down</i>
                </a>
              </li>
              <li class="nav-li <?php if ($page=='about') echo('active'); ?>">
                <a href="about.php" class="nav-links">About</a>
              </li>
              <li class="nav-li  <?php if ($page=='contact') echo('active'); ?>">
                <a href="contact.php" class="nav-links">Contact</a>
              </li>
              <li>

              </li>
            </ul>

            
          </div>        
      	</nav>
      	
    </div>



    <!-- dropdown-content -->

    <!-- Dropdown Structure  for navbar content-->
    <ul id="dropdown0" class="dropdown-content">

    <!-- desktop menu product category retreival -->
	<?php 

		$get_pc = "SELECT * FROM product_cat WHERE status = 1";

     	$run_pc = mysqli_query($con,$get_pc);

		while ($row_pc=mysqli_fetch_array($run_pc)):

			$catId = $row_pc["cat_id"];				     		

			$catName = $row_pc["cat_name"];

			$catIcon = $row_pc["icon"];

	?>
      <li class="dropd">
        <a href="products.php?catId=<?php echo($catId); ?>" class="dropda">
        	<img src="images/icons/<?php echo($catIcon); ?>" class="dropdimg dropdimg-size left-align responsive-img circle">&nbsp
        	&nbsp<span class="dropdtext dropdtext-size right-align"><?php echo ($catName); ?></span>
    	</a>
      </li>

    <?php endwhile; ?>

      <li class="divider"></li>
      <li class="divider"></li>

      <li class="dropd">
        <a href="products.php" class="dropda">
        	<img src="images/icons/all.png" class="dropdimg dropdimg-size left-align responsive-img circle">&nbsp
        	&nbsp<span class="dropdtext dropdtext-size right-align">All Products</span>
    	</a>
      </li>

    </ul>



    <!-- Dropdown Structure for navbar content-->
    <ul id="dropdown01" class="dropdown-content">

    <!-- desktop menu companies retreival -->
	<?php 

		$get_com = "SELECT * FROM companies";

     	$run_com = mysqli_query($con,$get_com);

		while ($row_com=mysqli_fetch_array($run_com)):

			$comId = $row_com["com_id"];				     		

			$comName = $row_com["com_name"];

	?>

	    <li class="dropd">
	        <a href="products.php?comId=<?php echo($comId); ?>" class="dropda">
	        	<span class="dropdtext dropdtext-size right-align"><?php echo($comName); ?></span>
	    	</a>
	    </li>

	<?php endwhile; ?>



      <li class="divider"></li>
      <li class="divider"></li>
      <li class="dropd">
        <a href="products.php" class="dropda">
        	<span class="dropdtext dropdtext-size right-align">All Products</span>
    	</a>
      </li>
      </li>
    </ul>
    




    <!-- side-nav content -->
    <ul class="sidenav userselect grey lighten-3" id="mobile-demo">
    	<li><a class="sidenav-close" href="#!"><i class="material-icons right">&nbsp &nbsp &nbsp &nbsp close</i></a></li>


      <li>
        <form method="post">
          <div class="input-field">
            <input id="search-bar-side" type="text" class="validate" placeholder="Search" required name="user_query" pattern="[A-Za-z ]+" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field using alphabets and spaces only')">
            <button type="submit" class="search-bar-sidebtn btn-floating waves-effect waves-light" name="search_submit">
                <i class="material-icons">search</i>
            </button>
          </div>
        </form>
      </li>


      <li class="<?php if ($page=='index') echo('active'); ?>"><a href="index.php" class="blue-text text-darken-4 side-links">Home</a></li>


      <li class="<?php if ($page=='products' || $page == 'details') echo('active'); ?>">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header blue-text text-darken-4 side-links" >&nbsp &nbsp Products <i class="material-icons blue-text text-darken-4 right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>


              		<!-- mobile menu product category retreival -->
				    <?php 

						$get_pc_mob = "SELECT * FROM product_cat WHERE status = 1";

     					$run_pc_mob = mysqli_query($con,$get_pc_mob);

				     	while ($row_pc_mob=mysqli_fetch_array($run_pc_mob)):

				      		$catId_mob = $row_pc_mob["cat_id"];				     		

				      		$catName_mob = $row_pc_mob["cat_name"];

				      		$catIcon_mob = $row_pc_mob["icon"];

				    ?>

	              	<li class="dropd dropd-collapse">
	                  <a href="products.php?catId=<?php echo($catId_mob); ?>" class="dropda">
	                    <img src="images/icons/<?php echo($catIcon_mob); ?>" class="side-dropdimg dropdimg left-align responsive-img circle">&nbsp
	                    &nbsp<span class="side-dropdtext dropdtext right-align"><?php echo ($catName_mob); ?></span>
	                  </a>
	                </li>

            	<?php endwhile; ?>

                <li class="divider"></li>

                <li class="dropd dropd-collapse">
                  <a href="products.php" class="dropda">
                    <img src="images/icons/all.png" class="side-dropdimg dropdimg left-align responsive-img circle">&nbsp
                    &nbsp<span class="side-dropdtext dropdtext right-align">All Products</span>
                  </a>
                </li>


              </ul>
            </div>

          </li>
        </ul>
      </li>

      <li class="<?php if ($page=='companies') echo('active'); ?>">
        <ul class="collapsible collapsible-accordion" >
          <li>
            <a class="collapsible-header blue-text text-darken-4 side-links">&nbsp &nbsp Companies <i class="material-icons blue-text text-darken-4 right">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>

			    <!-- mobile menu companies retreival -->
				<?php 

					$get_com_mob = "SELECT * FROM companies";

			     	$run_com_mob = mysqli_query($con,$get_com_mob);

					while ($row_com_mob=mysqli_fetch_array($run_com_mob)):

						$comId_mob = $row_com_mob["com_id"];				     		

						$comName_mob = $row_com_mob["com_name"];

				?>

	                <li class="dropd">
	                  <a href="products.php?comId=<?php echo($comId_mob); ?>" class="dropda">
	                    <span class="side-dropdtext dropdtext right-align m-lsmall"><?php echo($comName_mob); ?></span>
	                  </a>
	                </li>

	            <?php endwhile; ?>

                <li class="divider"></li>

                <li class="dropd">
                  <a href="products.php" class="dropda">
                    <span class="side-dropdtext dropdtext right-align m-lsmall">All Products</span>
                  </a>
                </li>

              </ul>
            </div>

          </li>
        </ul>
      </li>

      <li class="<?php if ($page=='about') echo('active'); ?>"><a href="about.php" class="blue-text text-darken-4 side-links">About</a></li>


      <li class="<?php if ($page=='contact') echo('active'); ?>"><a href="contact.php" class="blue-text text-darken-4 side-links">Contact</a></li>
</ul>
