<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
<div class="row">

	<div class="navbar-header">

		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-exl-collapse">

			<span class="sr-only">Toggle Navigation</span>

			<span class="navbar-toggler-icon"></span>

		</button>

		<a href="index.php?dashboard" class="navbar-brand ml-3">Admin Area</a>

	</div>


	 <!-- right admin name -->
	<ul class="nav navbar-nav" id="top_admin_name">
		
		<li class="dropdown">
			<a href="#" id="admin_dropdown" class="dropdown-toggle" data-toggle="dropdown">
				<?php echo "$admin_name"; ?> <b class="caret"></b>	
			</a>
		
			 <!-- drop down of username -->
			<ul class="dropdown-menu mt-2 bg-dark">


				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?insert_admin"> 

					 	Create Admin

					</a>

				</li>


				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?view_admin"> 

						View Admins
					
					</a>

				</li>

				<li class="dropdown-divider"></li>

				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="logout.php"> 

						Logout
					
					</a>

				</li>

			</ul>
		</li>

	</ul>

</div>


	<div class="collapse navbar-collapse navbar-exl-collapse">

			<ul class="navbar-nav side-nav bg-dark border-sidebar flex-column">

				<li class="nav-item">
					<a class="nav-link" href="index.php?dashboard">
						
						Dashboard

						<?php if ($active_arrow=="dashboard" || $active_arrow=="") 
						{
							arrow_ico();
						} ?>

					</a>
				</li>


				<!-- products bar -->

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#products">

						Products

						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="product") 
						{
							arrow_ico();
						} ?>

					</a>

					<ul id="products" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_product" id="admin_dropdown_link" class="dropdown-item">Insert Products</a>
							
						</li>
						<li>
							
							<a href="view_products.php" id="admin_dropdown_link" class="dropdown-item">View Products</a>
							
						</li>

					</ul>
				</li>





				<!-- companies bar -->

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#cat">

						Companies

						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="com") 
						{
							arrow_ico();
						} ?>


					</a>

					<ul id="cat" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_com" id="admin_dropdown_link" class="dropdown-item">Insert Company</a>
							
						</li>
						<li>
							
							<a href="index.php?view_com" id="admin_dropdown_link" class="dropdown-item">View Company</a>
							
						</li>

					</ul>
				</li>




				<!-- slides bar -->

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#slides">

						Slides

						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="slide") 
						{
							arrow_ico();
						} ?>

					</a>

					<ul id="slides" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_slide" id="admin_dropdown_link" class="dropdown-item">Insert Slide</a>
							
						</li>
						<li>
							
							<a href="index.php?view_slides" id="admin_dropdown_link" class="dropdown-item">View Slides</a>
							
						</li>

					</ul>
				</li>



				<!-- Policy bar -->

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#policy">

						Policy

						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="policy") 
						{
							arrow_ico();
						} ?>

					</a>

					<ul id="policy" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_policy" id="admin_dropdown_link" class="dropdown-item">Insert Policy</a>
							
						</li>
						<li>
							
							<a href="index.php?view_policy" id="admin_dropdown_link" class="dropdown-item">View Policy</a>
							
						</li>

					</ul>
				</li>




				<!-- products categories bar -->

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="index.php?view_p_cats">
						
						View Categories
						
						<?php if ($active_arrow=="p_cat") 
						{
							arrow_ico();
						} ?>


					</a>

				</li>






				<!-- Team bar -->

				<li class="nav-item">

					<a class="nav-link" href="index.php?view_team">

						View Teams


						<?php if ($active_arrow=="team") 
						{
							arrow_ico();
						} ?>


					</a>

				</li>






				<!-- Message Objective bar -->

				<li class="nav-item">

					<a class="nav-link" href="index.php?edit_mess_obj">

						Edit Mess-Obj


						<?php if ($active_arrow=="edit_mess_obj") 
						{
							arrow_ico();
						} ?>


					</a>

				</li>




				<!-- Latest Updates bar -->

				<li class="nav-item">

					<a class="nav-link" href="index.php?edit_news">

						Edit Latest Updates

						<?php if ($active_arrow=="edit_news") 
						{
							arrow_ico();
						} ?>

					</a>

				</li>




				<!-- Founder bar -->

				<li class="nav-item">

					<a class="nav-link" href="index.php?edit_founder">

						Edit Founder

						<?php if ($active_arrow=="founder") 
						{
							arrow_ico();
						} ?>

					</a>

				</li>



				<!-- contact bar -->

				<li class="nav-item">

					<a class="nav-link" href="index.php?edit_contact">

						Edit Contact

						<?php if ($active_arrow=="contact") 
						{
							arrow_ico();
						} ?>

					</a>

				</li>



				<li class="nav-item">

					<a class="nav-link" href="logout.php">

						Logout

					</a>

				</li>

			</ul>

	</div>


</nav>
<script>
	$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});
</script>

<?php 
	function arrow_ico()
	{
		echo 
		"
			<div class='float-right bg-light active_sidebar_ico'>&nbsp</div>
		";
	}
?>