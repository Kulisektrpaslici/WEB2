<?php
session_start();
$key = "user";
if (isset($_SESSION[$key]))
{
    // ano, existuje
}
else
{
    // ne, neexistuje, musim ho zalozit
    $_SESSION[$key] = array();
}
        require_once 'vendor\autoload.php';


        Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('sablony_html');            //cesta k sablonam, kde je hledat
$twig = new Twig_Environment($loader);
//echo $twig->render('index.html', array()); //obsah -> neco


$page = $_REQUEST["page"];
if ($page == "") $page = "hlavniStranka";
echo "$page <br />";
$povolene_stranky = array("index", "kontakt", "onas", "hlavniStranka", "galerie", "tabulka", "cenik", "postranniMenu", "prihlaseni", "registrace");

if (!in_array($page, $povolene_stranky))
{
    echo 'pristupujete na stranku ktera neexistuje';
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
        $databaze= array("hostname" => "localhost", "username" => "root", "password" => '', "databaze" => "lokorent");
        include_once($filename);
    }
    // nacte to z outputu
    $obsah = ob_get_clean();
    return $obsah;
}
$vystup = phpWrapperFromFile($filename);
$obsah = $vystup;

/* vypln wrapper */
$template = $twig->loadTemplate("index.html");
$template_params = array();
$template_params["obsah"] = "$obsah";
$template_params["stranka"] = "$page.html";
echo $template->render($template_params);


/*$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));    */

?>