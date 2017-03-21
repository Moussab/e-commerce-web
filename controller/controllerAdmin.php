<?php


$layout='viewVisitor';

if(isset($_SESSION['user']))
{
    $layout ='viewConnected';
}
else if(isset($_SESSION['userAdmin']))
{
    $layout='viewAdmin';
}

$error ='';

require ("{$ROOT}{$DS}model{$DS}modelAdmin.php");


switch ($action){

    case 'Profile':
        $usr = $_SESSION['userAdmin'];
        $pagetitle = ucfirst($usr['nom']);
        $view ='Profile';
        break;

    case 'product':
        $pagetitle = 'Product management';
        $view ='Product';
        break;

    case 'cmd':
        $pagetitle = 'Commande management';
        $view ='Commande';
        break;

    case 'users':
        $pagetitle = 'Users Management';
        $view ='Users';
        break;

    case 'comment':
        $pagetitle = 'Commentaire Management';
        $view ='Commentaire';
        break;

    case 'Settings':
        $pagetitle = 'Settings';
        $view ='Settings';
        break;

    case 'Logout':
        if(isset($_SESSION['user']) || isset($_SESSION['userAdmin'])){
            $pagetitle='Logged Out';

            if (isset($_SESSION['user']))
                session_unset($_SESSION['user']);
            else
                session_unset($_SESSION['userAdmin']);

            header('Location: index.php');
        }else{
            $pagetitle ='Login';
            $view='Login';
        }
        break;


    case 'users':



        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");