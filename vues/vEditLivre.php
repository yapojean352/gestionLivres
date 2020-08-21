<?php
if (isset($_POST['form'])) {
    
    /* ========== gestion des erreurs sur les formulaires =========*/
    
  
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

 
}
?>


<?php $this->titre = "Modifier un livre"; ?>   
  <h1>Modifier un livre</h1>   
 <form method="POST" action=" <?php echo HOSTE ;?>admin?item=livre&action=modifier&id=<?php echo $id?>">
 
    <div>
         <label> ID livre: <?php echo $id ;?></label>
       
     </div>
     <div>
        <input type="hidden"   name="id_livre" value="<?php echo $id ;?>"  />
       
     </div>
     <div>
         <label> Titre:</label><input type="text"  name="titre" value="<?php echo $livre->titre ;?>"  />
         <span><?php echo isset($erreurs['titre']) ? $erreurs['titre'] : "&nbsp;"  ?></span>
     </div>
     <div>
         <label>Auteur:</label><input type="text"  name="auteur" value="<?php echo $livre->auteur ;?>"/>
         <span><?php echo isset($erreurs['auteur']) ? $erreurs['auteur'] : "&nbsp;" ?></span>
     </div>
     <div>
         <label>Annee:</label><input type="text" name="annee" value="<?php echo $livre->annee;?>" />
         <span><?php echo  isset($erreurs['annee']) ? $erreurs['annee'] : "&nbsp;"  ?></span>
     </div>
    
     <div>
         <input type="submit" value="Modifier" name="form" />
     </div>

</main>
