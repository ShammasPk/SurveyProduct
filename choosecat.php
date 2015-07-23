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
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>psyservey</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/exam.css">
    </head>
    
    <body>
        <div class="header">
            <div class="hedmain">
                <div class="reg">
                    <li class="regmode">Hii USER</li>
                </div>
                <div class="navg">
                    <ul>
                            <li><a href="exam.html">HOME</a>
                            </li>
                             <li>FEATURES</li>
                            <li><a href="#contact">CONTACT US</a>
                            </li>
                    </ul>
                </div>
                <div class="logo">
                    <img src="image/logo.png" alt="" class="logo">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="main">
            <div class="category">
                <form method="POST" action="exampage.php">
                    <h1>WELCOME TO PSYBO ONLINE TEST</h1>
                    <h3 align="center"> CHOOSE YOUR EXAM </h3>
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

                 
                     
                            <li align="center"><a class="cir green" name="selctcat" <?php echo "href=\"exampage.php?category=".$value['category']."\"";?>> 
                                                <?php echo $category_echo;//show language category ?></a>
                            </li>
                            <?php $i++;}?>    
                    </form>
                    </ul>
                </div>
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