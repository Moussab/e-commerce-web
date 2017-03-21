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
require ("{$ROOT}{$DS}model{$DS}modelCategorie.php");


switch ($action) {


    case 'Mobiles':



        break;

    case 'ElectronicsAppliances':

        break;

    case 'Cars':

        break;

    case 'Bikes':

        break;

    case 'Furnitures':

        break;

    case 'Pets':

        break;


    case 'BooksSportsHobbies':

        break;


    case 'Fashion':

        break;


    case 'Kids':

        break;


    case 'Services':

        break;

    case 'Jobs':

        break;

    case 'RealEstate':

        break;
}