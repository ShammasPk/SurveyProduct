<?php

    require_once ('includes/Database.php');

    error_reporting(-1);
    ini_set('display_errors', 'On');

    //connect to the database
    $db         = new Database('localhost', 'root', 'admin', 'survey');
    $table_name = "questionCategory";
    // select function:
    $fields = array("");
    $where  = array("");
    $result = $db->select($table_name, $fields, $where);
    //var_dump($result);


    /*if (isset($_GET['category'])) {
    
    var_dump($_GET['category']);
    //delete function:
    // $category = ($_GET['category']);
    
    }*/
    

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PSYBO|Select Exam</title>
		<link rel="shortcut icon" href="../favicon.ico"> 
				<link rel="stylesheet" href="css/content.css">
								<link rel="stylesheet" href="css/footer.css">


		<!--
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
-->	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<div class="psybo-top clearfix">
				<a class="psybo-icon psybo-icon-prev" href="index.php"><span>Back to Home</span></a>
				<span class="right"><a class="psybo-icon psybo-icon-drop" href=""><span>User Me !!</span></a></span>
			</div>
			
		
			<header>
			<div class="logo">
						<img src="image/logo.png" alt="" class="logo">
				</div>

				<h1>PSYBO ONLINE TEST <span>(Select examination)</span></h1>	
				<!-- <nav id="psybo-demos" class="psybo-demos">
					<a href="#set-1">1</a>
					<a href="#set-2">2</a>
					<a href="#set-3">3</a>
					<a href="#set-4">4</a>
					<a href="#set-5">5</a>
					<a href="#set-6">6</a>
					<a href="#set-7">7</a>
					<a href="#set-8">8</a>
					<a href="#set-9">9</a>
				</nav>-->
			</header>
			<!-- catogory -->
						<div class="container_wrapper" id="set-3">
			<div class="container_main">
			<section >
				<div class="hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3a">
				<form method="POST" action="test1.php">
				<ul>
				<?php
                            //show list view
                            $i = 1;
                            foreach ($result as $key => $value)
                                {
                                    $cat = $value['category'];
                                    //var_dump($cat);
                                    //to display programming languages in the browser
                                    $category_echo = htmlspecialchars($cat, ENT_QUOTES);
                                ?>
				<li>
					<a class="hi-icon hi-icon-images" name="selctcat" <?php echo "href=\"exampage.php?category=".$value['category']."\"";?>>
					<?php echo $category_echo;//show language category ?></a>
				</li>
					
					<?php $i++;}?>
				</form>>
					</ul>


				</div>
				
			</section>
			
				</div>
			</div>
			<footer >
		<div class="footer-details">
	<div class="site-details cat_ft">
		<p>All Right Recieved @ PSYBO Technologies PVT.LTD</p>
		<p>PSYBO Technologies 2015</p>
	</div>
		</div>
					
		</div>
	</footer>

			
</div>
</body>
</script>
</head>