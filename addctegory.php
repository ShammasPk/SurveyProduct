<?php

require_once ('includes/Database.php');

error_reporting(-1);
ini_set('display_errors', 'On');

//connect to the database
$db         = new Database('localhost', 'root', 'admin', 'survey');
$table_name = "questionCategory";
$fields     = array("category");

if (isset($_POST['addCategorybtn'])) {
	//Check for empty fields
	if (empty($_POST['category'])) {
		echo "<script type='text/javascript'>
    				alert('Please complete all fields');
    				</script>";
		//exit();
	} else {
		//Create short variable and filter
		$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
		
		//insert the questions
		$values = array($category);
		$db->insert($table_name, $fields, $values);
	}
}
// insert function:
$fields = array("");
$where  = array("");
$result = $db->select($table_name, $fields, $where);
//var_dump($result);

if (isset($_GET['id'])) {
	
	//delete function:
	$id = ($_GET['id']);
	$db->delete($table_name, 'catid='.$id);
	header("Location:addctegory.php");
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
				<h3 align="left"> ADD category</h3>
				<table align="center" width="100%" cellpadding="10" cellspacing="5" border="0">
				<tr>
				<td>Enter Category Name</td>
				<td><input type="text" name="category"></td>
				</tr>
				<tr >
				<td></td>
				<td style="padding:15px;"><input type="submit" name="addCategorybtn" class="button" value ="Add"></td>
				</tr>
				</table>
				</li></ul></form>

		<h3 align="center"> Categoiries</h3>
		<form method="get">
		<table width="90%" cellpadding="5" cellspacing="5" class="vtab">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Edit</th>
			</tr>
			<?php
			//show list view
			$i = 1;
			foreach ($result as $key => $value) {?>
			<tr>
			<td align="center"><?php echo $i;?></td>
			<td align="center"><?php echo $value['category'];//show language category ?></td>

			<td align="center"><a name="delete" <?php echo "href=\"?id=".$value['catid']."\"";?>>Delete</a></td>


			</tr>
	<?php $i++;}?>


		</table>
		</form>





</body>
</html>