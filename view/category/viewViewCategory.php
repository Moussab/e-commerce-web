

<?php

$allCatég = Model::getAll('categorie');

?>

<div class="row">
    <div class="col-sm-3" >
        <div class="sidebar-nav" >
            <div class="navbar navbar-default" role="navigation" style="background-color: white;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="visible-xs navbar-brand">Catégories :</span>
                </div>
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav"  >
                        <?php
                        for ($i = 0 ; $i < count($allCatég); $i++){
                            ?>
                            <li><a href="index.php?controller=produit&action=<?php echo $allCatég[$i]['link'];  ?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allCatég[$i]['categorie'];  ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>


    <div class="col-sm-9">
        <div class="row">
            <?php

            $max = sizeof($tab);
            $str = '';
            if ($max>0){
                for ($i = 0 ; $i < $max ; $i++){
                    $str .=  '<div class="col-lg-4 col-sm-6 text-center" id="listcat" style="text-align: center">';
                    $str .= '<img class="img-responsive" width="50%" height="50%" src="';
                    $str .= $tab[$i]['imgUrl'];
                    $str .= '" alt="">';
                    $str .= '<h3>';
                    $str .= '<span style="font-size: small; font-weight: bold;">';
                    $str .= $tab[$i]['nomProd'];
                    $str .= '</span>';
                    $str .= '<br><small style="color: white;">';
                    $str .= $tab[$i]['prix'];
                    $str .= ' € </small>
                    </h3>';
                    $str .= '<br><a id="showProd" href="index.php?controller=produit&action=showProd&id_prod=';
                    $str .= $tab[$i]['id'];
                    $str .= '">Détails</a>';
                    $str .= '<span>  </span>';
                    if(isset($_SESSION['user']) OR isset($_SESSION['userAdmin'])){
                        $str .= '<a id="showProd" href="index.php?controller=commande&action=done&pass=1&id_prod=';
                        $str .= $tab[$i]['id'];
                        $str .= '">Commander</a>';
                        $str .=  '</div>';
                    }else{
                        $str .= '<a data-toggle="modal" data-target="#myModal" id="showProd" href="#">Commander</a>';
                        $str .=  '</div>';
                    }

                }

                echo $str;
            }else{
                ?>

                <div class="main">
                    <div class="alert alert-info alert-pos">
                        <strong>Aucun produit dans cette catégorie pour l'instant.</strong>
                        <br>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>

</div>








<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>Pour commander il faut etre connecté.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>