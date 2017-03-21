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

require ("{$ROOT}{$DS}model{$DS}modelCommentaire.php");

switch ($action){

    case 'Save':

        if (isset($_POST['cmt']) && isset($_POST['iduser'])  && isset($_POST['idprod'])){

            echo "dfbdfbgfb";
            $cmt = $_POST['cmt'];
            $iduser = $_POST['iduser'];
            $idprod = $_POST['idprod'];

            $champs = array('commentaire' , 'idUser', 'idProd', 'valider');
            $values = array($cmt ,$iduser,$idprod,0);

            ModelCommentaire::insertCommentaire($champs,$values);

            header('Location: index.php?controller=produit&action=showProd&id_prod='.$idprod.'');

        }

        break;


    case 'comment':
        $all_Art = ModelCommentaire::getAllCommentaire();
        $controller= 'admin';
        $view = 'Commentaire';
        $action= 'comment';


        break;

    case 'desactivat':

        $id = $_GET['id_cmt'];
        $champs = array('id','valider');
        $values = array($id,0);

        ModelCommentaire::updateCommentaire($champs,$values);

        $all_Art = ModelCommentaire::getAllCommentaire();
        $controller= 'admin';
        $view = 'Commentaire';
        $action= 'comment';

        break;



    case 'activat':


        $id = $_GET['id_cmt'];
        $champs = array('id','valider');
        $values = array($id,1);

        ModelCommentaire::updateCommentaire($champs,$values);

        $all_Art = ModelCommentaire::getAllCommentaire();
        $controller= 'admin';
        $view = 'Commentaire';
        $action= 'comment';


        break;

    case 'removeCmt':

        $id= $_GET['id_cmt'];

        ModelCommentaire::deleteCommentaire('id',$id);

        $all_Art = ModelCommentaire::getAllCommentaire();
        $controller= 'admin';
        $view = 'Commentaire';
        $action= 'comment';

        break;

}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");