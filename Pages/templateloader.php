<?php 
ob_start();
session_start();

require '../Modules/Functions.php';
require '../Modules/config.php';

function __autoload($classname) {
	try {
		require "../classes/".$classname.".class.php";
	} catch (Exception $e) {
		$Message = "Unable to load class ".$classname.". Exception code: ".$e->getCode();
	}
}

$DBM = new DatabaseManager();


var_dump($TemplateFiles);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Endirion</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
	<!-- Skeleton -->
	<link rel="stylesheet" href="../lib/Skeleton-2.0.4/css/normalize.css" />
	<link rel="stylesheet" href="../lib/Skeleton-2.0.4/css/skeleton.css" />
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- custom styles -->
	<link rel="stylesheet" href="../lib/stylesheets/style.css" />
	<link rel="stylesheet" href="../lib/sass/style.scss" />
	<script src="lib/Js/Alert.js" type="text/javascript"></script>
</head>
<body>

	<div class="container">
		<form action="" method="POST">
			<div class="row">
				<div class="six columns">
					<label for="Select">Select Template: </label>
					<select class="u-full-width" name="filename" id="filename">	
						<?php 
						for ($i=2; $i < sizeof($TemplateFiles); $i++) { 
							echo "<option>".$TemplateFiles[$i]."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</form>
	</div>
</body>
</html>