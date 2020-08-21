<?php

class ControleurLivres {

    public function __construct() {

        $this->getLivres();
        
    }

    /**
     * Affiche la page de liste des livres
     *
     */    
    private function getLivres() {
        
        $critere         = isset($_POST['tri']) ? trim($_POST['type'])  : "id_livre";
        $sens            = isset($_POST['tri']) ? trim($_POST['ordre']) : "ASC";
      $reqPDO = new RequetesPDO();
       $livres = $reqPDO->getLivresTri($critere,$sens);
       $vue = new Vue("Livres", array('livres' => $livres,'sens' => $sens,'critere' => $critere),"gabarit");
    }
    
}