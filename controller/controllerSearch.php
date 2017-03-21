<?php


$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';

}

if(isset($_SESSION['userAdmin']))
{
    $layout='viewAdmin';
}
$error ='';
require ("{$ROOT}{$DS}model{$DS}modelRecherche.php");

$view = 'Empty';
if(isset($_POST['search'])){
    $array = ModelRecherche::search($_POST['search']);
    if(!empty($array))
        $view ='Result';
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");