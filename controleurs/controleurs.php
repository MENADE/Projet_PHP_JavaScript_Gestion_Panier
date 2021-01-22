<?php
// On doit inclure tous les Manager qu'on va se servir
require("modeles/CommentaireManager.php");
require("modeles/BilletManager.php");

require("modeles/ProduitManager.php");
require("modeles/PanierManager.php");

function afficherProduits(){
    //ProduitManager

   // echo ('bonjour');
   $produitManager = new ProduitManager();
    $produits = $produitManager->getProduits();

    require("vues/vueProduits.php");

}

function afficherProduit($idProduit){
    //ProduitManager
    $produitManager = new ProduitManager();
    //Besoin d'une nouvelle function getProduit($idProduit);
    $produit = $produitManager->getProduit($idProduit);
 

    //Besoin d'une nouvelle vue pour un produit en particulier
    require("vues/vueProduit.php");
}

function afficherPanier(){

    //afichage de stock pour chaque produit   

    $panierManager = new PanierManager();     
 $panier = $panierManager->getPanier();

// $donnees = $panier->fetch();

 //charcher la quantite restante et a jour pour chaque produit: note $produitManager->getProduits() retourn un tableau
    $produitManager = new ProduitManager();
    $produits = $produitManager->getProduits();
/* 
    echo   $produits["id"];
    echo $donnees["id_Produit"]; */
  
   require("vues/vuePanier.php");  

       
}

function ajouterProduit($idProduit, $quantite ){

         //ProduitManager
         $produitManager = new ProduitManager();
         //Besoin d'une nouvelle function getProduit($idProduit);
         $produit = $produitManager->getProduit($idProduit);    
         $idProduit =$produit["id"];
         $nomproduit =$produit["nom"];
         $descriptionProduit =$produit["description"];
         $prixProduit =$produit["prix"];
     
        //    echo '<img src="data:image;base64,'.base64_encode( $produit['image'] ).'  "  alt="Image" style ="float:left; with:40px; height:100px; margin:5px 30px 5px 10px" />' ;

        //appel panierManger
        $panierManager =new PanierManager();
        //trouver un produit dans le panier: renvoie une ligne, permet de connaitre cette ligne a combien de quantite
        $lignePanier_trouve= $panierManager->get_Produit_Panier($idProduit);

        //quantite initiale dans la table produits
        $produit["quantite"];

        //quantite met dans le panier chaque fois que l acheteur souhaite acheter
        $quantite;  // (elle est saisie par l utilisateur $_POST)        


    if( $produit["quantite"]>0  && $produit["quantite"]> $quantite  ) {           
        
        if(isset($lignePanier_trouve["quantite"])){       

         //quantite actuel dans le produits
         echo "1-quantite actuel dans le produits". $produit["quantite"]. ' !<br />';

            //quantite actuellement dans le panier
       $quantitePanierActuel = $lignePanier_trouve["quantite"] ;
        echo "2-quantite actuel dans le panier". $lignePanier_trouve["quantite"]. ' !<br />';

       

        //quantite future dans le panier, apres la realisation de l ajout de quantite saisie par l utilisateur
        $quantitePanierApresAjout = $lignePanier_trouve["quantite"] + $quantite ;           
        echo "3-quantite dans le panier apres ajout de quantite saisie". $quantitePanierApresAjout. ' !<br />';
   
        if( $produit["quantite"]>= $quantite){

              $panierManager->modificationQuantiteProduitPanier( $idProduit, $quantitePanierApresAjout); 
             //mise a jour de la quantite de produit idProduit apres avoir mettre une partie de sa quantite dans le panier
             //quantite restante dans la table produits
                 $quantiteProduitDisponible = $produit["quantite"]- $quantite; 
                  echo "4-quantite actuel dans produits apres soustraction pour panier pour la nieme fois". $quantiteProduitDisponible. ' !<br />';
          
                  $produitManager->modificationQuantiteProduitDisponible($idProduit, $quantiteProduitDisponible ); 
        }
        else {
            echo "insufisance de quantite dans le stock";
        }
 
}
  else {    
  $lignesAffectees= $panierManager->ajout_un_Produit($idProduit, $quantite);  
 
  echo "produit met dans la panier pour la premiere fois". ' !<br />';;
    //mise a jour de la quantite de produit idProduit apres avoir mettre une partie de sa quantite dans le panier
             //quantite restante dans la table produits
             $quantiteProduitDisponible = $produit["quantite"]- $quantite; 
             echo "5-quantite actuel dans produits apres soustraction pour panier ajout premiere fois".$quantiteProduitDisponible. ' !<br />';
     
             $produitManager->modificationQuantiteProduitDisponible($idProduit, $quantiteProduitDisponible ); 
 
} 
 
}
else {

echo "la quantite demandé n'est pas disponible";
}


//header("Location:index.php?action=panier&idProduit=".$idProduit);
header("Location:index.php");


}

// controleur de suppression des produits a partir du panier: cela implique la mise a jour des quantites dans la base de donnnée : pour table produits et table panier

 function  suppressionProduit_Du_Panier ($id_Produit) {

 
    $produitManager = new ProduitManager();
  
    $produit = $produitManager->getProduit($id_Produit);
  
  $panierManager =new PanierManager();

  $lignePanier_trouve= $panierManager->get_Produit_Panier($id_Produit);

        if(isset($lignePanier_trouve["quantite"])){

        $quantite_Supprime_produit_panier =  $lignePanier_trouve["quantite"] + $produit["quantite"];

        $panierManager->suppressionProduit_Panier($id_Produit,  $quantite_Supprime_produit_panier );

        } 

        header("Location:index.php?action=panier");


}


function  modifier_Quantite_Produit_Panier( $id_Produit,  $quantite ) {

//modifier la quantite d un produit dans le panier

   // modifier_Quantite_Panier( $id_Produit,   $quantite );

    //ligne panier
    $panierManager =new PanierManager();
  $lignePanier_trouve= $panierManager->get_Produit_Panier($id_Produit);

  //ligne du produit corespond au ligne panier
  $produitManager = new ProduitManager();  
  $produit = $produitManager->getProduit($id_Produit);


    if(  isset($lignePanier_trouve["quantite"])   ){

        //cas de reduction de quantite d un produit dans le panier

       if( $lignePanier_trouve["quantite"] > $quantite     ){

        //calcul quantite a la fois soustraire du panier et a ajouter au produits

         $quantite_a_reduire_de_panier = $lignePanier_trouve["quantite"] - $quantite ;

         $nouvelle_Quantite_Ajouter_Produits =  $quantite_a_reduire_de_panier + $produit ["quantite"];

         $nouvelle_Quantite_Saisie_Panier =  $quantite ;

         $panierManager-> reduire_Quantite_Produit_Panier ($id_Produit,   $nouvelle_Quantite_Saisie_Panier,  $nouvelle_Quantite_Ajouter_Produits );

       }

       // cas d une augmentation de quantite d un produit dans le panier
      else if( $lignePanier_trouve["quantite"] < $quantite     ){

         //calcul quantite a la fois ajouter du panier et a soustraire du produits

        $quantite_a_soustraire_du_Produits = $quantite - $lignePanier_trouve["quantite"]  ;

        $nouvelle_Quantite_Produits = $produit ["quantite"] - $quantite_a_soustraire_du_Produits;

        $nouvelle_Quantite_Saisie_Panier = $quantite; 


        $panierManager->augementer_Quantite_Produit_Panier ($id_Produit, $nouvelle_Quantite_Produits,  $nouvelle_Quantite_Saisie_Panier );
        
    }

    }
    else {
         echo "desoli la quantite du produit dans le panier est null";
    }
  
    
    header("Location:index.php?action=panier");

}





//----------------------------------------------------------------------------------------------------------------

