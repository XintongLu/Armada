<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!isset($_SESSION["admin"]) || $_SESSION["admin"]===false)
	echo "<script>alert('You need to log in first');window.location.href='login.php'</script>"; 
$_SESSION['row']=$_POST['row'];
?>