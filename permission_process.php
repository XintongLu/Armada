<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   if(!isset($_SESSION["admin"]) || $_SESSION["admin"]===false)
		echo "<script>alert('You need to log in first');window.location.href='login.php'</script>"; 
	$row=$_SESSION['row'];
	$name=array();
	$name=$_POST['name'];

	$user=$name[$row];
	$opt=$_POST['opt'];

	$con=mysqli_connect("localhost","root","","armada");
	if($con->connect_error){
		die('conld not connect: '.$con->connect_error);
	}
	$sql="Update user set Authority='$opt' where Username='$user'";
	$ver="SELECT * from user where Username='$user'";
	$rs=mysqli_query($con,$ver);
	$row=mysqli_fetch_array($rs);
	if($row){
		if($row['Authority']==$opt){
			echo "<script>alert('Please choose a different permission');window.location.href='permission_change.php'</script>";
		}elseif($opt=="Default"){
			echo "<script>alert('Please choose a permission');window.location.href='permission_change.php'</script>";
		}else{
			$rs=mysqli_query($con,$sql);
			echo "<script>alert('Permission successfully changed');window.location.href='permission_change.php'</script>";
		}
	}else{
		echo "<script>alert('You have to log in first');window.location.href='login.php'</script>";
	   	 }
			

?>