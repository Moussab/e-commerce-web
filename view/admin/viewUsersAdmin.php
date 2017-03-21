<br><br><br><br>

<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ID_User</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>image Url</th>
                <th>Activation</th>
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
            $str .= $p['nom'];

            $str .= '</td>
                                    <td>';
            $str .= $p['mail'];

            $str .= '</td>
                                    <td>';
            $str .= $p['imgUrl'];

            $str .= '</td>
                                    <td>';
            $str .= ($p['activated'] == 1)?'<a href="index.php?controller=user&action=desactivat&id_user='.$p['id'].'" >Desactiver</a>':'<a href="index.php?controller=user&action=activat&id_user='.$p['id'].'" >Activer</a>';

            $str .= '</td>
                                    <td>';
            $str .= ($p['type_user'] == 1)?'<a href="index.php?controller=user&action=simpleUser&id_user='.$p['id'].'" >Admin</a>':'<a href="index.php?controller=user&action=superUser&id_user='.$p['id'].'" >User</a>';

            $str .= '</td>
                                    <td>';
            $str .= '<a href="index.php?controller=user&action=removeUser&id_user='.$p['id'].'" >Supprimer</a>';

            $str .= '</td>
                                    </tr>';
        }
echo $str;
        ?>
        </tbody>
        </table>

    </div>
</div>
