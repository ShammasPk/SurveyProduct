<?php
	require_once('includes/Database.php');

    error_reporting(-1);
    ini_set('display_errors', 'On');

    //connect to the database
    $db= new Database('localhost','root','admin','survey');

    //display list of users:
	$fields=array("");
	$where=array("");
	$result=$db->select('user',$fields,$where);
	var_dump($result);
?>