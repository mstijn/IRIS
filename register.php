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
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="De registreerpagina voor de game.">
    <meta name="author" content="Max van Stijn">
	
    <link rel="icon" href="favicon.ico">

	<title>Plofkip - registreer</title>
	<link href="css/layout.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />
	<script src="js/passcheck.js" type="text/javascript"></script>



</head>

<body>
<?php
if(isset($_POST['name']))
{
	$error = FALSE;

	foreach($_POST as $field)
	{
		if(empty($field))
		{
			$error = TRUE;
		}
		
	}

	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		
	}else{		
		$error = TRUE;
	}
	
	if(!$error)
	{
		$stmt = $db->prepare("INSERT INTO users(acc_username, acc_password, acc_email, acc_age, acc_adres) VALUES (:username, :password, :email, :age, :adres)");
		$stmt->bindParam(':username', $uname);
		$stmt->bindParam(':password', $pword);
		$stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':adres', $adres);

		$uname = strtolower($_POST['name']);
		$pword = hash('sha256', $_POST['password']);
		$email = $_POST['email'];
        $age = $_POST['leeftijd'];
        $adres = $_POST['adres'];

		$stmt->execute();

		header("Location: login.php");
	}
	else
	{
		$errormsg = '<div class="alert">
                        &nbsp;<strong> Warning:</strong>Failed to register, please fill in the empty fields.
                    </div>';
	}

}	
?>
<div id="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="over.php">Over</a></li>
        <li><a href="login.php">Log In</a></li>
        <li><a>Registreer</a></li>
    </ul>
</div>

<hr>

    <div id="main">
        <?php
        if(isset($errormsg))
        {
            echo $errormsg;
        }
        ?>
        <h1>Registreren</h1>
        <div id="inlogform">
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>Gebruikersnaam:</td>
                        <td><input id="username" type="text" name="name" placeholder="Name"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input id="email" type="text" name="email" placeholder="E-mail"></td>
                    </tr>
                    <tr>
                        <td>Wachtwoord:</td>
                        <td><input id="password" type="password" name="password" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td>Herhaal Wachtwoord:</td>
                        <td><input id="password2" type="password" name="password" onkeyup="checkPass(); return false;" placeholder="Password"><td><span id="ConfirmMessage" class="ConfirmMessage"></span></td></td>
                    </tr>
                    <tr>
                        <td>Leeftijd:</td>
                        <td><input id="leeftijd" type="text" name="leeftijd" placeholder="Leeftijd: (ex: 17)"></td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td><input id="adres" type="text" name="adres" placeholder="Adres: (ex: Von Flotowlaan 1)"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input name="submit" type="submit"></input></td>
                    </tr>
                </table>

    		</form>

        </div>
    </div>

    <div id="footer">
        <h2>&copy; Plofkip - 2099</h2>
    </div>

</body>
</html>