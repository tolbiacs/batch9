<?php $title = "My blog - comments";?>

<?php ob_start(); ?>
<h1>My super blog !</h1>
<p><a href="index.php">Back to the ticket list</a></p>
 

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
<<<<<<< HEAD
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?= nl2br(htmlspecialchars($post['content']));
    ?>
    </p>
</div>
<?php 
$text_value = isset($_COOKIE['author'])?$_COOKIE['author']:'';
?>
<form method="post" action="index.php">
                
    <div class="contactInput">
        <div class="contentDiv">
            <label for="author">author : 
                <input type="text" name="author" id="author" size="50" maxlength="50"></label>
                <label for="comment">comment : 
                <textarea name="comment" id="comment"  rows="10" cols="50" required></textarea></label>
                <input type="hidden" name="article" id="article" size="50" maxlength="50" value=<?= htmlspecialchars($post['id']);?>>
                <input type="hidden" name="action" id="action" size="50" maxlength="50" value="postComment">
                <input type="hidden" name="upload" id="upload" size="50" maxlength="50" value="1">
                <input type="submit" value="post" id="submit"/>
        </div>
                    
    </div>
</form>
<?php 
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        echo "<div class='error'>$status</div>";
    }
?>
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
<?php $content = ob_get_clean();?>
<?php require("template.php");?>
=======
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
>>>>>>> 4498783994008c985cbbece6553006e1f7044a75
