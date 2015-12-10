<?php
print_r($_POST);
if (isset($_POST)) // V poli _POST něco je, odeslal se formulář
{
    if (isset($_POST['email']) && $_POST['email'] &&
        isset($_POST['username']) && $_POST['username'] &&
        isset($_POST['password']) && $_POST['password'] &&
        isset($_POST['password2']) && $_POST['password2'] &&
        isset($_POST['name']) && $_POST['name'] &&
        $_POST['password'] == $_POST['password2']) //&&
       // isset($_POST['rok']) && $_POST['rok'] == date('Y'))
    {
        include "../modely/registraceUzivatele.php";
        /* vypis - neshodujici se hesla */
    }
    else
    {
        echo 'Formulář není správně vyplněný! neco chybí';
    }
}
else
{
    echo 'Formulář není správně vyplněný! chybí celý post';
}
?>