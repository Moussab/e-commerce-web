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

require ("{$ROOT}{$DS}model{$DS}modelProduit.php");


switch ($action){

    case 'addCart':

        $id_prod = $_GET['id_prod'];
        if(isset($_SESSION['user'])){
            $idUser = $_SESSION['user']['id'];
        }elseif (isset($_SESSION['userAdmin'])){
            $idUser = $_SESSION['userAdmin']['id'];
        }

        $allProd = ModelProduit::getAllProduit();

        $prod = null;

        for ($i = 0 ; $i < sizeof($allProd); $i++){
            if ($allProd[$i]['id'] === $id_prod){
                $prod = $allProd[$i];
            }
        }


        ModelPanier::addProd($prod,1);

        if (isset($_GET['pass']) AND $_GET['pass'] == 1)
            header('Location: index.php?controller=panier&action=schow');
        else
            header('Location: index.php?controller=produit&action=showProd&id_prod='.$id_prod.'');

        break;


    case 'schow':


        $controller= 'panier';
        $view = 'Schow';
        $action= 'Panier';

        break;


    case 'removeProduct':

        $id = $_GET['id_prod'];

            //creation shoppingCart temporaire
            $tmp = array();
            $tmp['idProd'] = array();
            $tmp['nomProd'] = array();
            $tmp['nbProd'] = array();
            $tmp['prodPrice'] = array();

            for ($i = 0; $i < count($_SESSION['panier']['idProd']); $i++) {
                if ($_SESSION['panier']['idProd'][$i] != $id) {
                    // si l'article n'est pas celui que l'on veut supprmier
                    // on l'ajoute au panier temporaire
                    array_push($tmp['idProd'], $_SESSION['panier']['idProd'][$i]);
                    array_push($tmp['nomProd'], $_SESSION['panier']['nomProd'][$i]);
                    array_push($tmp['nbProd'], $_SESSION['panier']['nbProd'][$i]);
                    array_push($tmp['prodPrice'], $_SESSION['panier']['prodPrice'][$i]);
                }else {
                    if($_SESSION['panier']['nbProd'][$i] >1){
                        array_push($tmp['idProd'], $_SESSION['panier']['idProd'][$i]);
                        array_push($tmp['nomProd'], $_SESSION['panier']['nomProd'][$i]);
                        array_push($tmp['nbProd'], $_SESSION['panier']['nbProd'][$i]-1);
                        array_push($tmp['prodPrice'], $_SESSION['panier']['prodPrice'][$i]);
                    }
                }


            }
            //On remplace le shoppingCart en session par notre shoppingCart temporaire à jour
            $_SESSION['panier'] = $tmp;
            // on supprime le panier temporaire
            unset($tmp);


        $controller= 'panier';
        $view = 'Schow';
        $action= 'Panier';



        break;


    case 'removeAllProduct':

        $id = $_GET['id_prod'];

        //creation shoppingCart temporaire
        $tmp = array();
        $tmp['idProd'] = array();
        $tmp['nomProd'] = array();
        $tmp['nbProd'] = array();
        $tmp['prodPrice'] = array();


        $cpt = 0;
        $max = count($_SESSION['panier']['idProd']);
        while ($id != $_SESSION['panier']['idProd'][$cpt] ){
            $cpt++;
        }

        for ($i = $cpt ; $i < ($max-1); $i++) {
            $_SESSION['panier']['idProd'][$i] = $_SESSION['panier']['idProd'][$i + 1];
            $_SESSION['panier']['nomProd'][$i] = $_SESSION['panier']['nomProd'][$i + 1];
            $_SESSION['panier']['nbProd'][$i] = $_SESSION['panier']['nbProd'][$i + 1];
            $_SESSION['panier']['prodPrice'][$i] = $_SESSION['panier']['prodPrice'][$i + 1];
        }

        unset($_SESSION['panier']['idProd'][$i]);
        unset($_SESSION['panier']['nomProd'][$i]);
        unset($_SESSION['panier']['nbProd'][$i]);
        unset($_SESSION['panier']['prodPrice'][$i]);




        $controller= 'panier';
        $view = 'Schow';
        $action= 'Panier';



        break;



}


require ("{$ROOT}{$DS}view{$DS}{$layout}.php");
