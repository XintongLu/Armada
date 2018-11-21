<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Ship Armada 2019</title>
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
<body style="background-color: #e3f1ff; height: 1200px;">


	<h1 style="text-align: center; color: #174867; padding: 20px;">Add a
		ship in Armada 2019</h1>



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


	<div class="addbox">
		<form action="ship_add_data.inc.php" method="POST" enctype="multipart/form-data" target="post_frame">
			<div class="form-group">
				<label for="shipName">Ship's name </label> <span class="required">*</span>
				<input
					class="form-control" type="text" name="shipName"
					placeholder="Enter your ship's name" required="required"/>
			</div>

			<div class="form-group">
				<label for="crew">Number of crew members</label><span class="required">*</span>
				 <input
					class="form-control" type="text" name="crew"
					placeholder="number of crew members (<500)" required="required"/>
			</div>

			<div class="form-group">
				<label for="typeShip">type of ship</label><span class="required">*</span>
					<select class="form-control" name="typeShip">
			
				<option value="Three-masted barque">Three-masted barque</option>
				<option value="Warship">Warship</option>
				</select>
				 
			</div>
			<div class="form-group">
				<label for="launchYear">Launch in </label> <span class="required">*</span>
				<input
					class="form-control" type="text" name="launchYear"
					placeholder="1500 - 2018" required="required"/>
			</div>
			<div class="form-group">
				<label for="length">Overall length(meters) </label> <span class="required">*</span>
				<input
					class="form-control" type="text" name="length"
					placeholder=" 1 - 100" required="required"/>
			</div>
			<div  class="form-group">
				<label for="country">Country </label> <span class="required">*</span>
				<select class="form-control" name="country">
				<option value="France">France</option>
				<option value="England">England</option>
				</select>
					
			</div>

			<div class="form-group">
				<label for="presentation">Some presentation </label><span class="required">*</span>
				<textarea class="form-control" type="textarea" name="presentation"
					placeholder="give some presentation for your ship (less than 150 words)"
					rows="5" required="required"></textarea>
			</div>
			<div  class="form-group"> 
				<label for="shipPhoto" >Upload a ship photo </label> <span class="required">*</span>
				<input class="form-control-file"
					type="file" name="shipPhoto" required="required"/>
					 <small class="form-text text-muted">gif/jpeg/jpg/pjpeg/x-png/png are allowed. Photo must be less than 1Mo.</small>
			</div>
			<br>
			<button type="submit" class="btn btn-primary" style="float:right" value="submit">Submit</button>
			<button type="button" class="btn btn-primary"
				onclick="window.location.href='ships.php'">Return</button>
				<br><br><br><br>
	
	</div>


	</form>
	</div>



</body>
</html>
