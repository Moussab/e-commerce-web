<div class="container">

    <div class="product-desc">
        <div class="col-md-7 product-view">
            <h2><?php echo $prod['nomProd']; ?></h2>
            <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Added at 06:55 pm, Ad ID: 987654321</p>
            <div class="flexslider">

                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides" style="width: 1000%;">
                        <li data-thumb="images/ss3.jpg" class="clone" aria-hidden="true" style="width: 625px; float: left; display: block;">
                            <img src="<?php echo $prod['imgUrl']; ?>" draggable="false">
                        </li>
                    </ul>
                </div>

                <ul class="flex-direction-nav">
                    <li class="flex-nav-prev">
                        <?php

                            if(isset($_SESSION['user']) OR isset($_SESSION['userAdmin']))
                            {
                                ?>
                                    <a class="flex-prev" id="showProd" href="index.php?controller=panier&action=addCart&id_prod=<?php echo $prod['id']; ?>">Ajouter au panier</a>
                                <?php
                            }
                        ?>
                    </li>
                </ul>
            </div>

            <!-- //FlexSlider -->
            <div class="product-details">
                <p><strong>Taille : <?php echo $prod['taille']; ?></strong></p>
                <p><strong>description : <?php echo $prod['description']; ?></strong> </p>

            </div>
        </div>
        <div class="col-md-5 product-details-grid">
            <div class="item-price">
                <div class="product-price">
                    <p class="p-price">Prix</p>
                    <h3 class="rate">€ <?php echo $prod['prix']; ?></h3>
                    <div class="clearfix"></div>
                </div>
                <div class="condition">
                    <p class="p-price">Condition</p>
                    <h4><?php echo $prod['etat']; ?></h4>
                    <div class="clearfix"></div>
                </div>
                <div class="itemtype">
                    <p class="p-price">Catégorie : </p>
                    <h4><?php echo $prod['idCategorie']; ?></h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="interested text-center">
                <h4> Contacter le vendeur!</h4>
                <p><i class="glyphicon glyphicon-earphone"></i><?php echo $prod['numTelVendeur']; ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <br><br>

    <div class="commentProd" style="width: 60%;">
        <?php
            if(isset($_SESSION['userAdmin']) || isset($_SESSION['user'])){
        ?>

        <div class="writeCmt" style="width: 100%; margin: 0%;">
            <form action="index.php?controller=commentaire&action=Save" method="post">
                <input type='hidden' value="<?php
                if (isset($_SESSION['user'])) {
                    echo $_SESSION['user']['id'];
                } else if (isset($_SESSION['userAdmin'])) {
                    echo $_SESSION['userAdmin']['id'];
                }
                ?>" name='iduser'>
                <input type='hidden' value='<?php echo $prod['id']; ?>' name='idprod'>
                <label style="margin-left: 20px; margin-bottom: 20px; color: white; font-size: large; font-weight: bold;">commentaire : </label>
                <textarea name="cmt"
                          style="width: 100%; height: 25%; background-color: white; color: #0b0b0b; border-radius: 30px;"></textarea>
                <button type="submit"
                        style="padding: 10px; border-radius: 20px; width: 20%; text-align: center; color: white; float: right;  margin-right: 20px; margin-top: 20px; font-size: large; background-color: #4cae4c;">
                    Ajouter
                </button>

            </form>
        </div>

        <?php
            }
        ?>
<br><br>
        <div class="showCmt" style="width: 100%; margin: 0%;">
            <?php

            $id_prod = $prod['id'];
            $SQL="SELECT * FROM commentaire";
            $SQL_="SELECT * FROM user";

            //echo $SQL ;
            try{
                $req_prep = Model::$pdo->query($SQL);
                $commentTAB = $req_prep->fetchAll();

                $req_prep = Model::$pdo->query($SQL_);
                $userTAB = $req_prep->fetchAll();
            } catch(PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href="www.google.com"> retour a la page d\'accueil </a>';
                }
                die();
            }

            $cmtTAB = null;
            $j = 0;
            for ($i = 0 ; $i < sizeof($commentTAB) ; $i++){
                if ($commentTAB[$i]['idProd'] === $id_prod){
                    $cmtTAB[$j] = $commentTAB[$i];
                    $j++;
                }
            }

            $usrTAB = null;
            $j = 0;
            for ($i = 0 ; $i < sizeof($cmtTAB) ; $i++){
                for ($k = 0 ; $k < sizeof($userTAB) ; $k++) {
                    if ($cmtTAB[$i]['idUser'] === $userTAB[$k]['id'] ){
                        $usrTAB[$j] = $userTAB[$k];
                    }
                }
            }

            $str = '<br><br><div class="cmt" style="color: black; background-color: white; border-radius: 20px; border: 1px black solid;">';
            for ($i = 0 ; $i < sizeof($cmtTAB) ; $i++){
                if($cmtTAB[$i]['valider'] == 1){
                    $str .= '<br><div  class="cmt" style="width:90%; margin-left:5%; margin-right: 5%; padding: 10px;  color: black; background-color: darkgrey; border: 1px black solid;">';
                    $u = null;
                    for ($j = 0 ; $j < sizeof($usrTAB) ; $j++){
                        if ($usrTAB[$j]['id'] == $cmtTAB[$i]['idUser']){
                            $u = $usrTAB[$j];
                        }
                    }
                    if (!is_null($u)) {
                        $str .= $u['nom'];
                        $str .= ' : ';
                        $str .= $cmtTAB[$i]['commentaire'];
                    }
                    $str .= '<br></div><br>';
                }
            }

            echo $str.'</div>';
            ?>




        </div>

    </div>
</div>