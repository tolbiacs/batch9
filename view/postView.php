<?php $title = "My blog Comments";?>
<?php ob_start();?>

        <h1>My super blog !</h1>
        <p><a href="index.php">Back to the ticket list</a></p>
 
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?= nl2br(htmlspecialchars($post['content']));
    ?>
    </p>
</div>

<h2>Comments</h2>
<form id="comment_form" method="POST" action="index.php">
    <input type="hidden" name="action" value="postComment">
    <input type="hidden" name="article" value="<?= $post['id'];?>"/>
    <input name="autor" type="text" placeholder="name please" />
    <input id="comment" name="comment" type="text" placeholder="comment please">
    <input type="submit" id="comment_enter" value="post">
    <br><br>===========<br>
</form>

<?php 
// if(isset)
//Status
?>

<?php
// Retrieving comments
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['autor']); ?></strong> le <?= $comment['date_comment_fr']; ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
<?php
}
?>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
