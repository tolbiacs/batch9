<?php $title="My blog - Error" ?>
<?php ob_start() ?>
<div>
    <p>We are sorry, we have an internal problem.</p>
    <p>Please call our customer service with the code and the message of the following error.</p>
    <p>Code: <?=$code?></p>
    <p>Line: <?=$line?></p>
    <p>File: <?=$file?></p>
    <p>Message: <?=$msg?></p>
</div>
<?php $content=ob_get_clean() ?>
<?php require('./view/template.php');