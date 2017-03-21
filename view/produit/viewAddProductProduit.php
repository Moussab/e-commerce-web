
    <div class="center-container">
        <div class="header-main">
            <div class="header-bottom">
                <div class="header-center w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form action="index.php?controller=produit&action=storeProduct" method="post" enctype="multipart/form-data">
                            <label style="color: white;">Nom produit :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="text" placeholder="Nom produit" id="nom" name="nom" required="">
                            </div>
                            <label style="color: white;">Marque :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer la marque du produit" id="marque" name="marque" required="">
                            </div>
                            <label style="color: white;">Catégorie :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <select id="categorie" name="categorie" style="height: 50px;">
                                    <option value="Catégorie">--Catégorie--</option>
                                    <option value="Mobiles">Mobiles</option>
                                    <option value="Electonics & Applicances">Electonics & Applicances</option>
                                    <option value="Cars">Cars</option>
                                    <option value="Bikes">Bikes</option>
                                    <option value="Furnitures">Furnitures</option>
                                    <option value="Pets">Pets</option>
                                    <option value="Books, Sports & Hobbies">Books, Sports & Hobbies</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Cars">Kids</option>
                                    <option value="Services">Services</option>
                                    <option value="Jobs">Jobs</option>
                                    <option value="Immobilier">Immobilier</option>
                                </select>
                            </div>
                            <label style="color: white;">Prix :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer le prix du produit" id="prix" name="prix" required="">
                            </div>
                            <label style="color: white;">Date :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="date" placeholder="   Date d'ajout" id="date" name="date" required="" style="border: 1px rgba(255, 255, 255, 0.31) solid ">
                            </div>
                            <label style="color: white;">Condition :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <select id="condition" name="condition">
                                    <option value="conditi">--Condition--</option>
                                    <option value="Bon Etat">Bon état</option>
                                    <option value="moyen">moyen</option>
                                    <option value="mauvaise">mauvaise</option>
                                </select>
                            </div>
                            <label style="color: white;">Numero de téléphone du vendeur :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="tel" placeholder="Numero de téléphone du vendeur" id="numTel" name="numTel" >
                            </div>
                            <label style="color: white;">Nombre d'exemplaire :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="number" placeholder="Entrer le nombre d'exemplaire" id="nbExemplaire" name="nbExemplaire" >
                            </div>
                            <label style="color: white;">Taille du produit :</label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="text" placeholder="Entrer la taille du produit" id="taille" name="taille" >
                            </div>
                            <label style="color: white;">Couleur : </label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <input type="color" placeholder="Choisir la couleur" id="color" name="color" required="">
                            </div>
                            <label style="color: white;">Photo produit : </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="icon1">
                                        <i class="fa" aria-hidden="true"></i>
                                        <input type="file" id="picProf" name="picProf">
                                        <br><br><br><br><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="uploads/profilePicture.png" class="img-responsive" style="float: left; margin-left: 35%; width: 30%; height: 10%;">
                                </div>
                            </div>
                            <br>
                            <label style="color: white;">Description : </label>
                            <div class="icon1">
                                <i class="fa" aria-hidden="true"></i>
                                <textarea type="text" id="desc" name="desc"></textarea>
                            </div>
                            <div class="bottom">
                                <input type="submit" value="Ajouter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
