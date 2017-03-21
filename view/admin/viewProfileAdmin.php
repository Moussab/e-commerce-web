<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 toppad" >

            <div class="panel panel-info">
                <div class="panel-heading">

                    <div class="row">

                        <div class="col-md-8">
                            <h3 class="panel-title">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    $usr = $_SESSION['user'];
                                    echo $usr['nom']." ".$usr['prenom'];
                                }else {
                                    $usr = $_SESSION['userAdmin'];
                                    echo $usr['nom']." ".$usr['prenom'];
                                }
                                ?>
                            </h3>
                        </div>

                        <div class="col-md-4">
                            <div style="float: right;">
                            </div>
                            <a href="index.php?controller=user&action=updateProfile&id=<?php echo (isset($_SESSION['user']))?$_SESSION['user']['id']:((isset($_SESSION['userAdmin']))?$_SESSION['userAdmin']['id']:''); ?>" style="text-decoration: none; color: white; font-size: larger; padding-left: 20px; padding-right: 20px; border-radius: 15px; padding-bottom: 9px; padding-top: 9px; background-color: #00cc00; width: 50px;" >Modifier</a>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="<?php
                                                        if (isset($_SESSION['user'])) {
                                                            $usr = $_SESSION['user'];
                                                            echo $usr['imgUrl'];
                                                        }else {
                                                            $usr = $_SESSION['userAdmin'];
                                                            echo $usr['imgUrl'];
                                                        }
                                                    ?>" class="img-circle picUser img-responsive">
                        </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nom : </td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $usr = $_SESSION['user'];
                                            echo $usr['nom'];
                                        }else {
                                            $usr = $_SESSION['userAdmin'];
                                            echo $usr['nom'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Prénom : </td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $usr = $_SESSION['user'];
                                            echo $usr['prenom'];
                                        }else {
                                            $usr = $_SESSION['userAdmin'];
                                            echo $usr['prenom'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date de naissance : </td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $usr = $_SESSION['user'];
                                            echo $usr['bday'];
                                        }else {
                                            $usr = $_SESSION['userAdmin'];
                                            echo $usr['bday'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sexe : </td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $usr = $_SESSION['user'];
                                            echo $usr['sexe'];
                                        }else {
                                            $usr = $_SESSION['userAdmin'];
                                            echo $usr['sexe'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Adresse : </td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $usr = $_SESSION['user'];
                                            echo $usr['adr'];
                                        }else {
                                            $usr = $_SESSION['userAdmin'];
                                            echo $usr['adr'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email : </td>
                                    <td>
                                        <?php
                                            if (isset($_SESSION['user'])) {
                                                $usr = $_SESSION['user'];
                                                echo $usr['mail'];
                                            }else {
                                                $usr = $_SESSION['userAdmin'];
                                                echo $usr['mail'];
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Numéro de téléphone : </td>
                                    <td>
                                        <?php
                                            if (isset($_SESSION['user'])) {
                                                $usr = $_SESSION['user'];
                                                echo $usr['numTel'];
                                            }else {
                                                $usr = $_SESSION['userAdmin'];
                                                echo $usr['numTel'];
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code Postale : </td>
                                    <td>
                                        <?php
                                            if (isset($_SESSION['user'])) {
                                                $usr = $_SESSION['user'];
                                                echo $usr['codePostal'];
                                            }else {
                                                $usr = $_SESSION['userAdmin'];
                                                echo $usr['codePostal'];
                                            }
                                        ?>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">

                </div>

            </div>
        </div>
    </div>
</div>