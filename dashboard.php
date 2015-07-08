<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 1/6/2015
 * Time: 2:43 PM
 */
    require("config.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="De registreerpagina voor de game.">
    <meta name="author" content="Max van Stijn">

    <link rel="icon" href="favicon.ico">

    <title>Plofkip - Dashboard</title>
    <!--<link href="css/layout.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
</head>


<?php
$acc_username = $_SESSION['acc_username'];

if(empty($acc_username))
{
    header("location:login.php");
}


function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$sql = 'SELECT acc_age, acc_adres FROM users';
$stmt = $db ->prepare($sql);
$stmt->execute();

$row = $stmt->fetch();

?>
<body>
	<div class="container">
		<div id="header">
			<nav class="nav">
				<ul>
					<li class="dashboard active"><a>Dashboard</a></li>
					<li class="projects"><a href="highscores.php">Highscore</a></li>
					<li class="issues"><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
		<div id="main">
			<div id="sidebar">
				<div class="inside">
					<h2>Plofkip <span>User Information</span></h2>
					
					<ul>
						<li>
							Logged in as: <?php echo $acc_username; ?>
						</li>
						<li>
							Current IP: <?php echo get_client_ip(); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div class="inside">
				<h3>Dashboard<span>Your own control panel</span></h3>
			
			<div class="pad">
				<div class="blue-box">
					<div class="inside-pad">
						<h4>Dashboard</h4>
						
						<ul class="activity">
						
							<li>
								<div class="tag">
									<label class="label chill">Leeftijd</label>
								</div>
								<div class="data">
									<p><?php echo $row['acc_age']; ?></p>
								</div>
							</li>
							
							<li>
								<div class="tag">
									<label class="label chill">Adres</label>
								</div>
								<div class="data">
									<p><?php echo $row['acc_adres']; ?></p>
								</div>
							</li>
						</ul>
						<a href="#" class="view">Plofkip&trade;</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>