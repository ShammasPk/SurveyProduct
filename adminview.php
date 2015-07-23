<?php 
session_start();
  
    if (isset($_SESSION['user_name'])) {
    		
    }else
    header("location:admin.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>psyservey</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/exam.css">

	
</head>
<body>
	<div class="header">
		<div class="hedmain">
	<div class="reg">
		<li class="regmode"><a href='logout.php'>logout</a></li>
	</div>
	<div class="navg">	
				<ul >
					<li><a href="addctegory.php">ADD CATEGORY</a></li>
					<li><a href="addquestion.php">OPTION QUESTIONS</a></li>
					<li><a href="addmulti.php">MULTI QUESTIONS</a></li>
					<li><a href="obj.php">ONE WORD QUESTIONS</a></li>

				</ul></div>
	<div class="logo">
		<img src="image/logo.png" alt="" class="logo">
	</div>
		</div>
	</div>
	<div class="pic">
	<div class="pic1">
		<img src="image/144.png" alt="" >
	</div>
		
	</div>