<?php $title ="My blog - comments" ?>

<?php ob_start();?> 
<h1>My super blog !</h1>
<p><a href="index.php">Back to the ticket list</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>The <?= $post['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?= nl2br(htmlspecialchars($post['content']));?>
    </p>
</div>
<div id="formAddComment">
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="postComment"/>
        <input type="hidden" name="article" value="<?= htmlspecialchars($post['id']); ?>"/>
        <label for="login"> Login : <input type="text" name="login"/></label> </br>
        <label for="message"> Message : <input type="text" name="message"/></label>
        <input type="submit" value="Post"/>
    </form>
    <?php 
    if(isset($_REQUEST['status'])) {
        $status = $_REQUEST['status'];
        echo "<div class='error'>$status </div>";
    }
    ?>
</div>
<h2>Comments</h2>

<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['autor']); ?></strong> le <?= $comment['date_comment_fr']; ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>