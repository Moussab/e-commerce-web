<?php

require ("{$ROOT}{$DS}model{$DS}model.php");

    $allCatég = Model::getAll('categorie');

?>


<div class="categories">

    <?php
        for ($i = 0 ; $i < count($allCatég); $i++){
        ?>
            <div class="col-md-2 focus-grid">
                <a href="index.php?controller=produit&action=<?php echo $allCatég[$i]['link'];  ?>">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa <?php echo $allCatég[$i]['icon'];  ?>"></i></div>
                            <h4 class="clrchg"><?php echo $allCatég[$i]['categorie'];  ?></h4>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }

    ?>
</div>

