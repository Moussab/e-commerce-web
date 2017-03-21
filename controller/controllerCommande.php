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
require ("{$ROOT}{$DS}model{$DS}modelCommande.php");

switch ($action) {

    case 'done':

        if (isset($_GET['pass']))
            $pass = $_GET['pass'];
        else
            $pass = 0;

        $stop = 0;
        $champs = array('idUser','idProd');
        if(isset($_SESSION['user'])){
            $iduser = $_SESSION['user']['id'];
        }elseif (isset($_SESSION['userAdmin'])){
            $iduser = $_SESSION['userAdmin']['id'];
        }

        if($pass == 1){

            $sql = "Select * from produit";
            $idProds = $_GET['id_prod'];

            try{
                $results = Model::$pdo->query($sql);
                $results->setFetchMode(PDO::FETCH_ASSOC);

                while ($result = $results->fetch()){
                    if ($result['id'] == $idProds) {
                        $prod = $result;
                    }
                }
            } catch(PDOException $e) {
                die();
            }

            $nb = $prod['nbExemplaire'];
            if ( $nb > 0){

                $sql = "UPDATE produit SET nbExemplaire = '".($nb - 1)."' WHERE id = '".($prod['id'])."'";

                try{
                    $req_prep = Model::$pdo->prepare($sql);
                    $req_prep->execute();
                } catch(PDOException $e) {
                    die();
                }
                $values = array($iduser,$idProds);
                ModelCommande::insertCommande($champs,$values);
                $error = ' commande effectuer, vous serez redirection  vers l\'accueil dans un instant.';
            }else{
                $stop = 1;
                $error = ' commande non effectuer stock épuisé, vous serez redirection  vers l\'accueil dans un instant.';

            }

            $values = null;
        }else{
            $max = sizeof($_SESSION['panier']['idProd']);
            $idProds = $_SESSION['panier']['idProd'];
            $nomProd = $_SESSION['panier']['nomProd'];
            $prodPrice = $_SESSION['panier']['prodPrice'];
            $nbProd = $_SESSION['panier']['nbProd'];


            $i = 0;
            while ( $stop == 0 AND  $i < $max) {

                $sql = "Select * from produit WHERE id = '" . ($idProds[$i]) . "'";

                try {
                    $results = Model::$pdo->query($sql);
                    $results->setFetchMode(PDO::FETCH_ASSOC);

                    while ($result = $results->fetch()) {
                            $prod = $result;
                    }
                } catch (PDOException $e) {
                    die();
                }

                $nb = (int)$prod['nbExemplaire'];

                if ($nb < $nbProd[$i])
                    $stop = 1;

                $i++;
            }


            if ($stop == 0){

                for ($i = 0 ; $i < $max ; $i++){

                    $sql = "UPDATE produit SET nbExemplaire = '".($nb - $nbProd[$i])."' WHERE id ='".($idProds[$i])."'";

                    try{
                        $req_prep = Model::$pdo->prepare($sql);
                        $req_prep->execute();
                    } catch(PDOException $e) {
                        die();
                    }

                    $values = array($iduser,$idProds[$i]);
                    ModelCommande::insertCommande($champs,$values);
                    $values = null;
                }

                $_SESSION['panier'] = null;
                ModelPanier::createBasket();
                $error = ' commande effectuer, vous serez redirection  vers l\'accueil dans un instant.';
            }else
                $error = ' commande non effectuer stock épuisé, vous serez redirection  vers l\'accueil dans un instant.';

        }


        $controller= 'panier';
        $view = 'msgFlash';
        $action= 'Panier';


        break;


    case 'cmd':

        $all_Art = ModelCommande::getAllCommande();
        $controller= 'admin';
        $view = 'commande';
        $action= 'cmd';
        break;



    case 'desactivat':

        $id = $_GET['id_cmt'];
        $champs = array('id','valider');
        $values = array($id,0);

        ModelCommande::updateCommande($champs,$values);

        $all_Art = ModelCommande::getAllCommande();
        $controller= 'admin';
        $view = 'commande';
        $action= 'cmd';

        break;



    case 'activat':


        $id = $_GET['id_cmt'];
        $champs = array('id','valider');
        $values = array($id,1);

        ModelCommande::updateCommande($champs,$values);

        $all_Art = ModelCommande::getAllCommande();
        $controller= 'admin';
        $view = 'commande';
        $action= 'cmd';


        break;

    case 'removeCmt':

        $id= $_GET['id_cmt'];

        ModelCommande::deleteCommande('id',$id);

        $all_Art = ModelCommande::getAllCommande();
        $controller= 'admin';
        $view = 'commande';
        $action= 'cmd';

        break;

}


require ("{$ROOT}{$DS}view{$DS}{$layout}.php");