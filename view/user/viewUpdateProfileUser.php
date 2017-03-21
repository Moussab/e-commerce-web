
<?php
    if (isset($_SESSION['user']))
        $user = $_SESSION['user'];
    elseif (isset($_SESSION['userAdmin']))
        $user = $_SESSION['userAdmin'];
?>


<div class="center-container">
    <div class="header-main">
        <div class="header-bottom">
            <div class="header-center w3agile">
                <div class="header-left-bottom agileinfo">
                    <form action="index.php?controller=user&action=confirmUpdateProfile" method="post" enctype="multipart/form-data">
                        <div class="icon1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" value="<?php echo $user['nom']; ?>" placeholder="Entrer votre Nom" id="nom" name="nom" required="">
                        </div>
                        <div class="icon1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" value="<?php echo $user['prenom']; ?>" placeholder="Entrer votre Prenom" id="prenom" name="prenom" required="">
                        </div>
                        <div class="icon1">
                            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                            <input type="date" value="<?php echo $user['bday']; ?>" placeholder="Entrer votre date de naissance" id="bday" name="bday" required="">
                        </div>
                        <div class="icon1">
                            <br>
                            <?php ($user['sexe']=='Homme')?$arg = 1: $arg = 0; ?>
                            <input type="radio" name="sexe" value="Homme" id="Homme" <?php if ($arg == 1){ ?> checked <?php } ?>/><label for="Homme"><i class="fa fa-male" aria-hidden="true">&nbsp;&nbsp;Homme</i></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="sexe" value="Femme" id="Femme" <?php if ($arg == 0){ ?> checked <?php } ?> /><label for="Femme"><i class="fa fa-female" aria-hidden="true">&nbsp;&nbsp;Femme</i></label>
                            <br><br>
                        </div>
                        <div class="icon1">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="email" value="<?php echo $user['mail']; ?>" placeholder="Entrer votre e-mail" id="email" name="email"  required="">
                        </div>
                        <div class="icon1">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <input type="tel" value="<?php echo $user['numTel']; ?>" placeholder="Numero de téléphone" id="numTel" name="numTel" required="">
                        </div>
                        <div class="icon1">
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <input type="text" value="<?php echo $user['adr']; ?>" placeholder="Entrer votre adresse" id="adr" name="adr" required="">
                        </div>
                        <div class="icon1">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            <input type="number" value="<?php echo $user['codePostal']; ?>" placeholder="Entrer votre code postal" id="codePostal" name="codePostal" required="">
                        </div>
                        <div class="icon1 row">
                            <div class="col-md-6">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <input type="file" required id="picProf" name="picProf">
                            </div>
                            <div class="col-md-6">
                                <img class="img-responsive" src="<?php echo $user['imgUrl']; ?>" style="width: 30%; height: 30%;">
                                <br>
                            </div>
                            
                        </div>
                        <div class="bottom">
                            <input type="submit" value="Enregistrer les modifications">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
