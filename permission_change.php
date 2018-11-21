<!DOCTYPE html>
<?php  
    session_start(); 
	$con=mysqli_connect("localhost","root","","armada");
	if($con->connect_error){
		die('conld not connect: '.$con->connect_error);
	}

	$sql="SELECT * from user";
	$rs=mysqli_query($con,$sql);
	if(!isset($_SESSION["admin"]) || $_SESSION["admin"]===false)
		echo "<script>alert('You need to log in first');window.location.href='login.php'</script>";
	elseif($_SESSION["authority"]!='Administrator')
		echo "<script>alert('You can\'t change the permission');window.location.href='index.php'</script>";
	
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Permission_change</title>
<link rel="stylesheet" type="text/css" href="bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="ship_add.css" />
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	crossorigin="anonymous"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	crossorigin="anonymous"></script>
<script src="bootstrap-select.min.js"></script>
<script src="jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    $(".mytable button").click(function(){
      var trSeq = $(this).parent().parent().parent().find("tr").index($(this).parent().parent()[0]);
      $.post("permission_getname",{row:trSeq});
    });
})
</script>

</head>
<body style="background-color: #e3f1ff; height: 800px;">


	<h1 style="text-align: center; color: #174867; padding: 20px;">List of Users</h1>



	<ul class="nav">

		<li class="nav-item">

			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle"
					style="margin: 0.7rem" type="button" id="dropdownMenu2"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<button class="dropdown-item" type="button" onclick="window.location.href='welcome.php'">Home</button>
					<button class="dropdown-item" type="button" onclick="window.location.href='ships.php'">Ships</button>
					<button class="dropdown-item" type="button" onclick="window.location.href='login.php'">Log in</button>
				</div>
			</div>
		</li>
	</ul>
	
	<div class="addbox" style="height:600px padding:2% 5% 5% 5%">
	
			
			<form method="post" action="permission_process.php" role="form" class="form">
			<table class="table">	
					<tr class="row">
						<th class="col-sm-6">Username</th>
						<th class="col-sm-3 text-center">Permission</th>
						<th class="col-sm-3 text-center">Change</th>
					</tr>		

			</table>

			<table class="table table-condensed table-hover mytable">	
			<?php
				while($row=mysqli_fetch_array($rs)){
				if($row['Authority']!='Administrator'){
			?>
					<tr class="row">
						<td class="col-sm-6"><?php echo $row['Username']?></td>
						<td class="col-sm-3 text-center"><?php echo $row['Authority']?></td>
						<td class="col-sm-3 text-center">
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#change">Change</button>
						</td>
						<input type="hidden" name="name[]" value="<?php echo $row['Username']?>">
					</tr>		
			<?php
				}}
			?>
			</table>
			<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title" id="myModalLabel">Permission_change</h4>
			            </div>
			            <div class="modal-body">
			            	
							<select class="selectpicker col-sm-10" name="opt">
							<option value="Default">Default</option>
							<option value="Visitor">Visitor</option>
							<option value="Manager">Manager</option>
							</select>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
			                <button type="submit" class="btn btn-primary">confirm</button>
			            </div>
							
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal -->
			</div>
			</form>
	</div>

</body>

</html>

							