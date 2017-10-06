<?php 
ob_start();
session_start();

require 'Modules/Functions.php';
require 'Modules/config.php';

function __autoload($classname) {
	try {
		require "classes/".$classname.".class.php";
	} catch (Exception $e) {
		$Message = "Unable to load class ".$classname.". Exception code: ".$e->getCode();
	}
}
$DBM = new DatabaseManager();

if (isset($_SESSION['UserID'])) {
	$user_id = $_SESSION['UserID'];
	$User = new Person($DBM->GetPDO(), $user_id);
} else {
	$User = new Person($DBM->GetPDO());
}


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
	<link rel="stylesheet" href="lib/Skeleton-2.0.4/css/normalize.css" />
	<link rel="stylesheet" href="lib/Skeleton-2.0.4/css/skeleton.css" />
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- custom scripts -->
	<!-- custom styles -->
	<link rel="stylesheet" href="lib/css/style.css" />
	<link rel="stylesheet" href="lib/css/style.scss" />
</head>
<body>
	<?php 
	if (isset($_SESSION['Userdata'])) { 
		?>
		<!-- <nav class="top-nav">
			<ul class="pull-left">
				<li><h4>Endirion v1.2</h4></li>
			</ul>
			<ul class="pull-right">
				<li></li>
			</ul>
		</nav> -->
		<nav class="sidebar-nav">
			<ul class="navbar-top">
				<li>
					<a href="dashboard">
						<div class="icon-container">
							<div class="icon-flexbox">
								<i class="fa fa-home" aria-hidden="true"></i> 
							</div>
						</div>
						<div class="menu-item">Dashboard</div>
					</a>
					<hr />
				</li>
				<li>
					<a href="lopende-aanvragen">
						<div class="icon-container">
							<div class="icon-flexbox">
								<i class="fa fa-home" aria-hidden="true"></i> 
							</div>
						</div>
						<div class="menu-item">Mijn aanvragen</div>
					</a>
					<hr />
				</li>
				<li>
					<a href="aanvraag-toevoegen">
						<div class="icon-container">
							<div class="icon-flexbox">
								<i class="fa fa-home" aria-hidden="true"></i> 
							</div>
						</div>
						<div class="menu-item">Nieuwe aanvraag</div>
					</a>
					<hr />
				</li>
				<li>
					<a href="mijn-gegevens">
						<div class="icon-container">
							<div class="icon-flexbox">
								<i class="fa fa-home" aria-hidden="true"></i> 
							</div>
						</div>
						<div class="menu-item">Mijn gegevens</div>
					</a>
					<hr />
				</li>
				<li>
					<a href="settings">
						<div class="icon-container">
							<div class="icon-flexbox">
								<i class="fa fa-sliders" aria-hidden="true"></i> 
							</div>
						</div>
						<div class="menu-item">Instellingen</div>
					</a>
					<hr />
				</li>
			</ul>
			<ul class="navbar-bottom">
				<li>
					<a href="logout"><div class="icon-container">
						<div class="icon-flexbox">
							<i class="fa fa-power-off" aria-hidden="true"></i> 
						</div>
					</div>
					<div class="menu-item">
						uitloggen
					</div>
				</a>
			</li>
		</ul>
	</nav>
	<?php } ?>
	<main <?php if(isset($_SESSION['Userdata'])){echo 'class="main-loggedin"';} ?>>
		<?php
		var_dump($_SESSION);
		$page = isset($_GET['page']) ? $_GET['page'] : "404.php";
		$page = explode('.', $page)[0];
		echo $page;

		switch ($page) {
			case 'login':
				$file = 'login.php';
				break;
			case "dashboard":
				$file = 'dashboard.php';
				break;
			case 'logout':
				session_destroy();
				break;

			case '404':
			default:
				$file = '404.php';
				break;
		}

		if(!isset($_SESSION['Userdata'])){
			require 'Pages/login.php';
		}elseif(file_exists('Pages/'.$file)){
			require('Pages/'.$file);
		}else{
			$Alert = array();
			array_push($Alert, 'Error');
			array_push($Alert, "The requested page doesn't exist");

			require('Pages/404.php');

			RedirectToPage(1.4,'dashboard');
		}

		if (isset($Alert)) {
			Alert($Alert);
		}
		?>
	</main>
</body>
</html>