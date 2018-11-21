<!DOCTYPE html>

<?php
session_start();
include 'connect.inc.php';
$conn = connectMySQL();

try {

    $sql = "SELECT shipID,shipName,uniqName,country FROM Ship";
    $result = $conn->query($sql);

    $path = "ships_photo/";
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage();
}
?>


<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ships Armada 2019</title>
<link rel="stylesheet" type="text/css" href="ships.css" />
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

<body style="background-color: #e3f1ff">

	<h1 style="text-align: center; color: #174867; padding: 20px;">Invited
		ships in Armada 2019</h1>

	<ul class="nav">

		<li class="nav-item">

			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle"
					style="margin: 0.7rem" type="button" id="dropdownMenu2"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<button class="dropdown-item" type="button"
						onclick="window.location.href='index.php'">Home</button>
					<button class="dropdown-item" type="button"
						onclick="window.location.href='ships.php'">Ships</button>
					<button class="dropdown-item" type="button"
						onclick="window.location.href='login.php'">Log in</button>
				</div>
			</div>
		</li>
		<li class="nav-item">

			<button class="btn btn-primary" style="margin: 0.7rem" type="button"
				onclick="window.location.href='ship_add.php'">Add a new ship</button>

		</li>
	</ul>


	<div class="shipbox">

	<?php

while ($row = $result->fetch()) {

    ?> 
   
		<div class="ship container-fluid" style="width: 25%; height: 50%">

			<div class="row" style="width: 100%;">
				<div class="col-8">
					<p style="color: #2c86c2; text-align: center;"><?php echo $row['shipName']; ?> </p>
				</div>
				<div class="col-4">
			<?php   if($row['country']='France'){  ?>	
				<img style="width: 40px; height: 30px; float: right" alt=""
						src="france.png" /> <?php } ?>
					</div>
			</div>
			<div class="ship-img row">

				<?php  echo "<img src=$path".$row['uniqName'].">";?>
				<div class="ship-button">

					<ul class="nav">

						<li class="nav-item">

							<form action="ship_details.php" method="post">

								<input type='hidden' name='detail'
									value='<?php echo $row['shipID']?>'>

								<button id="button1" class="btn btn-ifo" style="margin: 0.3rem"
									type="submit" onclick="window.location.href='ship_details.php'">Details</button>

							</form>
						</li>

						<li class="nav-item">

							<form action="ship_modify.php" method="post">
<input type='hidden' name='modify' value='<?php echo $row['shipID']?>'>

								<button id="button2" class="btn btn-primary"
									style="margin: 0.3rem" type="submit"
									onclick="window.location.href='ship_modify.php'">modify</button>

							</form>
						</li>
						<li class="nav-item">
							<button id="button3" class="btn btn-warning"
								style="margin: 0.3rem"
								onclick="window.location.href='ship_delete.php'">delete</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php
}
?>
	</div>


</body>
</html>
