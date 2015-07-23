<?php 
require_once('includes/Database.php');

$conn = new database ("localhost","root","admin","survey");

session_start();
//var_dump($_POST['user_name']);
	if(!empty($_POST)){
		$user=$_POST['login'];
		$password=md5($_POST['password']);
		$username="";
		$psw="";
		$field=array('UserName','Password');
		$table='admin';
		//$condition=array("UserName = '" . $_POST['login'] . "' and Password = '" .md5($_POST['password']) . "'");
		$select=$conn->adminselect($table,$field);

		var_dump($select);
		foreach ($select as $key => $value) {
			foreach ($value as $key => $value) {
				//var_dump($key);
				if ($key=="UserName" ) {
					$username=$value;
					//var_dump($username);
				}
				if( $key=="Password"){
					$psw=$value;
				//var_dump($psw);
			}
			
				}
		}
		/*var_dump($username);
		var_dump($psw);*/
		//var_dump($select);
		
		if(!empty($_POST['login'] && !empty($_POST['password']))){
	  		if ($user==$username && $password==$psw) {
	  			$_SESSION['user_name']=$user;
	  			
	  			header("location:adminview.php");}
	  		else{
	  			/*echo "invalid input";*/
	  			 $_SESSION['errMsg'] = "Invalid username or password";
	  			
	  			header("location:admin.php");
	  			}
	  	}else
	  		{
	  			$_SESSION['errMsg'] = "Invalid username or password";
	  			
	  			/*$error="invalid input";*/
	  			header("location:admin.php");
	  		}
	}
	elseif(isset($_SESSION['user_name']))
	 		{
	 		header("location:addquestion.php");
	}
	else
		header("location:admin.php");


 ?>
 <!-- <!doctype html>
 <html>
 <body>
 	<?php if (isset($msg)):?>
 		<br> <?php echo $msg?> 
 		<br><a href='adminlogout.php'>logout</a>
 	<?php endif;?>
 	<?php
 	
 	if(isset($error))
 		 echo $error;
 	
 	?>
 </body>
 </html> -->