<?php $title = "Error";?>

<?php ob_start(); ?>

<div>
    <p> Sorry bro, we fucked up</p>
    <p> please call our customer service with the code and the following error message.</p>
    <p> code:<?= $code;?>   </p>
    <p> line:<?= $line; ?>   </p>
    <p> file:<?= $file;?>   </p>
    
    <p> message: <?= $msg;?> </p>

</div>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>
