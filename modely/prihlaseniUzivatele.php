<?php
/**
 * Created by PhpStorm.
 * User: Kulisek
 * Date: 10.12.2015
 * Time: 17:05
 */

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

$databaze= array("hostname" => "localhost", "username" => "root", "password" => '', "databaze" => "lokorent");
$mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
$mysqli->set_charset("utf8");

if ($mysqli->connect_error)
{
    echo('Nepodařilo se připojit k MySQL serveru');
}
else
{
    echo 'Připojení proběhlo úspěšně ' . $mysqli->host_info . "<br />";
}
$username = $mysqli->escape_string($_POST['username']);
$password = $mysqli->escape_string($_POST['password']);

$prihlasit = true;
/* kontrola existence uzivatele */
$dotaz = "SELECT password FROM uzivatel WHERE username = '" . $username . "'"; //kontrola jestli je takovy uzivatel v db
$vysledek = $mysqli->query($dotaz);
$uzivatel = $vysledek->fetch_assoc();
if(!$uzivatel)
{
    $prihlasit = false;
    echo "Uzivatelské jméno je nesprávné";
}
if($uzivatel["password"] != $password)
{
    $prihlasit = false;
    echo "zadavate spatne heslo";
}

if($prihlasit)
{
    $_SESSION["user"]["login"] = $uresname;
    echo "prihlasen";
    //TODO redirect
    
}