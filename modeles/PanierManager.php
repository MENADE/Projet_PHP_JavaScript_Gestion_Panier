<?php
require_once("Manager.php");
require_once("ProduitManager.php");

class PanierManager extends Manager{

    function getPanier(){

        //Écrire la requête SQL pour récupérer les produits
        $bdd = $this->connexionBD();
      $req =$bdd->prepare('SELECT * FROM panier  ORDER BY nom ASC ');
      $req->execute(array());

      return $req;

    }

 function get_Produit_Panier($idProduit) {

    $bdd = $this->connexionBD();
        
        $req = $bdd->prepare('SELECT * from panier WHERE id_Produit = :idProduit ');
        $req->execute(array(
            "idProduit" => $idProduit
        ));
    
        //Au lieu de retourner une table, on retourne l'unique ligne concernée
       return $req->fetch();
}

function modificationQuantiteProduitPanier( $idProduit, $quantitePanierApresAjout){

    $bdd = $this->connexionBD();
 
     $req = $bdd->prepare('UPDATE panier SET quantite = :quantiteTotalDeProduitDansPanier  WHERE id_Produit = :idProduit');
    $req->execute(array(
        'idProduit' =>$idProduit,
        'quantiteTotalDeProduitDansPanier' => $quantitePanierApresAjout
       
        ));

               
        return $req; 

}


    function ajout_un_Produit($idProduit, $quantite){

        $bdd = $this->connexionBD();

  
        $req = $bdd->query("INSERT INTO panier(id_Produit, imagem, nom, description_prod, prix, quantite) select id, image, nom, description, prix, quantite from produits where id = $idProduit  ");
        $req = $bdd->query("UPDATE panier SET quantite = $quantite WHERE id_Produit = $idProduit");     
  
    }

  
   function suppressionProduit_Panier($id_Produit,  $quantite_Supprime_produit_panier )
   {
    
    $bdd = $this->connexionBD();
 
     $req = $bdd->prepare('DELETE FROM panier  WHERE id_Produit = :idProduit');
    $req->execute(array(
        'idProduit' =>$id_Produit               
        ));

   $req = $bdd->query("UPDATE produits SET quantite =  $quantite_Supprime_produit_panier WHERE id = $id_Produit");    
   }


   //modification quantite dans le panier et mise a jour des tables base de donnees

function  reduire_Quantite_Produit_Panier ($id_Produit,   $nouvelle_Quantite_Saisie_Panier,  $nouvelle_Quantite_Ajouter_Produits )
{
   $bdd = $this->connexionBD();
    //reduire quantite dans le panier
 
 
     $req = $bdd->prepare('  UPDATE panier SET quantite =  :quantite_nouvelle_de_panier WHERE id_Produit = :id_Produit  ');
    $req->execute(array(
        'id_Produit' =>$id_Produit,
        'quantite_nouvelle_de_panier' => $nouvelle_Quantite_Saisie_Panier
        
        ));

    // augmenter quantite dans le prouits

    $req = $bdd->prepare(' UPDATE produits SET quantite =  :quantite_ajouter_au_produits WHERE id = :id_Produit  ');
    $req->execute(array(
        'id_Produit' =>$id_Produit,
        'quantite_ajouter_au_produits' => $nouvelle_Quantite_Ajouter_Produits
        
        ));

}


 function augementer_Quantite_Produit_Panier ($id_Produit, $nouvelle_Quantite_Produits,  $nouvelle_Quantite_Saisie_Panier   )
 {

    $bdd = $this->connexionBD();
    //reduire quantite dans produits

    $req = $bdd->prepare(' UPDATE produits SET quantite =  :nouvelle_Quantite_Produits WHERE id = :id_Produit  ');
    $req->execute(array(
        'id_Produit' =>$id_Produit,
        'nouvelle_Quantite_Produits' => $nouvelle_Quantite_Produits
        
        ));

    // augmente quantite dans le panier

    
    $req = $bdd->prepare('  UPDATE panier SET quantite =  :nouvelle_Quantite_Saisie_Panier WHERE id_Produit = :id_Produit  ');
    $req->execute(array(
        'id_Produit' =>$id_Produit,
        'nouvelle_Quantite_Saisie_Panier' => $nouvelle_Quantite_Saisie_Panier
        
        ));

 }



}

?>