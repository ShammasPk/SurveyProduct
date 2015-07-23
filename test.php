<?php 
$_SESSION = 0;
if($_SESSION['session_count'] == 0) { 
$_SESSION['session_count'] = 1;
$_SESSION['session_start_time']=time();
} else {
$_SESSION['session_count'] = $_SESSION['session_count'] + 5;
}

$session_timeout = 60; //  (in sec)

$session_duration = time() - $_SESSION['session_start_time'];
if ($session_duration > $session_timeout) { 
session_unset();
session_destroy();
session_start();
session_regenerate_id(true);
$_SESSION["expired"] = "yes";
header("Location: admin.php"); // Redirect to Login Page
} else {
$_SESSION['session_start_time']=time();
}
?>