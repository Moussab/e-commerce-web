<br><br><br><br>

<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ID_COMMANDE</th>
                <th>Nom Utilisateur</th>
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
        $iduser = '';
        for ($i = 0 ; $i < $max; $i++){

            $p = $all_Art[$i];

            if ($iduser != $p['idUser']){
                $sql = "SELECT * FROM user WHERE id = '".$p['idUser']."'";

                try{
                    $results = Model::$pdo->query($sql);
                    $results->setFetchMode(PDO::FETCH_ASSOC);

                    $result = $results->fetch();

                } catch(PDOException $e) {
                    die();
                }
            }

            $str .= '<tr>
                                    <td>';
            $str .= ($iduser === $p['idUser'])? '':$p['id'];

            $str .= '</td>
                                    <td>';
            $str .= ($iduser === $p['idUser'])? '':$result['nom'];

            $str .= '</td>
                                    <td>';
            $str .= $p['idProd'];


            $str .= '</td>
                                    <td>';
            $str .= ($p['valider'] == 1)?'<a href="index.php?controller=commande&action=desactivat&id_cmt='.$p['id'].'" >Desactiver</a>':'<a href="index.php?controller=commande&action=activat&id_cmt='.$p['id'].'" >Activer</a>';

            $str .= '</td>
                                    <td>';
            $str .= '<a href="index.php?controller=commande&action=removeCmt&id_cmt='.$p['id'].'" >Supprimer</a>';

            $str .= '</td>
                                    </tr>';

            $iduser = $p['idUser'];
        }

        echo $str;
        ?>
        </tbody>
        </table>

    </div>
</div>