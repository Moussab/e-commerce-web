
<div class="center-container">
    <div class="header-main">
        <div class="header-bottom">
            <div class="header-center w3agile">
                <div class="header-left-bottom agileinfo">
                    <form action="index.php?controller=produit&action=upProduct" method="post" enctype="multipart/form-data">
                        <input  hidden value="<?php  echo $prod['id']; ?>" id="id" name="id" >
                        <label style="color: white;">Nom produit :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="text" placeholder="Nom produit" value="<?php  echo $prod['nomProd']; ?>" id="nom" name="nom" required="">
                        </div>
                        <label style="color: white;">Marque :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="text" placeholder="Entrer la marque du produit"  value="<?php  echo $prod['marque']; ?>" id="marque" name="marque" required="">
                        </div>
                        <label style="color: white;">Catégorie :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <select id="categorie" name="categorie" >
                                <option value="<?php  echo $prod['idCategorie']; ?>"><?php  echo $prod['idCategorie']; ?></option>
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
                            <input type="text" placeholder="Entrer le prix du produit" value="<?php  echo $prod['prix']; ?>" id="prix" name="prix" required="">
                        </div>
                        <label style="color: white;">Date :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="date" placeholder="   Date d'ajout" value="<?php  echo $prod['dateAjout']; ?>" id="date" name="date" required="" style="border: 1px rgba(255, 255, 255, 0.31) solid ">
                        </div>
                        <label style="color: white;">Condition :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <select id="condition" name="condition">
                                <option value="<?php  echo $prod['etat']; ?>"><?php  echo $prod['etat']; ?></option>
                                <option value="Bon Etat">Bon état</option>
                                <option value="moyen">moyen</option>
                                <option value="mauvaise">mauvaise</option>
                            </select>
                        </div>
                        <label style="color: white;">Numero de téléphone du vendeur :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="tel" placeholder="Numero de téléphone du vendeur" value="<?php  echo $prod['numTelVendeur']; ?>" id="numTel" name="numTel" >
                        </div>
                        <label style="color: white;">Nombre d'exemplaire :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="number" placeholder="Entrer le nombre d'exemplaire" value="<?php  echo $prod['nbExemplaire']; ?>" id="nbExemplaire" name="nbExemplaire" >
                        </div>
                        <label style="color: white;">Taille du produit :</label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="text" placeholder="Entrer la taille du produit" value="<?php  echo $prod['taille']; ?>" id="taille" name="taille" >
                        </div>
                        <label style="color: white;">Couleur : </label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <input type="color" placeholder="Choisir la couleur"  name="color" required="">
                        </div>
                        <label style="color: white;">Photo produit : </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon1">
                                    <i class="fa" aria-hidden="true"></i>
                                    <input type="file" id="picProf" required name="picProf">
                                    <br><br><br><br><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php  echo $prod['imgUrl']; ?>" class="img-responsive" style="float: left; margin-left: 35%; width: 30%; height: 10%;">
                            </div>
                        </div>
                        <br>
                        <label style="color: white;">Description : </label>
                        <div class="icon1">
                            <i class="fa" aria-hidden="true"></i>
                            <textarea type="text" id="desc" name="desc"><?php  echo $prod['description']; ?></textarea>
                        </div>
                        <div class="bottom">
                            <input type="submit" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
