<?php

    require_once('includes/Database.php');

    error_reporting(-1);
    ini_set('display_errors', 'On');

    //connect to the database
    $db= new Database('localhost','root','admin','survey');
    $table_name="addquestion";
    $fields=array("question","category","opt1","opt2","opt3","opt4","answer");
    

    if (isset($_POST['btnsubmit']))
    {
    //Check for empty fields
	    if(empty($_POST['question'])||
	    empty($_POST['opt1'])||
	    empty($_POST['opt2'])||
	    empty($_POST['opt3'])||
	    empty($_POST['opt4'])||
	    empty($_POST['answer']))
	    {
	        echo "<script type='text/javascript'>
	    				alert('Please complete all fields');
	    				</script>";
	         
	    }else{

		    //Create short variables
		    $question = ($_POST['question']);
		    $category = ($_POST['category']);
		    $opt1 = ($_POST['opt1']);
		    $opt2 = ($_POST['opt2']);
		    $opt3 = ($_POST['opt3']);
		    $opt4 = ($_POST['opt4']);
		    $answer = ($_POST['answer']);

		    
		    //insert the questions
		    $values=array($question, $category, $opt1, $opt2, $opt3, $opt4, $answer);
		    $db->insert($table_name, $fields, $values);

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
	$fields=array("catid","category");
	$where=array("");
	$list=$db->select('questionCategory',$fields,$where);
	//var_dump($list);
	
	
	//display list added question:
	$fields=array("");
	$where=array("");
	$result=$db->select('addquestion',$fields,$where);
	//var_dump($result);
	
    if (isset($_GET['id']))
    {
	
		//delete function:
		$qid = ($_GET['id']);
		$db->delete($table_name, 'qid='.$qid);
		header("Location:addquestion.php");
	}


?>
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>psyservey</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/exam.css">
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
	<div class="reg">
		<li class="regmode">Hii USER</li>
	</div>
	<div class="navg">	
				<ul >
					<li>HOME</li>
					<li>FEATURES</li>
					<li><a href="#contact">CONTACT US</a></li>
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
					<option value=<?php echo ($value['category'])?>><?php echo ($value['category'])?></option>
				  <?php }?>
				</select></td>
				</tr>
				<tr>
				<td colspan="2">
				<h4>Options:</h4>
						<table width="90%" cellspacing="3" cellspacing="3" class="vtab">
							<tr>
											<td>A)<input type="text" name="opt1" id="opt1"  value =""></td>
											<td>B)<input type="text" name="opt2"  id="opt2" value =""></td>


							</tr>
										<tr>
											<td>C)<input type="text" name="opt3" id="opt3"  value =""></td>
											<td>D)<input type="text" name="opt4" id="opt4"  value =""></td>


							</tr>

						</table>
				</td>
				</tr>
				<tr>
				<td>SELECT ANSWER</td>
				<td><select name="answer"><option value="a">A</option></select></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="btnsubmit" class="button" value ="Add"></td>
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
			foreach ($result as $key => $values)
				//var_dump($values['category']);
			 {?>

			<tr>
				<td align="center"><?php echo $i;?></td>
				<td align="center" colspan="3"><?php echo $values['question'];?> </td>
				<td align="center"><?php echo $values['category'];?></td>

				</tr>
				<tr class="answer">
				<td align="center">A)<?php echo $values['opt1'];?></td>
				<td align="center">B)<?php echo $values['opt2'];?></td>
				<td align="center">C)<?php echo $values['opt3'];?></td>
				<td align="center">D)<?php echo $values['opt4'];?></td>
				<td align="center"><b>answer</b>:<?php echo $values['answer'];?></td>

				<td align="center"><a name="deletebtn" <?php echo "href=\"?id=".$values['qid']."\""; ?>>Delete</a></td>

			</tr>
			<?php $i++;}?>
				
				
		</table>

					

			

</body>
</html>