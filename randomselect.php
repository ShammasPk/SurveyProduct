<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once ('includes/Database.php');


//connect to the database
$db = new Database('localhost', 'root', 'admin', 'survey');

    //select questions from optional)
    $fields=array("");
    $where=array("category","php");
    $option=$db->random_select('addquestion',$fields,$where);
    //var_dump($option);
    
    //sionselect choice quest
    $where=array("category","php");
    $multi=$db->random_select('addmulti',$fields,$where);
    //var_dump($multi);

    //select objectieve questions
    $where=array("category","php");
    $obj=$db->random_select('addobj',$fields,$where);
    //var_dump($obj);




?>