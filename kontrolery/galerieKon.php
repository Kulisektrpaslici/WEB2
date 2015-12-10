<?php

$mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
$mysqli->set_charset("utf8");
echo $databaze["hostname"] . $databaze["username"] . $databaze["password"];
if ($mysqli->connect_error)
{
    echo('Selhalo připojení k databázi, zkuste obnovit prohlížeč. Pokud problém přetrvává napište na podporu.');

}
else
{
    echo 'Připojení proběhlo úspěšně ' . $mysqli->host_info . "galerie <br />";


$dotaz = "SELECT * FROM loko_navstevnik_prispevek";
$vysledek = $mysqli->query($dotaz);

    if ($vysledek->num_rows > 0)
    {
        while ($radek = $vysledek->fetch_assoc())
        {
            echo '<div class="col-sm-4">
        <a href="'. $radek["foto"]. '" class="thumbnail">
            <img src="'. $radek["foto"]. '" alt="alt" style="width:154px;height:115px">
            <p>'. $radek["Lokomotiva_cislo_loko"] .' ' .$radek["prispevek"] .'</p>
        </a>
    </div>';
            // echo "<br> id: " . $radek["Lokomotiva_cislo_loko"] . " - Text: " . $radek["prispevek"] . " " . $radek["foto"] . "<br>";
        }
    }
else
{
    echo "Nemáme zádné příspěvky";
}

$mysqli->close();}