<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Armada 2019</title>

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

	<h1 style="text-align: center; color: #174867; padding: 20px;">Welcome
		to Armada 2019!</h1>


	<img
		style="position: absolute; left: 20%; width: 60%; height: 75%; box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.4);"
		src="welcome.jpg">

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

	</ul>
</body>

</html>
