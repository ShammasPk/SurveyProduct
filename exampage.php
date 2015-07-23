<?php

	require_once ('includes/Database.php');

	error_reporting(-1);
	ini_set('display_errors', 'On');


	//connect to the database
	$db = new Database('localhost', 'root', 'admin', 'survey');


	if (isset($_GET['category'])) {
    
    //var_dump($_GET['category']);
    
    $category = ($_GET['category']);
    
    }

	//select questions from optional)
	$fields=array("");
	$where=array("category",$category);
	$option=$db->random_select('addquestion',$fields,$where);
	//var_dump($option);
	
	//sionselect choice quest
	$where=array("category",$category);
	$multi=$db->random_select('addmulti',$fields,$where);
	//var_dump($multi);

	//select objectieve questions
	$where=array("category",$category);
	$obj=$db->random_select('addobj',$fields,$where);
	//var_dump($obj);	
 	
 	/*if (isset($_POST['finishbtn'])){
				$answer=$_POST['a'.$i];
				$fields=array("answer");
				$values=array($answer);
				$db->insert('addobj', $fields, $values);
			}*/

	/*if (isset($_POST['finishbtn'])) 
	{
	//Check for empty fields
		if 	((empty($_POST['a'.$i]) ||
			(empty($_POST['b'.$m]) ||
			(empty($_POST['c'.$l])) 

		    { echo "<script type='text/javascript'>
	    				alert('leave exam');
	    				</script>";
				//exit();
			} else {
					//Create short variables
					$answer = $_POST['a'.$i];
					$multi = $_POST['b'.$m];
					$obj = $_POST['c'.$l];
					
					//insert the questions
					$values = array($option, $multi, $obj);
					$db->insert('adminview', $fields, $values);
	
					}
		}*/
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
		<li class="regmode">Hii USER</li>
	</div>
	<div class="navg">	
				<ul >
					<li>HOME</li>
					<li>FEATURES</li>
					<li>CONTACT US</a></li>
				</ul></div>
	<div class="logo">
		<img src="image/logo.png" alt="" class="logo">
	</div>
		</div>
	</div>
	<div class="content">
	</div>

	<div class="test">
	
		<h1>WELCOME TO PSYBO ONLINE TEST</h1>

		<form method="post" action="result.php">
		<ul>
		<?php
			$no=1; 
			$i=1;
		 foreach ($option as $key => $value)
		 	{
		 		$question = $value['question'] ." ?";
			    $opt1 = $value['opt1'];
			    $opt2 = $value['opt2'];
			    $opt3 = $value['opt3'];
			    $opt4 = $value['opt4'];
			    $answer = $value['answer'];

			    //to display programming languages in the browser
					$question_echo = htmlspecialchars($question, ENT_QUOTES);
				    $opt1_echo = htmlspecialchars($opt1, ENT_QUOTES);
				    $opt2_echo = htmlspecialchars($opt2, ENT_QUOTES);
				    $opt3_echo = htmlspecialchars($opt3, ENT_QUOTES);
				    $opt4_echo = htmlspecialchars($opt4, ENT_QUOTES);
				    $answer_echo = htmlspecialchars($answer, ENT_QUOTES);
				    //var_dump($key);
		   
		 	?>
			<li >
				<h3><?php echo $no.".".$question_echo;?></h3>
				<table align="center" width="90%" cellpadding="5" cellspacing="5" border="0" class="table1"> <tr>
					<td><input id="rd" type="radio" name=<?php echo 'a'.$i;?> value=<?php echo $opt1_echo;?>>
						<label for="rd"><?php echo $opt1_echo;?></label>	</td>
					<td><input  id="rd1"type="radio" name=<?php echo 'a'.$i;?> value=<?php echo $opt2_echo;?>>
						<label for="rd1"><?php echo $opt2_echo;?></label>	</td>

				</tr>
				<tr>
					<td><input id="rd2" type="radio" name=<?php echo 'a'.$i;?> value=<?php echo $opt3_echo;?>>
						<label for="rd2"><?php echo $opt3_echo;?></label>	</td>
					<td><input  id="rd3" type="radio" name=<?php echo 'a'.$i;?> value=<?php echo $opt4_echo;?>>
						<label for="rd3"><?php echo $opt4_echo;?></label>	</td>

				</tr>
				</table>
			</li>
			<?php $no++; $i++;}?>

			<?php 
			$i=1;;
		 	foreach ($multi as $key => $value)
		 		{
		 			$question = $value['question'] ." ?";
				    $cho1 = $value['cho1'];
				    $cho2 = $value['cho2'];
				    $ansCho3 = $value['ansCho3'];
				    $ansCho4 = $value['ansCho4'];

				    //to display programming languages in the browser
						$question_echo = htmlspecialchars($question, ENT_QUOTES);
					    $c1_echo = htmlspecialchars($cho1, ENT_QUOTES);
					    $c2_echo = htmlspecialchars($cho2, ENT_QUOTES);
					    $c3_echo = htmlspecialchars($ansCho3, ENT_QUOTES);
					    $c4_echo = htmlspecialchars($ansCho4, ENT_QUOTES);
					    //var_dump($key);
		 		?>
			<li >
				<h3><?php echo $no.".".$question_echo;?> </h3>
				<table align="center" width="90%" cellpadding="5" cellspacing="5" border="0"
				class="table1">			
					<td><input id="a" type="checkbox" name=<?php echo 'b'.$i;?> value=<?php echo $c1_echo ;?>>	
						<label for="a"><?php echo $c1_echo ;?></label>	</td>
					<td><input  id="b" type="checkbox" name=<?php echo 'b'.$i;?> value=<?php echo $c2_echo ;?>>	
						<label for="b"><?php echo $c2_echo ;?></label>	</td>

				</tr>
				<tr>
					<td><input id="c" type="checkbox" name=<?php echo 'b'.$i;?> value=<?php echo $c3_echo ;?>>	
						<label for="c"><?php echo $c3_echo ;?></label>	</td>
					<td><input  id="d" type="checkbox" name=<?php echo 'b'.$i;?> value=<?php echo $c4_echo ;?>>
						<label for="d"><?php echo $c4_echo ;?></label>	</td

				</tr>
				</table>
			</li>
			<?php $no++; $i++;}?>

			<?php
			$i=1;
		 	foreach ($obj as $key => $value)
		 		{
		 			$question = $value['question'] ." ?";
		 			//to display programming languages in the browser
					$question_echo = htmlspecialchars($question, ENT_QUOTES);
		 		?>
			<li >
				<h3><?php echo $no.".".$question_echo;?></h3>
				<table align="center" width="90%" cellpadding="5" cellspacing="5" border="0" class="table1"> <tr>
					<td><textarea name=<?php echo 'c'.$i;?>></textarea> <label for="q3"> </label>	</td>
					
				</tr>
		
				</table>
			</li>
			<?php $no++; $i++;}?>
		
			
		<li style="list-style:none;"><input type="submit" name="finishbtn" value="finish" class="button" style="margin-left:40%;"></li>

		</ul>
		</form>
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