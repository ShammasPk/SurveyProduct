<?php

    require_once('includes/Database.php');

    error_reporting(-1);
    ini_set('display_errors', 'On');

    //connect to the database
    $db= new Database('localhost','root','admin','survey');
    $table_name="addmulti";
    $fields=array("question","category","cho1","cho2","ansCho3","ansCho4");
    session_start();
    if (!empty($_POST)) {
    	# code...
    
    if (isset($_POST['btnadd']))
    {
    //Check for empty fields
	    if(empty($_POST['question'])||
	    empty($_POST['cho1'])||
	    empty($_POST['cho2'])||
	    empty($_POST['ansCho3'])||
	    empty($_POST['ansCho4']))
	    {
	        echo "<script type='text/javascript'>
	    				alert('Please complete all fields');
	    				</script>";
	         
	    }else{

		    //Create short variables
		    $question = $_POST['question'];
		    $category = $_POST['category'];
		    $cho1 = $_POST['cho1'];
		    $cho2 = $_POST['cho2'];
		    $ansCho3 = $_POST['ansCho3'];
		    $ansCho4 = $_POST['ansCho4'];

		    if ($ansCho3==$cho1 || $ansCho3==$cho2 || $ansCho3==$ansCho4){
		    	/*if ($ansCho4==$cho1 || $ansCho4==$cho2 || $ansCho4==$ansCho3){*/
		    	# code...
		    
		    //insert the questions
		    $values=array($question, $category, $cho1, $cho2, $ansCho3, $ansCho4);
		    $db->insert($table_name, $fields, $values);
			}
			else{
					    	echo "<script type='text/javascript'>
		    				alert('specify correct answer');
		    				</script>";
					    }

		    if($db)
	        {
	            echo "<script type='text/javascript'>
	    				alert('Your quiz has been saved Successfully');
	    				</script>";

	        }else {
		            echo "<script type='text/javascript'>
		    				alert('System Error');
		    				</script>";
		        }
		    }
	}




	// display added category for drop down list:
	$fields=array("");
	$where=array("");
	$list=$db->select('questionCategory',$fields,$where);
	//var_dump($list);
	
	
	//display list added question:
	$fields=array("");
	$where=array("");
	$result=$db->select('addmulti',$fields,$where);
	//var_dump($result);
	
    if (isset($_GET['id']))
    {
	
		//delete function:
		$qid = ($_GET['id']);
		$db->delete($table_name, 'qid='.$qid);
		header("Location:multichoice.php");
	}
}elseif(isset($_SESSION['user_name']))
	 		{
	 		//header("location:addctegory.php");
	}
	else
		header("location:admin.php");




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>psyservey</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/exam.css">
	<script type="text/javascript" src="./js/jquery.min.js" ></script>

	
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
					<li><a href="multichoice.php">MULTI QUESTIONS</a></li>
					<li><a href="obj.php">ONE WORD QUESTIONS</a></li>
				</ul></div>
	<div class="logo">
		<img src="image/logo.png" alt="" class="logo">
	</div>
		</div>
	</div>
	<div class="content">

	<div class="main">
		<h1>Admin panel</h1>
				

		<form action="" method="post">
		<ul>
			<li >
				<h3 align="center"> ADD QUESTIONS</h3>
				<table align="center" width="100%" cellpadding="10" cellspacing="5" border="0" class="vtab"> 
				<tr>
				<td>Enter question</td>
				<td><textarea name="question"></textarea></td>
				</tr>
				<tr>
				<td>SELECT CATEGORY</td>
				<td><select name="category">
				<?php 
					foreach ($list as $key => $value)
						//var_dump($value[1]);
				 	{?>
				<option value=<?php echo ($value['category'])?>> <?php echo ($value['category'])?> </option>
				<?php }?>
				</select></td>
				</tr>
				<tr>
				<td colspan="2">
				<h4>Answers</h4>
						<table width="90%" cellspacing="3" cellspacing="3" class="vtab">
							<tr>
											<td>A)<input type="text" name="cho1" id="cho1"  value =""></td>
											<td>B)<input type="text" name="cho2"  id="cho2" value =""></td>

							</tr>
										<tr>
											<td>C)<input type="text" name="ansCho3" id="ansCho3"  value =""></td>
											<td>D)<input type="text" name="ansCho4" id="ansCho4"  value =""></td>



							</tr>
						</table>
				</td>
				</tr>
				<tr>
				<td>WRITE ANSWER
					1)<textarea name=""></textarea></td>
			
				<td> WRITE ANSWER
					2)<textarea name=""></textarea></td>
				</td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="btnadd" class="button" value ="Add"></td>
				</tr>
				</table>
				</li></ul></form>

		<h3 align="center"> questions</h3>
		<table width="90%" cellpadding="5" cellspacing="5" class="vtab">
			<tr>
				<th>ID</th>
				<th colspan="3">qoustions</th>
				<th>category</th>
				
				
			</tr>
			<?php
			//show list view
			$i = 1;
			foreach ($result as $key => $value)
				//var_dump($values['category']);
			 {
			 	$question = $value['question'] ." ?";
			 	$cat = $value['category'];
			    $cho1 = $value['cho1'];
			    $cho2 = $value['cho2'];
			    $ansCho3 = $value['ansCho3'];
			    $ansCho4 = $value['ansCho4'];

			    //to display programming languages in the browser
					$question_echo = htmlspecialchars($question, ENT_QUOTES);
					$category_echo = htmlspecialchars($cat, ENT_QUOTES);
				    $c1_echo = htmlspecialchars($cho1, ENT_QUOTES);
				    $c2_echo = htmlspecialchars($cho2, ENT_QUOTES);
				    $c3_echo = htmlspecialchars($ansCho3, ENT_QUOTES);
				    $c4_echo = htmlspecialchars($ansCho4, ENT_QUOTES);
				    //var_dump($key);
			 ?>
			<tr>
				<td align="center"><?php echo $i;?></td>
				<td align="center" colspan="3"><?php echo $question_echo;?> </td>
				<td align="center"><?php echo $category_echo;?></td>

				</tr>
				<tr class="answer">
				<td align="center">A)<?php echo $c1_echo;?></td>
				<td align="center">B)<?php echo $c2_echo;?></td>
				<td align="center">C)<?php echo $c3_echo;?></td>
				<td align="center">D)<?php echo $c4_echo;?></td>

				<td align="center"><a name="deletebtn" <?php echo "href=\"?id=".$value['qid']."\""; ?>>Delete</a></td>

			</tr>
			<?php $i++;}?>
				
		</table>
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