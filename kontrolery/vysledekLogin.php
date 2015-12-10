<?php
print_r($_POST);
if (isset($_POST))
{
    if(isset($_POST['username'])&& $_POST['username'] &&
       isset($_POST['password']) && $_POST['password'])
    {
        echo 'prihlasen';
        include_once("../modely/prihlaseniUzivatele.php");
    }
    else
    {
        echo 'Formulář je špatně vyplněn!';
    }

}
else
{
    echo 'Formulář je špatně vyplněn!';
}

?>