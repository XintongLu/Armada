<?php
	session_start();
	$posts=$_POST;
	foreach($posts as $key=> $value){
		$posts[$key]=trim($value);
	}
	$username=$posts['username'];
	$psw=$posts['psw'];
	$con=mysqli_connect("localhost","root","","armada");
	if($con->connect_error){
		die('conld not connect: '.$con->connect_error);
	}
	$sql="SELECT * from user where username='$username'";
	$rs=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($rs);
	if($row){
		if(password_verify($psw,$row['Password'])){
			$_SESSION['admin']=true;
			$_SESSION['username']=$username;
			$_SESSION['authority']=$row['Authority'];
			echo "<script>alert('Login successfully');window.location.href='$_SESSION[site]'</script>";
		}else{
			echo "<script>alert('The username does\'nt exist or the password is incorrect');window.location.href='login.php'</script>";
		     }
			
	}else{
		echo "<script>alert('The username does\'nt exist or the password is incorrect');window.location.href='login.php'</script>";
	}
?>