<?php
require_once("Manager.php");

class ProduitManager extends Manager{

    function getProduits(){
        //Écrire la requête SQL pour récupérer les produits
        $bdd = $this->connexionBD();
      
      $req =$bdd->prepare('SELECT * FROM produits ORDER BY nom ASC' );
      $req->execute(array());

      return $req;

    }

    function getProduit($idProduit){
        //Ressemble fortement à getBillet($idBillet)....
       
        $bdd = $this->connexionBD();
        
        $req = $bdd->prepare('SELECT * from produits WHERE id = :idProduit');
        $req->execute(array(
            "idProduit" => $idProduit
        ));
    
        //Au lieu de retourner une table, on retourne l'unique ligne concernée
        return $req->fetch();
    }

   function modificationQuantiteProduitDisponible($idProduit, $quantiteProduitDisponible ){

    $bdd = $this->connexionBD();
 
    $req = $bdd->prepare('UPDATE produits SET quantite = :quantiteTotalDisponibleDansProduits  WHERE id = :idProduit');
   $req->execute(array(
       'idProduit' =>$idProduit,
       'quantiteTotalDisponibleDansProduits' => $quantiteProduitDisponible
      
       ));
       return $req;
 


    }





}

?>