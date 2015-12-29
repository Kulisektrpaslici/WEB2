<?php
/**
 * Created by PhpStorm.
 * User: Kulisek
 * Date: 28.12.2015
 * Time: 14:55
 */

$mysqli = new mysqli($databaze["hostname"], $databaze["username"], $databaze["password"], $databaze["databaze"]);
$mysqli->set_charset("utf8");

if ($mysqli->connect_error)
{
    // echo('Nepoda�ilo se p�ipojit k MySQL serveru galerie');
}
else
{
    // echo 'P�ipojen� prob�hlo �sp�n� ' . $mysqli->host_info . "galerie <br />";


    $dotaz = "SELECT * FROM loko_navstevnik_prispevek WHERE schvaleno = 0";
    $vysledek = $mysqli->query($dotaz);

    if ($vysledek->num_rows > 0)
    {
        while ($radek = $vysledek->fetch_assoc())
        {
          /*  if(isset($radek["prispevek"]))
                $prispevek = $radek["prispevek"];
            else
                $prispevek = "Nen� p�i�azen ��dn� popis.";*/
            echo '<tr class="success">
                    <td> ' . $radek["Lokomotiva_cislo_loko"] . '</td>
                    <td>' . $radek["prispevek_ID_uzivatel"] . '</td>
                    <td>' . $prispevek . '</td>
                    <td class="column-right">
                        <button class="btn btn-success">Potvrdit</button>
                        <button class="btn btn-danger">Odstranit</button>
                    </td>
                  </tr>';

            // echo "<br> id: " . $radek["Lokomotiva_cislo_loko"] . " - Text: " . $radek["prispevek"] . " " . $radek["foto"] . "<br>";
        }
    }
    else
    {
        echo "Nem�me z�dn� p��sp�vky";
    }

    $mysqli->close();
}