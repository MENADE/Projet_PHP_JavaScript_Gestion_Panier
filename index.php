<?php
    require("controleurs/controleurs.php");
    //Routeur. Genre de super-controlleur qui choisit quel contrôleur appeler selon l'action demandée

    if(isset($_GET["action"])){
        if($_GET["action"] == "produit" && isset($_GET["idProduit"])){
            afficherProduit($_GET["idProduit"]);
        }else if($_GET["action"] == "panier"){
            afficherPanier();
        }
        else if($_GET["action"] == "ajouterProduit" && isset($_GET["idProduit"])  ){

            if(isset ($_POST["quantite"]) ){
          
        ajouterProduit($_GET["idProduit"], $_POST["quantite"] );  

        }else{
            echo "Erreur, il n'y a pas d'idProduit ou de quantite";     
           }
 
        }

        else if (  $_GET["action"] == "supprimeProduitDuPanier" && isset($_GET["id_Produit"])   ){
            // appel controleur de suppression des produits a partir de panier
            suppressionProduit_Du_Panier ( $_GET["id_Produit"]);

        }


        else if (  $_GET["action"] == "modifierQuantiteProduitPanier" && isset($_GET["id_Produit"])   ){
            // appel controleur de modification quantite  des produits dans le panier 
            if(isset ($_POST["quantite"]) ){

            modifier_Quantite_Produit_Panier( $_GET["id_Produit"],  $_POST["quantite"] );

            }else{
                echo "Erreur, il n'y a pas de quantite a modifier";       
                }                 
        }


        
    }else{
        //Controleur par défaut
        afficherProduits();
    }
    
   
?>

