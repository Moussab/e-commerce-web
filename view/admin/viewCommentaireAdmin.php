<br><br><br><br>

<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ID_Cemmentaire</th>
                <th>ID_User</th>
                <th>ID_Produit</th>
                <th>Valider</th>
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
            $str .= $p['idUser'];

            $str .= '</td>
                                    <td>';
            $str .= $p['idProd'];


            $str .= '</td>
                                    <td>';
            $str .= ($p['valider'] == 1)?'<a href="index.php?controller=commentaire&action=desactivat&id_cmt='.$p['id'].'" >Desactiver</a>':'<a href="index.php?controller=commentaire&action=activat&id_cmt='.$p['id'].'" >Activer</a>';

            $str .= '</td>
                                    <td>';
            $str .= '<a href="index.php?controller=commentaire&action=removeCmt&id_cmt='.$p['id'].'" >Supprimer</a>';

            $str .= '</td>
                                    </tr>';
        }

        echo $str;
        ?>
        </tbody>
        </table>

    </div>
</div>

