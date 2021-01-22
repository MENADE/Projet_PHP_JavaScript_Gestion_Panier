<?php
require_once("Manager.php");
class CommentaireManager extends Manager{
    function getCommentaires($idBillet){

        $bdd = $this->connexionBD();
        //Requête pour aller chercher tous les commentaires associés au billet $idBillet
        $req = $bdd->prepare('SELECT * from commentaires WHERE id_billet = :idBillet');
        $req->execute(array(
            "idBillet" => $idBillet
        ));
    
        //Retourne une table avec les commentaires
        return $req;
    
    }

    function ajoutCommentaire($idBillet, $auteur, $commentaire){
        $bdd = $this->connexionBD();
    
        $req = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(:idBillet, :auteur, :commentaire, NOW())");
        $req->execute(array(
            "idBillet"=>$idBillet,
            "auteur"=>$auteur,
            "commentaire"=>$commentaire
        ));
    
        return $req->rowCount();
    
    }

}


?>