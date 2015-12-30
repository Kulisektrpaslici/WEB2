<?php
session_start();
require_once '/data/web/virtuals/114504/virtual/www/subdom/kulisek/vendor/autoload.php';

$user = "user";
$prihlasen = false;
if (isset($_SESSION[$user]))
{
    echo " uzivatel: " . $_SESSION["user"] . " prihlasen, admin - " . $_SESSION["admin"] . "<br > ";
    $prihlasen = true;
    print_r($_SESSION);
}
else
{
    $prihlasen =  false;
    echo "uzivatel neprihlasen";
   // $_SESSION[$user] = array(); //TODO nutne?
}


        Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('sablony_html');            //cesta k sablonam, kde je hledat
$twig = new Twig_Environment($loader);
//echo $twig->render('index.html', array()); //obsah -> neco


$page = $_REQUEST["page"];
if ($page == "") $page = "hlavniStranka";
echo "$page <br />";
if($prihlasen)
{
    if($_SESSION["admin"] == 1)
    {
        $povolene_stranky = array("index", "kontakt", "onas", "hlavniStranka", "galerie", "tabulka", "cenik", "postranniMenu", "prihlaseni", "registrace", "odhlasit", "novyPrispevek", "kontrolaPrispevku");
    }
    else
    {
        $povolene_stranky = array("index", "kontakt", "onas", "hlavniStranka", "galerie", "tabulka", "cenik", "postranniMenu", "prihlaseni", "registrace", "odhlasit", "novyPrispevek");
    }
}
else
{
    $povolene_stranky = array("index", "kontakt", "onas", "hlavniStranka", "galerie", "tabulka", "cenik", "postranniMenu", "prihlaseni", "registrace");
}

if (!in_array($page, $povolene_stranky))
{
   // echo 'pristupujete na stranku ktera neexistuje';
    $template = $twig->loadTemplate("404.html");
    $param["param"] = "param";
    echo $template->render($param); //TODO bez parametru?
    //TODO do 404 nacpat obrazek ve spravne velikosti pres css
    exit;
}

$nazev_souboru = "sablony_html/$page.html";
//echo $twig->render('index.html', array()); //obsah -> neco}
/* vypln wrapper */
$filename = "kontrolery/$page" . "Kon.php";
function phpWrapperFromFile($filename)
{
    ob_start();
    if (file_exists($filename) && !is_dir($filename))
    {
        $databaze= array("hostname" => "wm96.wedos.net", "username" => "a114504_kulisek", "password" => 'VR82gJdQ', "databaze" => "d114504_kulisek");
        include_once($filename);
    }
    // nacte to z outputu
    $obsah = ob_get_clean();
    return $obsah;
}
$vystup = phpWrapperFromFile($filename);
$obsah = $vystup;


$template = $twig->loadTemplate("index.html");
$template_params = array();
$template_params["admin"] =  $_SESSION["admin"];
$template_params["prihlasen"] =  $prihlasen;
$template_params["obsah"] = "$obsah";
$template_params["stranka"] = "$page.html";
echo $template->render($template_params);


/*$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));    */

?>