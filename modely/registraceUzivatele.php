<?php

/**
 * Created by PhpStorm.
 * User: Kulisek
 * Date: 4.11.2015
 * Time: 17:29
 */


/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

$databaze= array("hostname" => "localhost", "username" => "root", "password" => '', "databaze" => "lokorent");
$mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
//$mysqli = new mysqli('','','','');
$mysqli->set_charset("utf8");
//echo $databaze;
if ($mysqli->connect_error)
{
    echo('Nepodařilo se připojit k MySQL serveru');
}
else
{
    echo 'Připojení proběhlo úspěšně ' . $mysqli->host_info . "<br />";
}
$name = $mysqli->escape_string($_POST['name']);
$username =  $mysqli->escape_string($_POST['username']);
$email  = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string($_POST['password']);
$password2 = $mysqli->escape_string($_POST['password2']);

$registrovat = true;
/* kontrola dvojiteho zadani hesla */
if($password != $password2)
{
    echo "Různá hesla!";
    $registrovat = false;
}

/* kontrola existence uzivatele */
$dotaz = "SELECT username FROM uzivatel WHERE username = '" . $username . "'"; //kontrola jestli je takovy uzivatel v db
$vysledek = $mysqli->query($dotaz);
echo "<br /> $dotaz
    <br />$username hhh
<br > radky $vysledek->num_rows";
if($vysledek->num_rows > 0) //kdyz select vratil uzivatele, uz tam tenhle login existuje
{
    $registrovat = false;
    echo "Uživatel s tímto loginem už existuje, zvolte jiný login";
}

if($registrovat != false)
{
$dotaz = "INSERT INTO `lokorent`.`uzivatel` (`name`, `username`, `email`, `password`) VALUES (' $name ', '$username', '$email', '$password');";
//INSERT INTO `lokorent`.`uzivatel` (`name`, `username`, `email`, `password`) VALUES ('jm', 'login', 'mail@email.cz', '12345');
echo $dotaz;
//echo $name;
$mysqli->query($dotaz);
//$vysledek->free_result();
}
else
{

}
$mysqli->close();


?>