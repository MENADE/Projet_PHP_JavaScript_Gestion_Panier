<?php
    $titre = "Mon blog";
?>   

<?php ob_start();?>

    <p>Derniers billets du blog :</p>

    <?php
        while($donnees = $req->fetch()){
    ?>
        <div class="news">
            <h3><?= $donnees["titre"] ?> <?= $donnees["date_creation"] ?>  </h3>
            <p> <?= $donnees["contenu"] ?> <br>
            <a href="index.php?action=commentaires&idBillet=<?= $donnees["id"]?>"> Commentaires </a> </p> 

        </div>
        <?php              
        }
    ?>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>