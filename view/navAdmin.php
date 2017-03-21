<div class="header" >
    <div class="header-top">
        <a href="index.php?controller=admin&action=Profile" style="float: right; color: #0b0b0b; text-decoration: none; "><?php echo $_SESSION['userAdmin']['nom']; ?></a>

        <div class="col-sm-1 world">

        </div>
        <div class="col-sm-4 logo text-left">
            <a href="index.php">AliSells</a>
        </div>

        <div class="col-sm-7">
            <p class="log">


                <?php
                if (isset($_SESSION['userAdmin'])){
                    $usr = $_SESSION['userAdmin'];

                    ?>

                    <a href="index.php">Acceuil</a><span> </span><a  href="index.php?controller=admin&action=Profile">Profil</a><span> </span><a  href="index.php?controller=admin&action=Settings">Paramètre</a><span> </span><a  href="index.php?controller=admin&action=Logout">Déconnecter</a>

                    <?php
                }

                ?>


            </p>
        </div>
        <div class="cart box_1">
            <a href="index.php?controller=panier&action=schow">
                <h3><?php echo (isset($_SESSION['panier']))? ModelPanier::getTotalProd().' produit(s)':'0 produit';  ?> <img src="assets/images/cart.png" alt=""></h3>
            </a>

        </div>
        <div class="clearfix"> </div>

    </div>

    <div class="head-top">
        <div class="col-sm-3 number">
            <span>Service client : 00 33 6 98 63 54 23</span>
        </div>
        <div class="col-sm-7 search">
            <form method="post" action="index.php?controller=search">
                <div class="col-sm-11">
                    <input name="search" type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                </div>
                <div class="col-sm-1">
                    <input type="submit" value=" ">
                </div>
            </form>
        </div>
        <div class="col-sm-3">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>