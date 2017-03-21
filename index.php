<?php

session_start();

/**
 * include_once 'config/db.php';
 *
 *
 * $connect = new db();
 * $bdd = $connect->connectDB();
**/

    $ROOT = __DIR__;

    $DS = DIRECTORY_SEPARATOR;

    require_once ("{$ROOT}{$DS}model{$DS}modelPanier.php");
ModelPanier::createBasket();

    if ( !isset($_GET['action']) && !isset($_GET['controller']) ) /* soit page d'acceuil */
    {
        $action = "acceuil" ;
    }
    else if(!isset($_GET['action'])) // s'il n a pas d'action
        $action = "readAll";
    else
        $action = $_GET["action"]; // on recupère l'action


    if(!isset($_GET["controller"])) // par defaut
        $controller = 'modele';
    else
        $controller = $_GET["controller"];


    $view ='';

    $layout='viewVisitor';

    if(isset($_SESSION['user']))
    {
        $layout ='viewConnected';
    }
    else
        if(isset($_SESSION['userAdmin']))
        {
            $layout='viewAdmin';
        }


//session_unset($_SESSION['panier']);

    switch ($controller){
        case 'modele':
             require("controller{$DS}controllerModele.php");
            break;
        case 'category':
              require ("controller{$DS}controllerCategorie.php");
            break;
        case 'user':
            require ("controller{$DS}controllerUser.php");
            break;
        case 'admin':
            require ("controller{$DS}controllerAdmin.php");
            break;
        case 'produit':
            require ("controller{$DS}controllerProduit.php");
            break;
        case 'commentaire':
            require ("controller{$DS}controllerCommentaire.php");
            break;
        case 'commande':
            require ("controller{$DS}controllerCommande.php");
            break;
        case 'panier':
            require ("controller{$DS}controllerPanier.php");
            break;
        case 'search':
            require ("controller{$DS}controllerSearch.php");
            break;

    }


?>
