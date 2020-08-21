<?php $this->titre = "Liste des livres"; ?>
<form id="tri" action="<?php echo HOSTE; ?>livres?action=tri" method="post">
            <label>Trier par</label>
            <select name="type"> 
                <option value="annee" <?php echo $_POST['type'] === "annee" ? "selected" : "" ?>  >Annee</option>
                <option value="titre" <?php echo $_POST['type'] === "titre" ? "selected" : "" ?>>Titre</option>
				<option value="auteur" <?php echo $_POST['type'] === "auteur" ? "selected" : "" ?> >Auteur</option>              
            </select>

            <label>Ordre</label>
            <select name="ordre">
                <option value="DESC" <?php echo $_POST['ordre'] === "DESC" ? "selected" : "" ?> >Descendant</option>
                <option value="ASC" <?php echo $_POST['ordre'] === "ASC" ? "selected" : "" ?>>Ascendant</option>
            </select>
           
            <input type="submit" name="tri" value="Executer le tri"> 
</form>

<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
    </tr>

<?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees ?>

<?php foreach ($livres as $livre): // variable $livres provenant de la fonction extract($donnees) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $livre['titre'] ?></td>
        <td><?php echo $livre['auteur'] ?></td>
        <td><?php echo $livre['annee'] ?></td>
    </tr>
<?php endforeach; ?>
</table>