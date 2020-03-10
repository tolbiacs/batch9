
<?php $title = "My blog";?>
	
    
        
 <?php ob_start(); ?>   
<h1>My super blog !</h1>
<p>last articles of the blog :</p>

<?php
while ($data = $articles->fetch())
{
//<<<<<<< HEAD
    ?>


        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']); ?>
                <em>le <?= $data['date_creation_fr']; ?></em>
            </h3>
                <p><?= nl2br(htmlspecialchars($data['content'])); ?>
                <br />
                <em><a href="index.php?action=post&article=<?=$data['id']; ?>">Comments</a></em>
            </p>
        </div>
//=======
?>
    <div class="news">
        <h3><?= htmlspecialchars($data['title']); ?>
            <em>the <?= $data['date_creation_fr']; ?></em>
        </h3>
        
        <p>
        <?= nl2br(htmlspecialchars($data['content']));?>
        <br />
        <em><a href="index.php?action=post&article=<?= $data['id']; ?>">Comments</a></em>
        </p>
    </div>
>>>>>>> 4498783994008c985cbbece6553006e1f7044a75
<?php
} // end of the loope for the articles
$articles->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<<<<<<< HEAD
<?php require("template.php");?>
=======
<?php require('template.php');?>
>>>>>>> 4498783994008c985cbbece6553006e1f7044a75
