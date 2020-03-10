<?php $title = 'Mon blog';?>

<?php ob_start();?>
<h1>My super blog !</h1>
<p><a href="index.php">Back to the ticket list</a></p>

<div class="news">
    <h3>
        <?=htmlspecialchars($post['title']); ?>
        <em>le <?=$post['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?=nl2br(htmlspecialchars($post['content']));?>
    </p>
</div>

<h2>Comments</h2>

<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?=htmlspecialchars($comment['autor']); ?></strong> le <?=$comment['date_comment_fr']; ?></p>
<p><?=nl2br(htmlspecialchars($comment['comment'])); ?></p>
<?php
}
?>
<form method="POST" action="index.php">
    <p>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value=<?=$_COOKIE['login'];?> />
    </p>
    <p>
        <label for="comm">Comment:</label>
        <textarea name="comm" id="comm" cols=27 rows=6>Maximum 255 characters</textarea>
    </p>
    <p>
        <input type="hidden" name="action" value="postComment"/>
        <input type="hidden" name="article" value=<?= htmlspecialchars($post['id']);?> />
    </p>
    <p>
        <input type="submit" value="Send"/>
    </p>
    <?php if (isset($_GET['status'])) {
        $status = htmlspecialchars($_GET['status']);
        echo $status;
    }
    ?>
</form>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
