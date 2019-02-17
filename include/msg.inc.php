 <?php
if (isset($_SESSION["notifications"])) { ?>
        <div class="alert alert-<?= $color_notification ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
         <?= $_SESSION ["notifications"]["message"]?>
        <?php unset($_SESSION["notifications"]) ?>
        </div>
<?php } ?> 
