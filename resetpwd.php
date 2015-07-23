 <?php  
 require_once ('includes/Database.php');

error_reporting(-1);
ini_set('display_errors', 'On');

//connect to the database
$db= new Database('localhost', 'root', 'admin', 'survey');
if(!empty($_POST)){
    $username=$_POST['login'];
    $Oldpassword=md5($_POST['Oldpassword']);
    $password1=md5($_POST['password1']);
    $password2=md5($_POST['password2']);
    $table='admin';
    $field=array('UserName','Password');
    $where="UserName='$username'";
    //$condition="UserName='$username'";
    $values=array($_POST['login'],md5($_POST['password1']));
    //var_dump($values);
    $select=$db->adminselect($table,$field);
		var_dump($select);
		foreach ($select as $key => $value) {
			foreach ($value as $key => $value) {
				// var_dump($select);
				/*if ($key=="UserName" and is_string($key) ) {
					$username=$value;
					//var_dump($username);
				}*/
				if( $key=="Password" and is_string($key)){
					$psw=$value;
				}
			}
   
    /*$select=$conn->prepare("SELECT Password FROM $table WHERE UserName='$username'");
    $result=mysqli_query($select);
    var_dump($result);*/
    if ($Oldpassword==$psw) {
    	
   		if ($Oldpassword!=$password1) {
    		if ($password1==$password2) {
        		$update=$db->adminupdate($table,$field,$where,$values);
       // var_dump($update);
        		if ($update) {
        		header("location:admin.php");
            		$msg="update successs full";
       			}
        		else
        		{
            		$erorr="update not successs";
        		}
   			}else
        		$error="Please Specify a Password Confirmation";
    	}else{
    		$error="Oldpassword and new password is equal";
    }

    }else{
    	$error="Oldpassword password is incorrect";
    }


}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>psyservey</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/exam.css">


	</head>
<body class="width">

	<div class="loginmain">

		<form method="post" action="">
			<div class="login">
				<h1> Reset Password</h1>
				
					
						<p>
							<input type="text" placeholder="Username" value="" name="login" required>
						</p>
						<p>
							<input type="password" placeholder="Oldpassword" value="" name="Oldpassword" required>
						</p>
							<p>
								<input type="password" placeholder="Password" value="" name="password1" required>
							</p>
								<p>
								<input type="password" placeholder="Re-type Password" value="" name="password2" required>
							</p>
							
							<p class="submit">
								
								<?php
    								if(isset($error))
      									 echo $error;
    							?>
							</p class="bt">
								<input type="submit" value="submit" name="commit" >
								<img src="image/logo.png" alt="" class="psy" y-repeat>
							</p>

	</div>
		<div class="login-help">
		</div>
		</form>
		
</div>
</body>
</html>