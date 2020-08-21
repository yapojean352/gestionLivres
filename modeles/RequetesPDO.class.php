<?php

class RequetesPDO {
    
    public function getLivres($tri = "id_livre" , $sens="ASC") {
        //possible de retirer le try catch car utiliser au dessus
            $sPDO = SingletonPDO::getInstance();
            $sql = "SELECT id_livre, titre, auteur ,annee from livre 
            ORDER BY $tri $sens";

            $oPDOStatement = $sPDO->prepare($sql);
            $oPDOStatement->execute();
            $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $livres;
    }

    public function getLivresTri($tri = "id_livre" , $sens="ASC") {
        //possible de retirer le try catch car utiliser au dessus
       // try {
            $sPDO = SingletonPDO::getInstance();
            $sql = "SELECT id_livre, titre, auteur ,annee from livre 
            ORDER BY $tri $sens";

            $oPDOStatement = $sPDO->prepare($sql);
            $oPDOStatement->execute();
            $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $livres;
       // } catch(PDOException $e) {
           // throw $e;
      //  }
    }
    public function createLivre($titre,$annee,$auteur){
      
        $sPDO = SingletonPDO::getInstance();
        $query = "INSERT INTO livre (id_livre, titre ,annee ,auteur)
         VALUES(NULL,:titre,:annee,:auteur);";
     
        $oPDOStatement = $sPDO->prepare( $query);
        //if(isset($values['client_id'])) $oPDOStatement ->bindValue(':client_id',$values['id'],PDO::PARAM_INT);
        $oPDOStatement ->bindParam(':titre',$titre,PDO::PARAM_STR);
        $oPDOStatement ->bindParam(':annee',$annee,PDO::PARAM_INT);
        $oPDOStatement ->bindParam(':auteur',$auteur,PDO::PARAM_STR);
        $oPDOStatement ->execute();
      
    }
      /**
     * efface un livre
     */
  
    public function SqldeleteLivre($id){
        $sPDO = SingletonPDO::getInstance();
        $oPDOStatement = $sPDO->prepare(
            "DELETE  FROM livre
        where id_livre = :id ;"
            );
        $oPDOStatement->bindParam(':id', $id,PDO::PARAM_INT);
        $oPDOStatement->execute();

    }
    public function upDateLivre($id,$titre,$annee,$auteur){
        $sPDO = SingletonPDO::getInstance();
        $query ="UPDATE livre SET  titre =:titre,
        annee = :annee,
        auteur = :auteur  WHERE id_livre = :id ; ";
    $oPDOStatement = $sPDO->prepare( $query);
    $oPDOStatement ->bindParam(':id',$id,PDO::PARAM_INT);
    $oPDOStatement ->bindParam(':titre',$titre,PDO::PARAM_STR);
    $oPDOStatement ->bindParam(':annee',$annee,PDO::PARAM_INT);
    $oPDOStatement ->bindParam(':auteur',$auteur,PDO::PARAM_STR);
    $oPDOStatement ->execute();
  
}
/** recupere un livre par son id */
public function findLivre($id)
    {
        $sPDO = SingletonPDO::getInstance();
        // Avec une requête non préparée
        // =============================
        $oPDOStatement = $sPDO->prepare(
            "SELECT *  FROM livre  WHERE id_livre = :id"
        );
        $oPDOStatement->bindParam(':id', $id);
        $oPDOStatement->execute();
        $livre = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return   $livre;       
    }
  

}