<?php
session_start();
require_once '/data/web/virtuals/114504/virtual/www/subdom/kulisek/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('/data/web/virtuals/114504/virtual/www/subdom/kulisek/sablony_html');            //cesta k sablonam, kde je hledat
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

$nazev_souboru = "/data/web/virtuals/114504/virtual/www/subdom/kulisek/sablony_html/$page.html";
$filename = "/data/web/virtuals/114504/virtual/www/subdom/kulisek/kontrolery/$page" . "Kon.php";

/* vypln wrapper */
function phpWrapperFromFile($filename)
{
    ob_start();
    if (file_exists($filename) && !is_dir($filename))
    {
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
$template_params["obsah"] = "$obsah";
$template_params["stranka"] = "$page.html";
echo $template->render($template_params);



?>