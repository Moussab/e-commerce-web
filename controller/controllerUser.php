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
require ("{$ROOT}{$DS}model{$DS}modelUser.php");


switch ($action){

    case 'signUp':
        $pagetitle = 'Sign In';
        $view = 'SignIn';
        break;

    case 'signed':
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['bday']) && isset($_POST['sexe'])
            && isset($_POST['email']) && isset($_POST['numTel']) && isset($_POST['pwd']) && isset($_POST['pwdConf'])
            && isset($_POST['adr']) && isset($_POST['codePostal'])){

            $name = $_POST['nom'];
            $fname = $_POST['prenom'];
            $bday = $_POST['bday'];
            $sexe = $_POST['sexe'];
            $mail = $_POST['email'];
            $numTel = $_POST['numTel'];
            $pwd = $_POST['pwd'];
            $pwd2 = $_POST['pwdConf'];
            $adress = $_POST['adr'];
            $codePostal = $_POST['codePostal'];
            $destinationPicProf = 'uploads/profilePicture.png';
            if($pwd != $pwd2){
                $view="Error";
                $error ='password different';
            }else{
                if(!ModelUser::existUser('mail',$mail)){
                    $pwd = sha1($pwd);
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

                    $champs = array('nom', 'prenom', 'bday', 'sexe', 'mail', 'numTel', 'adr', 'password', 'imgUrl' ,'codePostal');
                    $values = array($name,$fname,$bday,$sexe,$mail,$numTel,$adress,$pwd,($destinationPicProf == null)?'': $destinationPicProf,$codePostal);
                    ModelUser::insertUser($champs,$values);

                    $user = ModelUser::selectUser('mail',$mail);

                    $_SESSION['user'] = $user;
                    $layout ='viewConnected';
                    $view = 'EnAttente';
                    $error = 'En Attente';
                    $pagetitle = ucfirst($user['nom'])." ".ucfirst($user['prenom']);

                }else{
                    $view="Error";
                    $error ='Compte Existant';
                }

            }
        }else{
            $view="NotFound";
        }

        break;

    case 'logIn':
        $pagetitle='Login';
        $view ='Login';
        break;

    case 'logged':
        $pagetitle ='Login';
        if(!isset($_POST['Email'])|!isset($_POST['Password'])){ // s'il n'est pas encore connecté
            $view = 'Login';
            $layout = 'viewVisitor';
        }else{
            $Email =$_POST['Email'];
            $pwd = $_POST['Password'];
            $usr = ModelUser::selectUser('mail',$Email);
            if ($usr != null){
                if ($usr['password'] == sha1($pwd)){
                    if($usr['type_user'] == 0){
                        $_SESSION['user'] = $usr;
                        $layout ='viewConnected';
                        $view = 'Profile';
                        if($usr['activated'] == 0){
                            $view = 'EnAttente';
                            $error = 'En Attente';
                        }
                        $pagetitle = "bonjour ".ucfirst($usr['nom']);
                    }else{
                        $_SESSION['userAdmin'] = $usr;
                        $layout ='viewAdmin';
                        $view = 'Profile';
                        $pagetitle = "bonjour ".ucfirst($usr['nom']);
                    }
                }else{
                    header('Location:  index.php?controller=user&action=logIn&error=1');

                }
            }else{
                    $view="Error";
                    $error ='Compte inexistant';
            }
        }
    break;

    case 'Profile':
        $usr = $_SESSION['user'];
        $pagetitle = ucfirst($usr['nom'])." ".ucfirst($usr['prenom']);
        $view ='Profile';
        break;


    case 'updateProfile':
        $id = $_GET['id'];
        $user = null;
        $all_Art = ModelUser::getAllUsers();


        for ($i = 0 ; $i < sizeof($all_Art) ; $i++){
            if($id == $all_Art[$i]['id']){
                $user = $all_Art[$i];
            }
        }

        $view ='updateProfile';


        break;

    case 'confirmUpdateProfile':

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['bday']) && isset($_POST['sexe'])
            && isset($_POST['email']) && isset($_POST['numTel']) && isset($_POST['adr']) && isset($_POST['codePostal'])){

            if(isset($_SESSION['user']))
                $id = $_SESSION['user']['id'];
            else
                $id = $_SESSION['userAdmin']['id'];

            $name = $_POST['nom'];
            $fname = $_POST['prenom'];
            $bday = $_POST['bday'];
            $sexe = $_POST['sexe'];
            $mail = $_POST['email'];
            $numTel = $_POST['numTel'];
            $adress = $_POST['adr'];
            $codePostal = $_POST['codePostal'];
            $destinationPicProf = 'uploads/profilePicture.png';

            if(ModelUser::existUser('mail',$mail)){

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

                $champs = array('id','nom', 'prenom', 'bday', 'sexe', 'mail', 'numTel', 'adr', 'imgUrl' ,'codePostal');
                $values = array($id,$name,$fname,$bday,$sexe,$mail,$numTel,$adress,($destinationPicProf == null)?'': $destinationPicProf,$codePostal);
                ModelUser::updateUser($champs,$values);

                $user = ModelUser::selectUser('mail',$mail);

                if ($user['type_user'] == 1) {
                    $_SESSION['userAdmin'] = $user;
                    $layout ='viewAdmin';
                }else {
                    $_SESSION['user'] = $user;
                    $layout ='viewConnected';
                }

                $view ='Profile';

            }else{
                $view="Error";
                $error ='Compte Inexistant';
            }
        }else{
            $view="Error";
            $error ='Compte Existant';
        }

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

    case 'getUsers':
        $all_Art = ModelUser::getAllUsers();
        $controller= 'admin';
        $view = 'Users';
        $action= 'users';
        break;

    case 'desactivat':

        $id = $_GET['id_user'];
        $champs = array('id','activated');
        $values = array($id,0);

        ModelUser::updateUser($champs,$values);

        $all_Art = ModelUser::getAllUsers();
        $controller = 'admin';
        $view = 'Users';
        $action = 'produit';

        break;

    case 'simpleUser':

        $id = $_GET['id_user'];
        $champs = array('id','type_user');
        $values = array($id,0);

        ModelUser::updateUser($champs,$values);

        $all_Art = ModelUser::getAllUsers();
        $controller = 'admin';
        $view = 'Users';
        $action = 'produit';
        break;

    case 'superUser':

        $id = $_GET['id_user'];
        $champs = array('id','type_user');
        $values = array($id,1);

        ModelUser::updateUser($champs,$values);

        $all_Art = ModelUser::getAllUsers();
        $controller = 'admin';
        $view = 'Users';
        $action = 'produit';

        break;

    case 'activat':


        $id = $_GET['id_user'];
        $champs = array('id','activated');
        $values = array($id,1);

        ModelUser::updateUser($champs,$values);

        $all_Art = ModelUser::getAllUsers();
        $controller = 'admin';
        $view = 'Users';
        $action = 'produit';


        break;

    case 'removeUser':

        $id= $_GET['id_user'];

        ModelUser::deleteUser('id',$id);

        $all_Art = ModelUser::getAllUsers();
        $controller = 'admin';
        $view = 'Users';
        $action = 'produit';

        break;
}

require ("{$ROOT}{$DS}view{$DS}{$layout}.php");