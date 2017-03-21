<?php



    $pagetitle ='ENIRMA Shop';


    switch ($action){

        case 'acceuil' : // page d'acceuil
        {
            $view = "Welcome";
            require ("{$ROOT}{$DS}view{$DS}{$layout}.php");
            break ;
        }
}