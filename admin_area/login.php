<?php 
	session_start();
	include("includes/db.php");
	if (isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('index.php?dashboard','_self');</script>
		";	
	}
	else
	{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medlea - Admin Area</title>
	<link rel="icon" href="../images/logo/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<body>

	<div class="container">

		<form class="form_login" method="post">
			
			<h1 class="form_login_heading" style="font-family: Helvetica !important;"> Admin Login </h1>

			<div class="mat-div">

				<label class="mat-label">Email Address</label>

				<input type="email" class="mat-input focus_input_color" name="admin_email" required>

			 </div>

			<div class="mat-div">

			<label class="mat-label">Password</label>				

			<input type="password" class="mat-input focus_input_color" name="admin_pass" required>

			</div>

			<button type="submit" class="btn btn-lg btn-outline-light btn-block mt-5" name="admin_login">
				Login
			</button>			

		</form>

	</div>

</body>
</html>

<?php 
 
	if (isset($_POST["admin_login"])) 
	{
		$admin_email = mysqli_real_escape_string($con,$_POST["admin_email"]);

		$admin_pass = mysqli_real_escape_string($con,$_POST["admin_pass"]);

		$get_admin = "SELECT COUNT(admin_id) as countAdmin FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";

		$run_admin = mysqli_query($con,$get_admin);

		$row_admin = mysqli_fetch_array($run_admin);

		$count = $row_admin["countAdmin"];

		if ($count>=1) 
		{
			$_SESSION["admin_email"] = $admin_email;

			echo 
			"
				<script>alert('Logged In, Welcome Back.');</script>
			";
			
			echo 
			"
				<script>window.open('index.php?dashboard','_self');</script>
			";	
		}
		else
		{
			echo 
			"
				<script>alert('Wrong Email or Password.');</script>
			";
		}

	}

?>


<?php } ?>

<script>
    $(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
  $(this).parent().removeClass("is-active");
})
</script>