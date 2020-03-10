<h2> comments </h2>

<form method="post" action="index.php">
                
    <div class="contactInput">
        <div class="contentDiv">
            <label for="name">Name : </label>
                <input type="text" name="author" id="author" size="50" maxlength="50" value=<?php echo $text_value;?>>
                <label for="comment">comment : </label>
                <textarea name="comment" id="comment"  rows="10" cols="50" required></textarea>
                <input type="hidden" name="article" id="article" size="50" maxlength="50" value=<?= $postId?>>
                <input type="hidden" name="action" id="action" size="50" maxlength="50" value="post">
                <input type="hidden" name="upload" id="upload" size="50" maxlength="50" value="1">
                <input type="submit" value="submit" id="submit"/>
        </div>
                    
    </div>
</form>