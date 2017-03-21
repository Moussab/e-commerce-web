
<div class="main">
    <div class="alert alert-success alert-pos">
        <strong><?php echo $error; ?></strong>
        <br>
        <?php
        header('Refresh: 2; url=./index.php?controller=produit&action=getProduct');

        ?>
    </div>
</div>
