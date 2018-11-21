<!DOCTYPE html>

<?php 
session_start();
include 'connect.inc.php';
$conn = connectMySQL();
$shipID=$_POST['detail'];

try{
 
    
    $sql = "SELECT * FROM Ship where shipID = '$shipID'";
    $result = $conn->query($sql);
    
    $path="ships_photo/";
    
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage();
}
?>


<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ship Details in Armada 2019</title>
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

</head>
<body style="background-color: #e3f1ff; height: 1100px;">


	<h1 style="text-align: center; color: #174867; padding: 20px;">Ship's detail in Armada 2019</h1>



	<ul class="nav">

		<li class="nav-item">

			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle"
					style="margin: 0.7rem" type="button" id="dropdownMenu2"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<button class="dropdown-item" type="button" onclick="window.location.href='index.php'">Home</button>
					<button class="dropdown-item" type="button" onclick="window.location.href='ships.php'">Ships</button>
					<button class="dropdown-item" type="button" onclick="window.location.href='login.php'">Log in</button>
				</div>
			</div>
		</li>

	</ul>

  
	<div class="addbox" style="height: 130%">
	<div class="container-fluid">
	
	
	<?php  while ($row=$result->fetch()) { ?> 
	
	<h2 class="row justify-content-center" id="detail"><?php echo $row['shipName']?> </h2>
	<br><br>
	<div class="row justify-content-center">
	<?php  echo "<img src=$path".$row['uniqName'].">";?>
	</div>
	<br>
	<br>
	<p id="detail">Crew : <?php echo $row['crew']?>  members</p> 
	<p id="detail">Type : <?php echo $row['typeShip']?></p> 
	<p id="detail">Launched in : <?php echo $row['launchYear']?></p> 
	<p id="detail">Overall Length : <?php echo $row['length']?> m</p> 
	<p id="detail">Country : <?php echo $row['country']?></p> 
	<br><br>
	<p id="detail"> Something you should know about the ship:</p>
	<p style="color:#174867"><?php echo $row['presentation']?></p>
	<br><br>
	<?php }?>
	</div>
	
	<button type="button" class="btn btn-primary"
				onclick="window.location.href='ships.php'">Return</button>
				
	<button type="submit" class="btn btn-primary" style="float:right" value="submit">download in PDF</button>
	<br><br><br>
	</div>
	
	
	
	</div>
		
	</div>



</body>
</html>
