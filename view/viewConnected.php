<!DOCTYPE html>
<html>
<?php
require('head.php');
?>
<body>
<?php
require ('header.php');
require ('navLogged.php');


$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";
$filename = "view".ucfirst($view) . ucfirst($controller) . '.php';
require "{$filepath}{$filename}";


?>
<?php
require ('Footer.php');
?>
?>
</body>
</html>