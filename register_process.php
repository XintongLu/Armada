<?php
	session_start();
	$username=$_POST['username'];
	$psw=$_POST['psw'];
	$psws=password_hash($psw,PASSWORD_DEFAULT);
	$cfm=$_POST['cfm'];
	$fn=$_POST['fn'];
	$ln=$_POST['ln'];
	$gender=$_POST['gender'];
	$con=mysqli_connect("localhost","root","","armada");
	if($con->connect_error){
		die('conld not connect: '.$con->connect_error);
	}
	
	if($username=="" || $psw=="" || $cfm=="" || $fn=="" || $ln=="")
	{
		echo "<script>alert('All information must be completed');history.go(-1)</script>";
	}elseif(!preg_match('/^\w+$/i',$username)){
		echo "<script>alert('Do not use illegal characters');history.go(-1)</script>";
	}elseif((strlen($psw)<6) || (strlen($psw)>16)){
		echo "<script>alert('Password must be 6-16 bits');history.go(-1)</script>";
	}elseif($psw!=$cfm){
		echo "<script>alert('Please enter the same password twice');history.go(-1)</script>";
	}elseif(!preg_match('/^\w+$/i',$fn)){
		echo "<script>alert('your first name is illegal');history.go(-1)</script>";
	}elseif(!preg_match('/^\w+$/i',$ln)){
		echo "<script>alert('your last name is illegal');history.go(-1)</script>";
	}elseif(mysqli_fetch_array(mysqli_query($con,"SELECT * from user where username='$username'"))){
		echo "<script>alert('username already exist');history.go(-1)</script>";
	}else{
		$sql="INSERT INTO USER (Username,Password,FirstName,LastName,Gender,Authority) VALUES ('$username','$psws','$fn','$ln','$gender','Visitor')";
		if(!(mysqli_query($con,$sql))){
			echo "<script>alert('Registration failed');window.location.href='register.php'</script>";
		}else{
			echo "<script>alert('Welcome to Armada!');window.location.href='index.php'</script>";
			$_SESSION['admin']=true;
		}
	}
?>