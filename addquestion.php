<?php

    require_once('includes/Database.php');

    error_reporting(-1);
    ini_set('display_errors', 'On');

    //connect to the database
    $db= new Database('localhost','root','admin','survey');
    $table_name="addquestion";
    $fields=array("question","category","opt1","opt2","opt3","opt4","answer");
    

   //if (isset($_POST['btnsubmit']))
    session_start();
    if(!empty($_POST))
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
			    $question = $_POST['question'];
			    $category = $_POST['category'];
			    $opt1 = $_POST['opt1'];
			    $opt2 = $_POST['opt2'];
			    $opt3 = $_POST['opt3'];
			    $opt4 = $_POST['opt4'];
				$answer = $_POST['answer'];
				    if($answer==$opt1 || $answer==$opt2 || $answer==$opt3 || $answer==$opt4)
				    {
					    $values=array($question, $category, $opt1, $opt2, $opt3, $opt4, $answer);
					    $db->insert($table_name, $fields, $values);
				    }else{
					    	echo "<script type='text/javascript'>
		    				alert('specify correct answer');
		    				</script>";
					    }
			    
			    //insert the questions

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
	}elseif (isset($_SESSION['user_name'])) {

		
	}
	else
	header("Location:admin.php");




	// display added category for drop down list:
	$fields=array("");
	$where=array("");
	$list=$db->select('questionCategory',$fields,$where);
	//var_dump($list);
	/*foreach ($list as $key => $radio){
			foreach ($radio as $key => $value)
			{
				var_dump($value);
			}}*/

	
	//display list added question:
	$fields=array("");
	$where=array("");
	$result=$db->select('addquestion',$fields,$where);
	//var_dump($result);
	//delete function
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
	<?php
	/*//display error messages:
		$complete = "<script type='text/javascript'>
	    				alert('Please complete all fields');
	    				</script>";*/
	?>




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
		

		<form action="" method="post" >
		<ul>
			<li >
				<h3 align="center"> ADD QUESTIONS</h3>
				<table align="center" width="100%" cellpadding="10" cellspacing="5" border="0" class="vtab"> 
				<tr>
				<td>Enter question</td>
				<td><textarea name="question" value="<?=(isset($question) ? $question : "")?>"></textarea></td>
				</tr>
				<tr>
				<td>SELECT CATEGORY</td>
				<td><select name="category">
				<?php 
					foreach ($list as $key => $value){
						
							//var_dump($value);
					
				 	?>
						
						
				 <option value=<?php echo ($value['category'])?>><?php echo ($value['category'])?></option>
				<?php }?>
					</select></td>
				</tr>
				<tr>
				<td colspan="2">
				<h4>Answers</h4>
						<table width="90%" cellspacing="3" cellspacing="3" class="vtab">
							<tr>
											<td>A)<input type="text" name="opt1" id="opt1"  value ="<?=(isset($opt1) ? $opt1 : "")?>"></td>
											<td>B)<input type="text" name="opt2"  id="opt2" value ="<?=(isset($opt2) ? $opt2 : "")?>"></td>

							</tr>
										<tr>
											<td>C)<input type="text" name="opt3" id="opt3"  value ="<?=(isset($opt3) ? $opt3 : "")?>"></td>
											<td>D)<input type="text" name="opt4" id="opt4"  value ="<?=(isset($opt4) ? $opt4 : "")?>"></td>



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
				<th colspan="3">questions</th>
				<th>category</th>
				
				
			</tr>
			<?php
			//show list view
			$i = 1;

			foreach ($result as $key => $values){
			$question = $values['question'] ." "."?";
			$cat = $values['category'];
		    $opt1 = $values['opt1'];
		    $opt2 = $values['opt2'];
		    $opt3 = $values['opt3'];
		    $opt4 = $values['opt4'];
		    $answer = $values['answer'];
		   
				//to display programming languages in the browser
				$question_echo = htmlspecialchars($question, ENT_QUOTES);
				$category_echo = htmlspecialchars($cat, ENT_QUOTES);
			    $opt1_echo = htmlspecialchars($opt1, ENT_QUOTES);
			    $opt2_echo = htmlspecialchars($opt2, ENT_QUOTES);
			    $opt3_echo = htmlspecialchars($opt3, ENT_QUOTES);
			    $opt4_echo = htmlspecialchars($opt4, ENT_QUOTES);
			    $answer_echo = htmlspecialchars($answer, ENT_QUOTES);
			    //var_dump($key);

			 ?>
			<tr>
				<td align="center"><?php echo $i;?></td>
				<td align="center" colspan="3"><?php echo $question_echo;?> </td>
				<td align="center"><?php echo $category_echo;?></td>

				</tr>
				<tr class="answer">
				<td align="center">A)<?php echo $opt1_echo;?></td>
				<td align="center">B)<?php echo $opt2_echo;?></td>
				<td align="center">C)<?php echo $opt3_echo;?></td>
				<td align="center">D)<?php echo $opt4_echo;?></td>
				<td align="center"><b>answer</b>:<?php echo $answer_echo;?></td>

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