<?php 
     /** configuration le chemin du dossier racine  */
     ini_set('display_errors','on');
     error_reporting(E_ALL);
     
     //recuperer le host et le rot
     $root = $_SERVER['DOCUMENT_ROOT'];
     $host =$_SERVER['HTTP_HOST'];
     //definr les constante
     //lien absolu du root (racine du dossier chemin) et host (http adresse du lien url)
     define('ROOT',$root."/tp2/");
     define('HOSTE', 'http://'.$host."/tp2/");
     
     //lien absolu du controller
     define('CONTROLEUR',ROOT.'controleurs/');
     define('VUES',ROOT.'vues/');
     define('MODELES',ROOT.'modeles/');
     define('LIB',ROOT.'lib/');
     
     //le asset  intregration en css se fait via une url dou HOSTE
     define('STYLES',HOSTE.'styles/');
     
   //  print_r(HOSTE); echo('<br>') ;
     

function chargerClasse($classe) {
    $dossiers = array(LIB, MODELES, VUES, CONTROLEUR);
	foreach ($dossiers as $dossier) {
        $fichier = $dossier.$classe.'.class.php';
      
     
        if (file_exists($fichier)) {
            require_once($fichier);
            //print_r( $fichier); echo('<br>') ;
		}
    } 
}

spl_autoload_register('chargerClasse');
