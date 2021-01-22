<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
 <link href="public/styles/style5.css" rel="stylesheet" />  
 <link href="public/styles/stylelast.css" rel="stylesheet" /> 
 <script src="public/scripts/jquery.js"> </script>


     </head>	 
    <body> 

	<div class="cursor"></div>
 <script src="public/scripts/app.js"> </script>
<!-- tête de page-->
			
			<div  id="entete">
				
				<h2>	<img src="public/images/pip2.png" width="250px" height="60px"/> </h2>
				<h1 > Pépinière Menade Hamdaoui </h1>
			</div>

<!-- menue -->

            <div >
				<ul id="navigation">
					<li >
						<a id="navigation" href="index.php"   style="margin:0px 0px 0px 200px"><Button >  <strong> Produits</strong> </Button>  </a>
					</li>
					<li >
						<a  href="index.php?action=panier">  <Button  ><strong> Votre panier</strong> </Button>    </a>
                    </li>
                                                            
                        <li   id="changetheme">  <Button>  <strong> Changé le thème</strong>  </Button>  </li>

					
					
				</ul>
            </div>
         <!-- insertion contenu de tableau via  ob_start()   -->	
        <?= $contenu ?>


<!-- pied de page -->


<div id="pied">
	<code>
		Dernière modification le 25 Decembre 2020
	</code>
	<code id="copyright">
		Mise en page © 2008 Elephorm et Alsacréations
		contenu provenant du site de <a id="copyright" href="https://espacepourlavie.ca/jardin-botanique/" target="blank">Jardin botanique Montreal</a>
	</code>
</div>

<!-- javascripte pour changer le theme suite a une click-->


 </body>


</html>