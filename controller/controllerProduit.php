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

    case 'AddProduct':
        $usr = $_SESSION['userAdmin'];
        $pagetitle = ucfirst($usr['nom']);
        $view ='AddProduct';
        break;

    case 'storeProduct':

        if (isset($_POST['nom']) && isset($_POST['date'])  && isset($_POST['marque']) && isset($_POST['categorie'])
            && isset($_POST['prix']) && isset($_POST['condition']) && isset($_POST['desc'])
            && isset($_POST['numTel']) && isset($_POST['nbExemplaire']) && isset($_POST['taille']) && isset($_POST['color'])){

            $name = $_POST['nom'];
            $date = $_POST['date'];
            $categorie = $_POST['categorie'];
            $marque = $_POST['marque'];
            $prix = $_POST['prix'];
            $cond = $_POST['condition'];
            $desc = $_POST['desc'];
            $numTel = $_POST['numTel'];
            $nbExemplaire = $_POST['nbExemplaire'];
            $taille = $_POST['taille'];
            $color = $_POST['color'];
            $destinationPicProf = 'uploads/profilePicture.png';

            if (isset($_FILES['picProf'])){
                $picProf = $_FILES['picProf'];
                $target_dir = "uploads/";
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["picProf"]["name"]);
                $extension = end($temp);

                if ((($_FILES["picProf"]["type"] == "image/gif")
                        || ($_FILES["picProf"]["type"] == "image/jpeg")
                        || ($_FILES["picProf"]["type"] == "image/jpg")
                        || ($_FILES["picProf"]["type"] == "image/pjpeg")
                        || ($_FILES["picProf"]["type"] == "image/x-png")
                        || ($_FILES["picProf"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts)){

                    $destinationPicProf = $target_dir.$_FILES["picProf"]["name"];
                    move_uploaded_file($_FILES["picProf"]["tmp_name"], $target_dir.$_FILES["picProf"]["name"]);

                }

            }


            $champs = array('idCategorie' , 'nomProd', 'dateAjout', 'marque', 'nbVue', 'prix','description', 'numTelVendeur' ,'nbExemplaire','taille','couleur','imgUrl','etat');
            $values = array($categorie ,$name,$date,$marque,0,$prix,$desc,$numTel,$nbExemplaire,$taille,$color,$destinationPicProf,$cond);

            ModelProduit::insertProduit($champs,$values);


            $all_Art = ModelProduit::getAllProduit();
            $controller= 'admin';
            $view = 'product';
            $action= 'produit';
            //header('Location: index.php?controller=admin&action=Settings');

        }else{
            $view="Error";
            $error ='Compte Existant';
        }

        break;

    case 'getProduct':
        $all_Art = ModelProduit::getAllProduit();
        $controller= 'admin';
        $view = 'product';
        $action= 'produit';
        break;

    case 'removeProduct':

        $id_prod= $_GET['id_prod'];

        ModelProduit::deleteProduit('id',$id_prod);

        $all_Art = ModelProduit::getAllProduit();

        $controller= 'admin';
        $view = 'product';
        $action= 'produit';
        break;

    case 'updateProduct':
        $id_prod= $_GET['id_prod'];
        $prod = null;
        $all_Art = ModelProduit::getAllProduit();


        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            if($id_prod == $all_Art[$i]['id']){
                $prod = $all_Art[$i];
            }
        }

        $view ='updateProduct';
        /*$controller= 'admin';
        $view = 'product';
        $action= 'produit';*/
        break;


    case 'upProduct':

        if (isset($_POST['nom']) && isset($_POST['date'])  && isset($_POST['marque']) && isset($_POST['categorie'])
            && isset($_POST['prix']) && isset($_POST['condition']) && isset($_POST['desc'])
            && isset($_POST['numTel']) && isset($_POST['nbExemplaire']) && isset($_POST['taille']) && isset($_POST['color'])) {

            $name = $_POST['nom'];
            $date = $_POST['date'];
            $categorie = $_POST['categorie'];
            $marque = $_POST['marque'];
            $prix = $_POST['prix'];
            $cond = $_POST['condition'];
            $desc = $_POST['desc'];
            $numTel = $_POST['numTel'];
            $nbExemplaire = $_POST['nbExemplaire'];
            $taille = $_POST['taille'];
            $color = $_POST['color'];
            $destinationPicProf = 'uploads/profilePicture.png';



            if (isset($_FILES['picProf'])) {
                $picProf = $_FILES['picProf'];
                $target_dir = "uploads/";
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["picProf"]["name"]);
                $extension = end($temp);

                if ((($_FILES["picProf"]["type"] == "image/gif")
                        || ($_FILES["picProf"]["type"] == "image/jpeg")
                        || ($_FILES["picProf"]["type"] == "image/jpg")
                        || ($_FILES["picProf"]["type"] == "image/pjpeg")
                        || ($_FILES["picProf"]["type"] == "image/x-png")
                        || ($_FILES["picProf"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts)
                ) {

                    $destinationPicProf = $target_dir . $_FILES["picProf"]["name"];
                    move_uploaded_file($_FILES["picProf"]["tmp_name"], $target_dir . $_FILES["picProf"]["name"]);

                }

            }

            $id = $_POST['id'];
            $champs = array('id','idCategorie', 'nomProd', 'dateAjout', 'marque', 'nbVue', 'prix', 'description', 'numTelVendeur', 'nbExemplaire', 'taille', 'couleur', 'imgUrl', 'etat');
            $values = array($id,$categorie, $name, $date, $marque, 0, $prix, $desc, $numTel, $nbExemplaire, $taille, $color, $destinationPicProf, $cond);

            ModelProduit::updateProduit($champs,$values);

            $all_Art = ModelProduit::getAllProduit();
            $error = ' Modification effectuer, vous serez redirection  vers la gestion des produits.';

            $controller= 'produit';
            $view = 'msgFlash';
            $action= 'Produit';


        }


        break;

    case 'Mobiles':

        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Mobiles'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Mobiles';
        break;

    case 'ElectronicsAppliances':

        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Electonics & Applicances'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'ElectronicsAppliances';
        break;

    case 'Cars':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Cars'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Cars';
        break;

    case 'Bikes':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Bikes'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Bikes';
        break;

    case 'Furnitures':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Furnitures'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Furnitures';
        break;

    case 'Pets':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Pets'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Pets';
        break;


    case 'BooksSportsHobbies':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Books, Sports & Hobbies'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Books, Sports & Hobbies';
        break;


    case 'Fashion':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Fashion'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Fashion';
        break;


    case 'Kids':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Kids'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Kids';
        break;


    case 'Services':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Services'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Services';
        break;

    case 'Jobs':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'Jobs'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'Jobs';
        break;

    case 'RealEstate':
        $all_Art = ModelProduit::getAllProduit();

        $tab = null;
        $j = 0 ;
        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            $p = $all_Art[$i];

            if($p['idCategorie'] === 'RealEstate'){
                $tab[$j] = $p;
                $j++;
            }
        }

        $controller = 'category';
        $view = 'view';
        $action = 'RealEstate';
        break;


    case 'showProd':

        $id_prod = $_GET['id_prod'];
        echo $id_prod;
        $prods = ModelProduit::getAllProduit();

        $prod = null;

        for ($i = 0 ; $i < sizeof($prods) ; $i++){
            $p = $prods[$i];
            if($p['id'] == $id_prod){
                $prod = $p;
            }
        }

        if(is_null($prod)){
            $view="Error";
            $error ='Produit Inexistant';
        }else{
            $controller = 'produit';
            $action = 'prodDetails';
        }


        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");