<form id="comment_form" method="POST" action="index.php">
    <input type="hidden" name="action" value="postcomment">
    <input type="hidden" name="id_articles" value="<?= $postId;?>"/>
    <input name="autor" type="text" placeholder="name please" />
    <input id="comment" name="comment" type="text" placeholder="comment please">
    <input type="submit" id="comment_enter" value="post">
    <br><br>===========<br>
</form>