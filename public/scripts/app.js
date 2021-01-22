   //alert de confirmation de l'ajout d'un produit dans le panier       
   function myFuctionAjoutProduitPanier () {
    alert("Veuillez SVP confirmer l'ajouter de produit a votre panier!")       
  }
  
 
 // myFuctionSupressionProd

 function myFuctionSupressionProd () {
        alert("Veuillez SVP confirmer la suppression de ce produit de votre panier!")       
      }

  

  function myFuctionmodifierProdPanier () {
    alert("Veuillez SVP confirmer la modification du quantite!")       
  }


  
    $(function() {  
     
// focus
$('input').focus(function () {
  lefous = '#' + $(this).attr('id');
  $(lefous).css('background-color', '#FFA500');
});
$('input').blur(function () {
  lefous = '#' + $(this).attr('id');
  $(lefous).css('background-color', '#fff');
});
     
     //animation  du curseur
      const cursor = document.querySelector('.cursor');

document.addEventListener('mousemove', e => {
    cursor.setAttribute('style', 'top:'+(e.pageY - 20)+"px; left:"+(e.pageX - 20)+"px;")
})

document.addEventListener('click', ()=>{
    cursor.classList.add('expand');

    setTimeout(()=>{
        cursor.classList.remove("expand");
    }, 500);
})


// changement de theme     
          $('#changetheme').click(function(){
          $("body").toggleClass("themePale");
            });
          

      })

      