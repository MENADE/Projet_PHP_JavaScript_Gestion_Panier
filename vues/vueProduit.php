<?php
    $titre = "Pommier";
?>   

<?php ob_start();?>

<table style="height:400px; margin-top:70px">
  <caption  style="font-size:22px; font-weight:bold" > Détail sur le produit <strong style="color:red" ><?= $produit["nom"] ?> </strong></caption>

            <tr   class="colortitreproduit" >   
                <td colspan=2  id="colorligne"  > <strong>  <?=$produit["nom"]?>  </strong>  </td>            
            </tr>

  
            <tr>
                <td   class="colorligne" rowspan=5> <?php echo '<img src="data:image;base64,'.base64_encode( $produit['image'] ).'"  alt="Image" style ="float:left; with:40px; height:120px; margin:5px 30px 5px 10px" />' ; ?>  </td>
                <td  class="color_contenu_description"   >  <strong> Description :  </strong>  <?= $produit["description"] ?>   </td>
            
            </tr>

            <tr>
                <td  class="color_contenu_description" >  <strong> Prix :  </strong>  <?= $produit["prix"] ?> $  </td>
            </tr>


            <tr>
                <td  class="color_contenu_description" >  <strong> Quantite en stock! :  </strong>  <?= $produit["quantite"] ?>   </td>
            </tr>

                
            <form  method="post" action="index.php?action=ajouterProduit&idProduit=<?= $produit["id"]?>" > 

            
            <tr>
                <td  class="color_contenu_description" >  <input   style="margin-left:130px ; height: 50px"  type="text" name="quantite"  placeholder="saisie nouvelle quantite">  </td> 
                                
            </tr>
           
             <tr>
                <td   class="color_contenu_description">  <input   onclick="myFuctionAjoutProduitPanier()" class="modif" style="margin-left:130px; width:180px; ; height: 50px "  type="submit" value="ajouter au panier"> </td >   
             </tr>

            </form>  

            <br>
            <br>
 

</table>
<br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
         
       

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>