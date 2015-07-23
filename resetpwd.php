 <?php  
 require_once('includes/Database.php');

$conn = new database ("localhost","root","admin","survey");
if(!empty($_POST)){
    $username=$_POST['login'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $table='admin';
    $field=array('UserName','Password');
    $where="UserName='$username'";
    $values=array($_POST['login'],$_POST['password1']);
    if ($password1==$password2) {
        $update=$conn->adminupdate($table,$field,$where,$values);
       // var_dump($update);
        if ($update) {
        	header("location:admin.php");
            $msg="update successs full";
        }
        else
        {
            $erorr="update not successs";
        }
    }
    else
        $error="Please Specify a Password Confirmation";

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
								<input type="password" placeholder="Password" value="" name="password1" required>
							</p>
								<p>
								<input type="password" placeholder="Re-type Password" value="" name="password2" required>
							</p>
							
							<p class="submit">
								
								<p class="error"><?php
    								if(isset($error))
      									 echo $error;
    							?></p>
							</p class="bt">
								<input type="submit" value="submit" name="commit" >
								<img src="image/logo.png" alt="" class="psy" y-repeat>
							</p>

	</div>
		<div class="login-help">
		<p>
				
		
				<a href="admin.php">back to login</a>
			</p>
			
		</div>
		</form>
		
</div>
</body>
</html>