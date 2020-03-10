<?php $title = 'Mon blog - Error';?>

<?php ob_start();?>
<div>
    <p>We are sorry we had an internal problem</p>
    <p>Please call our customer service with the code and the message of the following error</p>
    <p>Code: <?=$code?></p>
    <p>Line: <?=$line?></p>
    <p>File: <?=$file?></p>
    <p>Message: <?=$msg?></p>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?> 
