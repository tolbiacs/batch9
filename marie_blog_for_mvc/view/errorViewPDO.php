<?php $title="My blog - Error" ?>
<?php ob_start() ?>
<div>
    <p>We are sorry, we have a technical problem with the database.</p>
    <p>Please call our customer service with the code and the message of the following error. Sorry for the inconvenience...</p>
    <p>Code: <?=$code?></p>
    <p>Message: <?=$msg?></p>
</div>
<?php $content=ob_get_clean() ?>
<?php require('./view/template.php');