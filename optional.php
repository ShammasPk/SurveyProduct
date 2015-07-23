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
		    $question = filter_var($_POST['question'], FILTER_SANITIZE_STRING);
		    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
		    $opt1 = filter_var($_POST['opt1'], FILTER_SANITIZE_STRING);
		    $opt2 = filter_var($_POST['opt2'], FILTER_SANITIZE_STRING);
		    $opt3 = filter_var($_POST['opt3'], FILTER_SANITIZE_STRING);
		    $opt4 = filter_var($_POST['opt4'], FILTER_SANITIZE_STRING);
		    $answer = filter_var($_POST['answer'], FILTER_SANITIZE_STRING);

		    
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
	$fields=array("");
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
		<li class="regmode">Hii USER</li>
	</div>
	<div class="navg">	
				<ul >
					<li><a href="text.html">text questions </a></li>
					<li>FEATURES</li>
					<li>CONTACT US</li>
				</ul></div>
	<div class="logo">
		<img src="image/logo.png" alt="" class="logo">
	</div>
		</div>
	</div>
	<div class="content">

	<div class="main">
		<h1>Admin panel</h1>
		 <ul>  <li class="que"><a href="checkbox.html">check box </a> </li></ul>

		<form action="" method="post" >
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
				<h4>Answers</h4>
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
				<td>CORRECT ANSWER
				<textarea name="answer"></textarea></td>
			
				<td> 
			
				</select>
				</td>
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