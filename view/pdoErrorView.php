<?php $title = "Error";?>

<?php ob_start(); ?>

<div>
    <p> hahahahahahahahah</p>
    <p> please call our customer service with the code and the following error message.</p>
    <p> code:<?= $code;?>   </p>

    
    <p> message: <?= $msg;?> </p>

</div>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>