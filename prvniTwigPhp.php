<?php
require_once 'vendor\autoload.php';
//sesna

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('sablony_php');            //cesta k sablonam, kde je hledat
$twig = new Twig_Environment($loader);
//echo $twig->render('index.html', array()); //obsah -> neco



$page = $_REQUEST["page"];
if ($page == "") $page = "hlavniStranka";
echo "$page <br >";
$povolene_stranky = array("index", "kontakt", "onas", "hlavniStranka", "galerie", "tabulka", "cenik", "postranniMenu", "prihlaseni", "registrace");

if (!in_array($page, $povolene_stranky))
{
    echo 'pristupujete na stranku ktera neexistuje';
    exit;
}

$nazev_souboru = "sablony_php/$page.php";

if (file_exists($nazev_souboru) && !is_dir($nazev_souboru))
{
    $obsah = file_get_contents($nazev_souboru); //vypreparuje do string
}

$template = $twig->loadTemplate("index.php");
$template_params = array();
$template_params["obsah"] = "$obsah";
echo $template->render($template_params);



/*$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));    */

?>