<?php
    $titre = "Produits de la pépinière";
 
?>   
 
<?php ob_start();?>

<!-- Debut contenu de page -->
<div id="contenu">

<!-- Debut contenu de tableau-->	
  <table >
  <caption style="font-size:22px; font-weight:bold" > Produits disponibles </caption>
   
    <?php   
        while($donnees = $produits->fetch() ){                     
    ?>      
     
           <tr   class="colortitreproduit" >   
                <td colspan=2  id="colorligne"  > <strong>  <?= $donnees["nom"] ?>  </strong>  </td>            
            </tr>
           
            <tr>
                <td   class="colorligne" rowspan=4> <?php echo '<img src="data:image;base64,'.base64_encode( $donnees['image'] ).'"  alt="Image" style ="float:left; with:40px; height:120px; margin:5px 30px 5px 10px" />' ; ?>  </td>
                <td  class="color_contenu_description"   >  <strong> Description :  </strong>  <?= $donnees["description"] ?>   </td>
            </tr>

            <tr>
                <td  class="color_contenu_description" >  <strong> Prix :  </strong>  <?= $donnees["prix"] ?> $  </td>
            </tr>

            <tr>
                <td  class="color_contenu_description" >  <strong> Quantite en stock! :  </strong>  <?= $donnees["quantite"] ?>   </td>
            </tr>

            <tr>
                <td  id="colorligne"  class="color_contenu_description"     >   <a href="index.php?action=produit&idProduit=<?= $donnees["id"]?>"> Ajouter au panier (+) </a>    </td>
            </tr>       
       
       <?php              
        }    
    ?>

 </table>
<!-- fin contenu de tableau-->	


</div>
<!-- fin contenu de la page -->

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?> 
