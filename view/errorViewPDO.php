<?php $title ="My blog - Error" ?>

<?php ob_start();?> 
<div>
    <p> we are sorry we had a internal database problem</p>
    <p> Please wait for our technical services to resolve the problem -  Sorry for the inconvenience ... :( ) </p>
    <p> Code : <?= $code; ?></p>
    <p> Message : <?= $msg; ?></p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>
