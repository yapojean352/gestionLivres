<?php
 
if (isset($_POST['form'])) {
     $annee="";
 $titre="";
  $auteur="";
  
    // contrôles des champs saisis
    // ---------------------------
   
   // $erreur = array();//tableau associatif contenanst les message  erreurs de different champs
  
  // recuperation des valeurs du formulaire  
    
     
    /* ========== gestion des expressions regulieres sur les formulaires =========*/
    //-----------------Validation---telephone---------------
  
    if (isset($livre->erreurs['annee']) && $livre->erreurs['annee']==true) {
        $erreurs['annee'] = "annee incorrect commpris entre 1900 et 2020";
    }else{
        $annee=$livre->annee;
    }

    if (isset($livre->erreurs['titre']) && $livre->erreurs['titre']==true) {
        $erreurs['titre'] = "au moins un caractère éditable";
    }else{
        $titre=$livre->titre; 
    }
    if (isset($livre->erreurs['auteur']) && $livre->erreurs['auteur']==true) {
        $erreurs['auteur'] = "au moins 2 caractères alphabétiques";
    }else{
        $auteur=$livre->auteur;
    }


// //A afire gerer l expressions reguliere du telephone
// /*******************************/
//     if (empty($)) {
//      $erreurs['client_nom'] = "*saisie obligatoire.";
    
       
//     }
// /*******************************/

//     if (empty($client_prenom)) {
//      $erreurs['client_prenom'] = "*saisie obligatoire.";
//   }

// /*******************************/

//     if (empty($client_rue)) {
//      $erreurs['client_rue'] = "*saisie obligatoire.";
//   }
// /*******************************/

//     if (empty($client_ville)) {
//      $erreurs['client_ville'] = "* saisie obligatoire.";
//   }

// /*******************************/
//     if (empty($client_pays)) {
//      $erreurs['client_pays'] = "*saisie obligatoire.";

//     }
    
// /*******************************/
//     if (empty($client_cp)) {
//      $erreurs['client_cp'] = "*saisie obligatoire.";

//     }
   
   
//     /*******************************/
//     if (empty($client_tel)) {
//      $erreurs['client_tel'] = "*saisie obligatoire.";

//     }
 
}

?>


   
        <h1>Ajout d'un livre</h1>      
        <p><?php echo isset($retSQL) ? $retSQL : "&nbsp;" ?></p>    
        <form method="POST" action="<?php echo HOSTE; ?>admin?item=livre&action=ajouter&id=">
    <?php //var_dump($livre->titre); ?>  
            <div>
                <label>Titre:</label><input type="text"  name="titre" value="<?php echo $titre; ?>" />
                <span><?php echo isset($erreurs['titre']) ? $erreurs['titre'] : "&nbsp;"   ?></span>
            </div>
            <div>
                <label>Auteur:</label><input type="text"  name="auteur"  value="<?php echo $auteur; ?>"/>
                <span><?php echo isset($erreurs['auteur']) ? $erreurs['auteur'] : "&nbsp;" ?></span>
            </div>
            <div>
                <label>Annee:</label><input type="text" name="annee" value="<?php echo $annee; ?>"/>
                <span><?php echo  isset($erreurs['annee']) ? $erreurs['annee'] : "&nbsp;"  ?></span>
            </div>
         
            <div>
                <input type="submit" value="enregistrer" name="form" />
            </div>
    
        </form>
   
   