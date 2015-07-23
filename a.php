<?php
/*//select questions from optional)
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
    //var_dump($obj);*/
/*if (isset($_POST["save"]))
{
    //Run through all objects set in the POST array
    foreach( $_POST as $key => $value )
    {
        //Set a variable named the same as the input elements name, and with the value
        ${$key} = $value;
    }
}

    $error = false;
    if( empty($name) && empty($pass) ) 
    { 
        $error = true;
        $message = "Fields must be filled...";
    }
    elseif( empty($name) )
    { 
        $error = true;
        $message = "Enter name...";
    }
    elseif( empty($pass) )
    {
        $error = true;
        echo "<script type='text/javascript'>
	    				alert('Please complete all fields');
	    				</script>";
    }

    if( $error == true && isset($message) )
    {
        echo $message."<br><br>";
    }
    else
    {
        echo "Your name " . $name;
        echo "<br/>";
        echo "Your Password " . $pass;
    }*/
?>
<!-- <html><br><br>
<form method="post" action="">
Enter Name  :   <input type="text" name="name" value="<?=(isset($name) ? $name : "")?>"/><br/>
Enter Password  :   <input type="password" name="pass" value="<?=(isset($pass) ? $pass : "")?>" /><br/>
<input type="submit" name="save" value="Save" />
</form>
</html> -->