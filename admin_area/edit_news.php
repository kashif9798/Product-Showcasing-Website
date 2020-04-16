<?php
	
	// if condition is for security so no unauthorized person see this

	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}

	
	if (isset($_GET["edit_news"])) 
	{
		$get_news_query = "SELECT * FROM marquee_lu";

		$run_edit_news = mysqli_query($con,$get_news_query);

		$row_edit_news = mysqli_fetch_array($run_edit_news);

		$new_edit = $row_edit_news["news"];

	}


	if (isset($_POST["submit"])) 
	{
		$update_news = preg_replace('/\s+/', ' ',$_POST["news"]);


	 	$update_news = "UPDATE marquee_lu SET news='$update_news'";

	 	$run_news = mysqli_query($con,$update_news);

	 	if ($run_news) 
	 	{
			echo "<script>alert('Latest Updates has been updated successfully')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}
		else
		{
			echo "<script>alert('Latest Updates updation was not successful')</script>";
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}
	}

?>

<div class="row mt-5">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;">
					Dashboard 
				</a>
			</li>

			<li class="breadcrumb-item active">
				Edit Latest Updates
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					Edit Latest Updates
					<a href="index.php?dashboard" class="btn btn-primary float-right">Cancel Edit</a>
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="latestU">Latest Update *</label>

							<div class="col-md-6">

							   <textarea class="form-control" pattern="[A-Za-z0-9 @$&().,#]{1,400}" name="news" id="latestU" cols="19" rows="4" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please fill out this field and max characters 400')"><?php echo ($new_edit); ?></textarea>  
							</div>
					
					</div>


					<div class="form-group mt-5 row"> 

							<div class="offset-md-3 col-md-6"> 
							  <input class="btn btn-success" style="width: 100%;" value="Submit" type="submit" name="submit">
							</div>
					
					</div>

				</form>

			</div>


		</div>

	</div>
</div>