<?php 
	
	session_start();

	include("includes/db.php");


	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}


	else
	{	
		$admin_session = $_SESSION["admin_email"];

		$get_admin = "SELECT admin_name FROM admins WHERE admin_email = '$admin_session'";

		$run_admin = mysqli_query($con,$get_admin);

		$row_admin = mysqli_fetch_array($run_admin);

		$admin_name = $row_admin["admin_name"];
		
?>


<?php
	$active_arrow="";

	// for dashboard
	if (isset($_GET["dashboard"])) 
	{	
						
		$active_arrow="dashboard";
	}


	//for product crud
	if (isset($_GET["insert_product"]) || isset($_GET["edit_product"])) //for product crud
	{
		$active_arrow="product";
	}


 	//for categories i.e phamaceutical neutraceutical
	if ( isset($_GET["view_p_cats"]) ) 
	{
		$active_arrow="p_cat";
	}
	

	//for company crud
	if ( isset($_GET["insert_com"]) || isset($_GET["view_com"]) || isset($_GET["edit_com"])) 
	{
		$active_arrow="com";
	}


	// for slide crud
	if ( isset($_GET["insert_slide"]) || isset($_GET["view_slides"]) || isset($_GET["edit_slide"]))
	{
		$active_arrow="slide";
	}




	// for policy crud

	if (isset($_GET["insert_policy"]) || isset($_GET["view_policy"]) || isset($_GET["edit_policy"]))
	{
		$active_arrow="policy";
	}


	// for team view and edition
	if (isset($_GET["view_team"]) || isset($_GET["edit_team"]))
	{
		$active_arrow="team";
	}

	// for message - objective
	if (isset($_GET["edit_mess_obj"]))
	{
		$active_arrow="edit_mess_obj";
	}

	// for latest updates
	if (isset($_GET["edit_news"]))
	{
		$active_arrow="edit_news";
	}
	

	// for founder
	if (isset($_GET["edit_founder"]))
	{
		$active_arrow="founder";
	}


	// for contact
	if (isset($_GET["edit_contact"]))
	{
		$active_arrow="contact";
	}


	if (isset($_GET["view_users"]) || isset($_GET["insert_user"]) || isset($_GET["user_profile"]))
	{
		$active_arrow="user";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medlea - Admin Area</title>
	<link rel="icon" href="../images/logo/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>

<body>
	<div id="wrapper">
		<div class="container-fluid ninja">
		<?php include("includes/sidebar.php"); ?>
		</div><br>
		<div id="page-wrapper">
			<div class="container-fluid">
				<?php

					// for product crud
					if (isset($_GET["insert_product"])) 
					{
						include("insert_product.php");
					}

					elseif (isset($_GET["edit_product"])) 
					{
						include("edit_product.php");
					}


					// for product categories i.e pharmaceutial neutraceutical etc
					elseif (isset($_GET["view_p_cats"]))
					{
						include("view_p_cats.php");
					}


					// for company crud
					elseif (isset($_GET["insert_com"]))
					{
						include("insert_com.php");
					}

					elseif (isset($_GET["view_com"]))
					{
						include("view_com.php");
					}

					elseif (isset($_GET["edit_com"]))
					{
						include("edit_com.php");
					}


					// for slide crud
					elseif (isset($_GET["insert_slide"]))
					{
						include("insert_slide.php");
					}

					elseif (isset($_GET["view_slides"]))
					{
						include("view_slides.php");
					}

					elseif (isset($_GET["edit_slide"]))
					{
						include("edit_slide.php");
					}




					// for policy
					elseif (isset($_GET["insert_policy"]))
					{
						include("insert_policy.php");
					}

					elseif (isset($_GET["view_policy"]))
					{
						include("view_policy.php");
					}

					elseif (isset($_GET["edit_policy"]))
					{
						include("edit_policy.php");
					}



					// for team
					elseif (isset($_GET["view_team"]))
					{
						include("view_team.php");
					}

					elseif (isset($_GET["edit_team"]))
					{
						include("edit_team.php");
					}


					// for message objective
					elseif (isset($_GET["edit_mess_obj"]))
					{
						include("edit_mess_obj.php");
					}


					// for latest updates
					elseif (isset($_GET["edit_news"]))
					{
						include("edit_news.php");
					}


					// for founder
					elseif (isset($_GET["edit_founder"]))
					{
						include("edit_founder.php");
					}


					// for contact
					elseif (isset($_GET["edit_contact"]))
					{
						include("edit_contact.php");
					}


					// for admins

					elseif (isset($_GET["insert_admin"]))
					{
						include("insert_admin.php");
					}

					elseif (isset($_GET["view_admin"]))
					{
						include("view_admin.php");
					}
					elseif (isset($_GET["edit_admin"]))
					{
						include("edit_admin.php");
					}



					else
					{	
						
						include("dashboard.php");
					}


				?>
			</div>
		</div>
	</div>
</body>
</html>

<?php } ?>