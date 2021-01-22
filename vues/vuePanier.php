<?php
    $titre = "Produits de la pépinière";
?>   

<?php ob_start();?>

<!-- Debut contenu de page -->
<div id="contenu">

<!-- Debut contenu de tableau-->

<table  style="height:400px;" >
  <caption style="font-size:22px; font-weight:bold" >Détail de votre panier </caption>

    <?php
  
   $totalfacture =0;
   $total_quantite =0;
   

        while($donnees = $panier->fetch() ){
           
        ?>
            <tr   class="colortitreproduit" >   
                <td colspan=4  id="colorligne"  > <strong>  <?= $donnees["nom"] ?>  </strong>  </td>            
            </tr>

            <tr>
                <td   class="colorligne" rowspan=4> <?php echo '<img src="data:image;base64,'.base64_encode( $donnees['imagem'] ).'"  alt="Image" style ="float:left; with:40px; height:120px; margin:5px 30px 5px 10px" />'  ?>  </td>
                <td  class="color_contenu_description"  colspan=3  >  <strong> Description :  </strong>  <?= $donnees["description_prod"] ?>   </td>
                 </tr>

                 <tr>
                <td  id="alignemnet" class="color_contenu_description"  colspan=3 >  <strong style="margin-right:10px"> Prix :   <?= $donnees["prix"] ?> $  </strong> </td>
            </tr>


            <!-- modifier quantite du panier -->

            <form id="modifie_quantite" method="post" action="index.php?action=modifierQuantiteProduitPanier&id_Produit=<?= $donnees["id_Produit"]?>" >    
            <tr>
                <td  class="color_contenu_description" > <input id="zone1" style="width: 140px ;height:25px" type="text" name="quantite"  placeholder="saisie nouvelle quantite"   >  <input onclick="myFuctionmodifierProdPanier()" style="width: 150px" id="buttonModisup" type="submit" value="Modifier Quantite">   </td>
             </form> 

            <td colspan=2  id="alignemnet"class="color_contenu_description"   >  <strong style="margin-right:10px" > Quantite dans le panier! :    <?= $donnees["quantite"] ?>  </strong> </td>
            </tr>

            <!-- suppression totale du produit de votre panier -->

            <form  method="post" action="index.php?action=supprimeProduitDuPanier&id_Produit=<?= $donnees["id_Produit"]?>" >   
            
            <tr>
               
                <td class="color_contenu_description" > </td> 
              
                <td   colspan=2  class="color_contenu_description" id="alignemnet" >  <input id="supp" onclick ="myFuctionSupressionProd()"  class="buttonsup"   type="submit" value="Supprimé du panier">   <strong style="margin-right:10px"> Sous Total à payer!  <?= $donnees["prix"] * $donnees["quantite"] ?> $ </strong>       </td> 
            </tr>
          
            <!-- quantite restante dans le stock -->        

       <?php 
       $totalfacture += $donnees["prix"] * $donnees["quantite"] ;   
       ?>
      </form>      

        <?php              
        }    
    ?>

</table >

<!-- fin contenu de tableau-->	
</div>
<!-- fin contenu de la page -->

<table>

  
   <Button id="aligntotaux"  >  <strong >Total à payer!  <?= $totalfacture ?> $</strong>  </Button>           

 
</tr>
</table>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>