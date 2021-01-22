<?php
    $titre =  $billet["titre"];
?>
<?php ob_start()?>
    <p> <a href="index.php"> Retour vers les billets </a> </p>

    <div class="news">
        <h3><?= $billet["titre"] ?> <?= $billet["date_creation"] ?>  </h3>
        <p> <?= $billet["contenu"] ?> <br>
    </div>
           
     <h2> Commentaires </h2>    

    <!-- Appel du routeur avec l'action ajoutCommentaire et l'id du billet-->
     <form action="index.php?action=ajoutCommentaire&idBillet=<?= $billet["id"]?>" method="post">
        <h4> Ajouter un commentaire </h4>
        <p> Auteur <input type="text" name="auteur"> <br>
        Commentaire <input type="text" name="commentaire"> <br>
       <input type="submit" value="Envoyer commentaire">
     </form>   

    <?php
        while($commentaire = $commentaires->fetch()){
    ?>
        <p> <strong><?= $commentaire["auteur"] ?> </strong> le <?= $commentaire["date_commentaire"] ?> </p>
        <p><?= $commentaire["commentaire"] ?> </p>
     <?php       
        }
     ?>

<?php $contenu = ob_get_clean(); ?>

<?php require("template.php") ?>