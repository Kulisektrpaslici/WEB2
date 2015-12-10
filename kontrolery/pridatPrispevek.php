<?php
/**
 * Created by PhpStorm.
 * User: Kulisek
 * Date: 10.12.2015
 * Time: 21:27
 */
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//TODO escape nazev stupniho souboru
if(isset($_POST)) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if(isset($_POST["comment"]))
    {
        echo $_POST["comment"];
    }
    if(isset($_POST["znak"]))
    {
        echo $_POST["znak"];
    }

}
// jestli existuje u mne v img
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    //TODO prejmenovat a hodit do databaze
}
// jestli neni moc velikej
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Tenhle obrázek je na nás moc veliký :/";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG") {
    echo "Vkládejte pouze obrázky typu jpg, png, jpeg nebo gif.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $dbOk = false;
// if everything is ok, try to upload file
}
else
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        echo "Obrázek ". basename( $_FILES["fileToUpload"]["name"]). " byl nahrán.";
        $dbOk = true;
    }
    else
    {
        echo "Něco se stalo při nahrávání obrázku, zkus to znovu.";
        $dbOk = false;
    }
}
if($dbOk)
{
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

    $text = $mysqli->escape_string($_POST['comment']);
    $cesta = $mysqli->escape_string(basename($_FILES["fileToUpload"]["name"]));
    $cesta = "img/" . $cesta;
    $znak = $mysqli->escape_string($_POST['znak']);

    $dotaz = "INSERT INTO `lokorent`.`loko_navstevnik_prispevek` (`prispevek`, `foto` ,`Lokomotiva_cislo_loko` ) VALUES (' $text ', '$cesta', '$znak');";
    echo $dotaz;
    $mysqli->query($dotaz);
    $mysqli->close();
}

