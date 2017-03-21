<a href="index.php?controller=produit&action=AddProduct" id="addProd">Ajouter un produit</a>
<br><br><br><br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>ID_produit</th>
                    <th>image produit</th>
                    <th>Nom Produit</th>
                    <th>Catégorie</th>
                    <th>Date d'Ajout</th>
                    <th>Nbr Exemplaire</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
        </div>
        <div class="panel-body">


                <tbody>
                <?php
                    $max = sizeof($all_Art);
                $str = '';
                    for ($i = 0 ; $i < $max; $i++){

                        $p = $all_Art[$i];

                        $str .= '<tr>
                                    <td>';
                        $str .= $p['id'];

                        $str .= '</td>
                                    <td>';
                        $img = $p['imgUrl'];
                        $str .= '<img style="width: 70px; height: 70px;" src="'.$img.'"  class="img-responsive" >';

                        $str .= '</td>
                                    <td>';
                        $str .= $p['nomProd'];

                        $str .= '</td>
                                    <td>';
                        $str .= $p['idCategorie'];

                        $str .= '</td>
                                    <td>';
                        $str .= $p['dateAjout'];

                        $str .= '</td>
                                    <td>';
                        $str .= $p['nbExemplaire'];

                        $str .= '</td>
                                    <td>';
                        $str .= '<a href="index.php?controller=produit&action=updateProduct&id_prod='.$p['id'].'" >Modifier</a>';

                        $str .= '</td>
                                    <td>';
                        $str .= '<a href="index.php?controller=produit&action=removeProduct&id_prod='.$p['id'].'" >Supprimer</a>';

                        $str .= '</td>
                                    </tr>';
                    }

                    echo $str;
                ?>
                </tbody>
            </table>

        </div>
    </div>

