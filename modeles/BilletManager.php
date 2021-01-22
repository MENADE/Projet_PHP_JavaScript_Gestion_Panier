
<?php

require_once("Manager.php");
    class BilletManager extends Manager{

        function getBillets(){

            $bdd = $this->connexionBD();
        
            $req = $bdd->prepare('SELECT * from billets');
            $req->execute(array());
        
            return $req;
        }

        function getBillet($idBillet){
            $bdd = $this->connexionBD();
        
            $req = $bdd->prepare('SELECT * from billets WHERE id = :idBillet');
            $req->execute(array(
                "idBillet"=> $idBillet
            ));
        
            //Au lieu de retourner une table, on retourne l'unique ligne concernée
            return $req->fetch();
        
        }
        

    }

?>