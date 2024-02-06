<?php

if ($session->check("success")):?>

    <div class="alert alert-success"><?php echo $session->get("success"); ?></div>

<?php
endif;

$session->remove("success");
?>
