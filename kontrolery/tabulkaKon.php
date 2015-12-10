<?php

$mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
$mysqli->set_charset("utf8");

if ($mysqli->connect_error)
{
    // echo('Nepodařilo se připojit k MySQL serveru galerie');
}
else
{
    // echo 'Připojení proběhlo úspěšně ' . $mysqli->host_info . "galerie <br />";


$dotaz = "SELECT * FROM lokomotiva";
$vysledek = $mysqli->query($dotaz);

if ($vysledek->num_rows > 0)
{
    while ($radek = $vysledek->fetch_assoc())
    {
        echo '<tr>
                  <td>' . $radek["presdivka"] . '</td>
                  <td>' . $radek["znaceni"] . '</td>
                  <td>' . $radek["trakce"] . '</td>
                  <td>' . $radek["poznamka"] . '</td>
                  </tr>';

        // echo "<br> id: " . $radek["Lokomotiva_cislo_loko"] . " - Text: " . $radek["prispevek"] . " " . $radek["foto"] . "<br>";
    }
}
else
{
    echo "Nemáme zádné příspěvky";
}

$mysqli->close();
}