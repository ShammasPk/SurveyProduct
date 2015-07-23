<?php

require_once('includes/Database.php');


	$db= new Database('localhost','root','admin','survey');
	// $db->insert();
	$fields=array("name","email","phone");

if (isset($_POST['register'])) {
	$name= filter_var($_POST['name'] ,FILTER_SANITIZE_STRING);
	$email= filter_var($_POST['email'] ,FILTER_SANITIZE_EMAIL);
	$phone= filter_var($_POST['phone'] ,FILTER_SANITIZE_STRING);
	if($name=='' || $email=='' || $phone=='')
	{
		header("Location:exam.php");
	}else
	{
	$values=array($name, $email, $phone);
	$db->insert('user', $fields, $values);

	}
	if($db)
	        {
	            header("Location:category.php");
	        }
	
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>psyservey</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/footer.css">

	<script type="text/javascript" src="./js/jquery.min.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// pop up window open
		$(".regbt").click(function(){

			$(".popup").css('display', 'block');

		});
			// pop up window close
		$(".closebt").click(function(){

			$(".popup").css('display', 'none');

		});


	});
	</script>
	
</head>
<body>
	<div class="header">
			<div class="hedmain">
				<!--<div class="reg">
						<li class="regmode">Hii USER</li>
					</div>-->
						<!-- <div class="navg">	
							<ul >
									<li><a href="exam.html">HOME</a></li>
									<li>FEATURES</li>
								<li>CONTACT US</li>
							</ul>
						</div> -->
					<div class="logo">
						<img src="image/logo.png" alt="" class="logo">
				</div>
			</div>
	</div>
		<div class="content">
			<div class="img">
				<div class="regbt">
					<h2>CLICK&nbsp;REGISTER&nbsp;>></h2>
			 	</div>
			</div>
		</div>
<!--
	<div class="contentview">
	
	</div>-->

	<div class="popup">
		<div class="regform">
			<div class="closebt">X</div>
			<form method="post" action="">
					<ul>
						<li><label>Name</label>
						<input type="text"required name="name"></li>
						<li><label>Email</label>
						<input type="email" required name="email"></li>
						<li><label>Mobile</label>
						<input type="text" required name="phone"></li>
						<li><button type="" class="button" name="register">Submit</button></li>
					</ul>
		
			</form>
		</div>
	</div>
		
		<div class="footer">

	<footer >
		<div class="footer-details">
	<ul class="social-links">
		<li>
			<a class="facebook" href="https://www.facebook.com/psybotechnologies"></a>
		</li>
		<li>
			<a class="twitter" href="https://twitter.com/psybotech"></a>
		</li>
		<li>
			<a class="linkedin" href="#"></a>
		</li>
		<li>
			<a class="gplus" href="https://plus.google.com/u/0/"></a>
		</li>
	</ul>	
	<div class="site-details">
		<p>All Right Recieved @ PSYBO Technologies PVT.LTD</p>
		<p>PSYBO Technologies 2015</p>
	</div>
		</div>
					
		</div>
	</footer>
	</body>
</html>