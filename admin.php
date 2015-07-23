<!-- <?php
  session_start();
  
    if (isset($_SESSION['user_name'])) {
    		header("location:Dasbord.php");
    }
    ?> -->


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

		<form method="post" action="Dasbord.php">
			<div class="login">
				<h1>Login To Psybo Admin</h1>
					
						<p>
							<input type="text" placeholder="Username " value="" name="login" required>
						</p>
							<p>
								<input type="password" placeholder="Password" value="" name="password" required>
							</p>
							
							<p class="submit"><p></p>
							<div id="errMsg">
           					 <p class="error"><?php if(!empty($_SESSION['errMsg'])) { 
           					 		//var_dump($_SESSION['errMsg']);
           					  echo $_SESSION['errMsg']; } ?>
        						</div>
       						 <?php unset($_SESSION['errMsg']); ?></p>
								
							</p class="bt">
								<input type="submit" value="Login" name="commit" >
								<img src="image/logo.png" alt="" class="psy" y-repeat>
							</p>

	</div>
		<div class="login-help">
			<p>
				
		
				<a href="resetpwd.php">Click here to reset it</a>
			</p>
			
		</div>
		</form>
		
</div>
</body>
</html>