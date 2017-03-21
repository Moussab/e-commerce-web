<div class="center-container">
        <div class="header-main">
            <div class="header-bottom">
                <div class="header-center w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form action="index.php?controller=user&action=signed" method="post" enctype="multipart/form-data">
                            <div class="icon1">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer votre Nom" id="nom" name="nom" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer votre Prenom" id="prenom" name="prenom" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                <input type="date" placeholder="Entrer votre date de naissance" id="bday" name="bday" required="">
                            </div>
                            <div class="icon1">
                                <br>
                                <input type="radio" name="sexe" value="Homme" id="Homme" /><label for="Homme"><i class="fa fa-male" aria-hidden="true">&nbsp;&nbsp;Homme</i></label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="sexe" value="Femme" id="Femme" /><label for="Femme"><i class="fa fa-female" aria-hidden="true">&nbsp;&nbsp;Femme</i></label>
                                <br><br>
                            </div>
                            <div class="icon1">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input type="email" placeholder="Entrer votre e-mail" id="email" name="email"  required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input type="tel" placeholder="Numero de téléphone" id="numTel" name="numTel" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-street-view" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer votre adresse" id="adr" name="adr" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-code" aria-hidden="true"></i>
                                <input type="number" placeholder="Entrer votre code postal" id="codePostal" name="codePostal" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" placeholder="Créer un mot de passe" id="pwd" name="pwd" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" placeholder="Confirmer votre mot de passe" id="pwdConf" name="pwdConf" required="">
                            </div>
                            <div class="icon1">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <input type="file" id="picProf" name="picProf">
                            </div>
                            <div class="bottom">
                                <input type="submit" value="Enregistrer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
