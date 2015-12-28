<?php
session_start();
session_destroy();
header("Location: prvniTwig.php");
die();
?>