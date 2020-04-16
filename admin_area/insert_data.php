<?php 

include("includes/db.php");

// data insertion for product categories

$insert_product_cat1 = "INSERT INTO product_cat (cat_name,icon,status) VALUES ('Pharmaceutical','pharma.png',1)";

$run_product_cat1 = mysqli_query($con,$insert_product_cat1);



$insert_product_cat2 = "INSERT INTO product_cat (cat_name,icon,status) VALUES ('Nutraceutical','neutra.png',1)";

$run_product_cat2 = mysqli_query($con,$insert_product_cat2);



$insert_product_cat3 = "INSERT INTO product_cat (cat_name,icon,status) VALUES ('Cosmeceutical','cosma.png',1)";

$run_product_cat3 = mysqli_query($con,$insert_product_cat3);



$insert_product_cat4 = "INSERT INTO product_cat (cat_name,icon,status) VALUES ('Herbal','herbal.png',1)";

$run_product_cat4 = mysqli_query($con,$insert_product_cat4);



$insert_product_cat5 = "INSERT INTO product_cat (cat_name,icon,status) VALUES ('Consumer','consumer.png',1)";

$run_product_cat5 = mysqli_query($con,$insert_product_cat5); 







// data insertion for team

$insert_team1 = "INSERT INTO team (t_img,t_name,t_position) VALUES ('dummytext1.jpg','dummytextname1','dummytextposition1')";

$run_team1 = mysqli_query($con,$insert_team1);




$insert_team2 = "INSERT INTO team (t_img,t_name,t_position) VALUES ('dummytext2.jpg','dummytextname2','dummytextposition2')";

$run_team2 = mysqli_query($con,$insert_team2);




$insert_team3 = "INSERT INTO team (t_img,t_name,t_position) VALUES ('dummytext3.jpg','dummytextname3','dummytextposition3')";;

$run_team3 = mysqli_query($con,$insert_team3);




$insert_team4 = "INSERT INTO team (t_img,t_name,t_position) VALUES ('dummytext4.jpg','dummytextname4','dummytextposition4')";;

$run_team4 = mysqli_query($con,$insert_team4);









// data insertion for message and objective

$insert_mess_obj = "INSERT INTO message_objective (message,objective) VALUES ('dummytextMessage','dummytextObjective')";

$run_mess_obj = mysqli_query($con,$insert_mess_obj);








// data insertion for message and objective

$insert_lu = "INSERT INTO marquee_lu (news) VALUES ('dummytextNews')";

$run_lu = mysqli_query($con,$insert_lu);








// data insertion for founder

$insert_founder = "INSERT INTO founder (f_img,f_name,f_position,f_message) VALUES ('dummytextimg.jpg','dummytextName','dummytextposition','dummytextMessage')";

$run_founder = mysqli_query($con,$insert_founder);





// data insertion for contact

$insert_contact = "INSERT INTO contact (tel1,tel2,tel3,facebook,instagram,gmail1,gmail2,Address) VALUES ('1111111111','1111111111','1111111111','dummytextfacebook','dummytextinstagram','dummytext1@gmail.com','dummytext2@gmail.com','XYZ Street ABC Avenue ASD City')";

$run_contact = mysqli_query($con,$insert_contact);









// data insertion for Admin

$insert_admin = "INSERT INTO admins (admin_name,admin_pass,admin_image,admin_email,admin_job,admin_contact) VALUES ('dummytextName','admin','dummytext.jpg','admin@gmail.com','dummytextJob','1111111111')";

$run_admin = mysqli_query($con,$insert_admin);





// going to login page

echo 
	"
		<script>window.open('login.php','_self');</script>
	";





?>