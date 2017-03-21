<?php
    if (isset($_GET['error']) AND $_GET['error'] == 1){
    ?>

        <div class="main">
            <div class="alert alert-danger alert-pos">
                <strong>Mot de pass erroné</strong>
                <br>
            </div>
        </div>

    <?php
    }
?>



    <div class="layoutsMain">
        <h2>Connectez-vous maintenant</h2>
        <form action="index.php?controller=user&action=logged" method="post">
            <input value="E-MAIL" name="Email" type="email" required="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}"/>
            <input value="PASSWORD" name="Password" type="password" required="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
            <span><input type="checkbox" /> Souvenez-vous de moi</span>
            <div class="clear"></div>
            <input type="submit" value="login" name="login">
        </form>
        <p>Vous n'avez pas de compte ?<a href="index.php?controller=user&action=signUp"> Inscriver maintenant</a></p>
    </div>
