<form method="POST" action="index.php">
    <p>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value=<?php echo $_COOKIE['login'];?> />
    </p>
    <p>
        <label for="comm">Comment:</label>
        <textarea name="comm" id="comm" cols=27 rows=6>Maximum 255 characters</textarea>
    </p>
    <p>
        <input type="submit" value="Send" />
        <input type="button" value="Refresh" id="refresh_btn">
    </p>
    <p>
        <input type="hidden" name="action" value="postComment"?> />
        <input type="hidden" name="article_id" value=<?php echo '"'.$post['id'].'"'?> />
    </p>
</form>