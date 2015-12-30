<?php

/**
 * Created by PhpStorm.
 * User: Kulisek
 * Date: 28.12.2015
 * Time: 14:22
 */
class isAdmin
{
    function __construct()
    {

    }

    public function admin($username)
    {
        $databaze= array("hostname" => "localhost", "username" => "root", "password" => '', "databaze" => "lokorent");
        $mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
        $mysqli->set_charset("utf8");

        if ($mysqli->connect_error)
        {
            echo('Nepodařilo se připojit k MySQL serveru');
        }
        else
        {
           // echo 'Připojení proběhlo úspěšně ' . $mysqli->host_info . "<br />";
        }


        $dotaz = "SELECT administrator FROM uzivatel WHERE username = '" . $username . "'"; //kontrola jestli je uzivatel admin
        $vysledek = $mysqli->query($dotaz);
        $uzivatel = $vysledek->fetch_assoc();
        return $uzivatel;
    }
}