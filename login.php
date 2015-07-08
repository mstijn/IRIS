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
    <meta name="description" content="De login pagina voor de game.">
    <meta name="author" content="Max van Stijn">

    <link rel="icon" href="favicon.ico">

    <title>Plofkip - Log In</title>
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />
</head>

<body>

<?php
$melding = '';
$usererror = '';
$passerror = '';
$acc_username = $_SESSION['acc_username'];

if(isset($_POST['submit']))
{
    if(empty($_POST['username']))
    {
        $melding = "<h5>Inlognaam is niet ingevuld</h5>";
    }
    else if(empty($_POST['password']))
    {
        $melding = "<h5>Wachtwoord is niet ingevuld</h5>";
    }
    else
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $passhashed = hash( 'sha256', $pass );

        $sql = 'SELECT *
                FROM users
                WHERE acc_username = "' . strtolower($user) . '"
                AND acc_password = "' . $passhashed . '"
                LIMIT 1';

        $stmt = $db->query($sql);
        $result = $stmt->execute();
        
        $row = $stmt->fetch();

        if(!empty($row))
        {
            $melding = "welkom";
            $loggedin = $_SESSION['logged_in'] = true;

            $_SESSION['acc_username'] = $_POST['username'];
            $_SESSION['acc_level'] = $row['acc_level'];

            if($_SESSION['acc_level'] == '1')
            {
                header("location:dashboard.php");

            }
            if($_SESSION['acc_level'] == '2')
            {
                header("location:admincp.php");

            }
        }else{
            $melding = "<h5>Inloggegevens zijn onjuist</h5>";
        }
    }
}

?>
<div id="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="over.php">Over</a></li>
        <li><a>Log In</a></li>
        <li><a href="register.php">Registreer</a></li>
    </ul>
</div>

<hr>

<div id="main">
    <h1>Inloggen</h1>
    <div id="inlogform">
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Gebruikersnaam:</td>
                    <td><input id="username" type="text" name="username" placeholder="Name"></td>
                </tr>
                <tr>
                    <td>Wachtwoord:</td>
                    <td><input id="password" type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="submit" type="submit">Submit</button></td>
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