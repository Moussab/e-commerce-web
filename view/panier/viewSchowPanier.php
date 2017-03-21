
<br><br>

<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Nom Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Supprimer</th>
            </tr>
            </thead>
    </div>




    <div class="panel-body">

        <tbody>
        <?php


        $max = sizeof($_SESSION['panier']['idProd']);
        $idProds = $_SESSION['panier']['idProd'];
        $nomProd = $_SESSION['panier']['nomProd'];
        $prodPrice = $_SESSION['panier']['prodPrice'];
        $nbProd = $_SESSION['panier']['nbProd'];
        $str = '';
        for ($i = 0 ; $i < $max; $i++){


            $str .= '<tr>
                                    <td>';
            $str .= $nomProd[$i];

            $str .= '</td>
                                    <td>';
            $str .= '<a style="text-decoration:none;" href="index.php?controller=panier&action=removeProduct&id_prod='.$idProds[$i].'" > <span style="font-size:20px; font-weight:200;" > - </span> </a>'.$nbProd[$i].'<a style="text-decoration:none;" href="index.php?controller=panier&action=addCart&pass=1&id_prod='.$idProds[$i].'" > <span style="font-size:15px; font-weight:300;" > + </span>  </a>';

            $str .= '</td>
                                    <td>';
            $str .= $prodPrice[$i];

            $str .= '</td>
                                    <td>';
            $str .= '<a href="index.php?controller=panier&action=removeAllProduct&id_prod='.$idProds[$i].'" >Supprimer</a>';

            $str .= '</td>
                                    </tr>';
        }

        echo $str;
        ?>
        </tbody>
        </table>

    </div>
</div>
<br>
<?php
    if (ModelPanier::getTotalProd() != 0){
        ?>
        <a href="index.php?controller=commande&action=done" id="addProd">Commander</a>
        <?php
    }
?>
<br>