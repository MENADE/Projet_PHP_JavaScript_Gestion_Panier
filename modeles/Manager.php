<?php 
class Manager{

    function connexionBD(){
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=pipénière;charset=utf8', 'root', '');
/*             $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 */  
      }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    
        return $bdd;
    }
}
?>