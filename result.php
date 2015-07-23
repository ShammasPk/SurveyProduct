<?php
 error_reporting(-1);
 ini_set('display_errors', 'On');

 require_once ('includes/Database.php');


//connect to the database
	$db = new Database('localhost', 'root', 'admin', 'survey');


 
 //$score=0;
 if (isset($_POST['finishbtn']))
    {
	  
		 $i=1;
		 $score=0;
		 //var_dump($option);
		 foreach ($option as $key => $value)
		 {
		 	
		 	$answer="dftdsf";
		 	if(isset($_POST['a'.$i]))
		 		$answer=$_POST['a'.$i];
		 	if ($value['answer']==$answer) {
		 		$score++;
		 	echo $answer;
		 	}
		 	 
		 	$i++;
		 }

		 $i=1;
		 foreach ($multi as $key => $value) 
		 {
		 	$answer1="";
		 	if(isset($_POST['b'.$i]))
		 		$answer1=$_POST['b'.$i];
		 	if ($value['ansCho3']==$answer1){
		 		//($value['ansCho4']==$answer2)) 
		 		$score++;
			}
		 	 
		 	$i++;
		}

		 /*$i=1;
		 foreach ($obj as $key => $value) 
		 {
		 	$answerobj="";
		 	if(isset($_POST['c'.$i]))
		 		$answerobj=$_POST['answerobj'];
		 	{
		 		$score++;
		 	}
		 	 
		 	$i++;

		 }*/
		 echo $score;
	}


	

	
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/exam.css">
</head>
<body >
	<div class="header">
			<div class="hedmain">
				<div class="reg">
					<li class="regmode">Hii USER</li>
				</div>
						<div class="navg">	
							<ul>
								<li><a href="exam.html">HOME</a></li>
								<li>FEATURES</li>
								<li>CONTACT US</li>
							</ul>
						</div>
					<div class="logo">
						<img src="image/logo.png" alt="" class="logo">
				</div>
			</div>
		</div>
			<div class="res-cont">
				<div class="res-contmain">
					 	<div class="viewresult">
					 		<h2>YOUR RESULT</h2>
					 		<h2><?php  echo "You got :".$score." Mark";?></h2>
					 	</div>

					 	      <div class="feedback"> 
					 	      <form action="">
					 	         <ul>	
					 	             <li >
				                       <h3>SEND YOUR FEEDBACK  </h3></li>
				          
					<li><textarea name="feedback" ></textarea> <label for="q3"> </label>	</li>
				    <li><input type="submit" name="sendemail" value="send" class="button" ></li>
				
			</ul>
			</form>
		

					 	       </div>
				</div>
				
			</div>
				<footer>
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
</footer>
		
</body>
</html>