
<div class="main">
    <div class="alert alert-<?php echo ($stop == 0)?'success':'danger'; ?> alert-pos">
        <strong><?php echo $error; ?></strong>
        <br>
        <?php
                header('Refresh: 5; url=./index.php');

        ?>
    </div>
</div>