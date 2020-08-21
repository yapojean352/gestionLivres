<?php
/**
 * controleur page admin
 */

class ControleurAdmin {
    private $action  = "lister";   
    private $id      = ""; 

    public function __construct() {
       if(isset( $_GET['action']) && ( $_GET['action']=="ajouter") &&   !isset($_GET['id'] )){
        $this->ajouterLivre();
     
         }
    if ( isset( $_POST['form'])  && ($_GET['action']=="ajouter" ) &&   isset($_GET['id'] ) ) {
        $this->ajout();
   
       
       }
       if (isset( $_GET['action'])  && ( $_GET['action']=="modifier" ) &&   isset($_GET['id'] ) ) {
       $this->findLivre();
    
       }
       if (!isset( $_GET['action'])  &&   !isset($_GET['id'] ) ) {
        $this->getLivres();  
       }
       if(isset( $_GET['action'])  && ( $_GET['action']=="supprimer" ) &&   isset($_GET['id'] )){
        $this->deleteLivre();
       }
     
    }

    /**
     * Affiche la page de liste des livres
     *
     */    
    private function getLivres() {
       $reqPDO = new RequetesPDO();
       $livres = $reqPDO->getLivres();
       $vue = new Vue("LivresAdmin", array('livres' => $livres),"gabaritAdmin");
    }
    
    /**
     *  la fonction affiche le formulaire d ajout  
     */
    public function ajouterLivre(){
       
    $MyView = new Vue ('AjoutLivres',array(),"gabaritAdmin");
   
 }
 /**
  * execute le formulaire ajout a la base de donnee
  */
public function ajout(){
    $manager = new RequetesPDO();
    $titre = trim($_POST['titre']);
    $annee = trim($_POST['annee']);
    $auteur =trim( $_POST['auteur']);
     $oLivre = new livre($titre, $auteur,$annee);
     if (count($oLivre->erreurs) === 0) { 
        $manager->createLivre($titre,$annee,$auteur);
         echo("ajout efffectuer");
         $vue = new Vue("LivresAdmin", array(),"gabaritAdmin");
    $vue->redirect("admin");
     } else {
        $vue = new Vue("AjoutLivres", array('livre' => $oLivre),"gabaritAdmin");
         echo ("ajout non effectuer");
     }
}
/**
 * recupere un livre par son id
 * 
 */
public function findLivre(){
   global $livre;
   $manager = new RequetesPDO();
    if(isset( $_GET['action'])  && ( $_GET['action']=="modifier" ) &&   isset($_GET['id'] )){  
        $this->id=$_GET['id'];
        $livre = $manager->findLivre($this->id);
        array_shift($livre); // pour enlever le champ id
        $oLivre = new Livre(...array_values($livre));
       }
        if(isset( $_POST['form'])  &&  ( $_GET['action']=="modifier")  &&  isset($_GET['id'] )){
       
        $id = trim($_POST['id_livre']);
        $titre = trim($_POST['titre']);
        $annee = trim($_POST['annee']);
        $auteur =trim( $_POST['auteur']);
         $oLivre = new livre($titre, $auteur,$annee);
         if (count($oLivre->erreurs) === 0) { 
            $manager->upDateLivre($id,$titre,$annee,$auteur);
            $MaVue = new Vue("LivresAdmin",array(),"gabaritAdmin");
            //redirection a la page d  acceuil
            $MaVue->redirect("admin");
         }else{
             echo("ajout non effectuer");
         }
       }
$MaVue = new Vue("EditLivre",array('livre' => $oLivre,'id' => $this->id),"gabaritAdmin");

}
/**
 * fonction a appeler par le controleur pour la suppression
 */
public function deleteLivre(){
    if(isset($_GET['id'])){  
        $this->id=$_GET['id'];
        $manager = new RequetesPDO();
        $manager->SqldeleteLivre( $this->id);
    }
   
    $MaVue = new Vue("LivresAdmin",array(),"gabaritAdmin");
    $MaVue->redirect("admin");

}
  
}