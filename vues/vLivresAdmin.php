

<a href="<?php echo HOSTE ;?>admin?item=livre&action=ajouter ">Ajouter un livre</a>
<?php $this->titre = "livres disponibles"; ?>
<table>
    <tr><th>ID livre</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
        <th>Action</th>
    </tr>

<?php foreach ($livres as $livre): // variable $livres provenant de la fonction extract($donnees) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $livre['id_livre'] ?></td>
        <td><?php echo $livre['titre'] ?></td>
        <td><?php echo $livre['auteur'] ?></td>
        <td><?php echo $livre['annee'] ?></td>
        <td> <ul>
                  <li><a href="<?php echo HOSTE ;?>admin?item=livre&action=modifier&id=<?php echo $livre['id_livre']?>">Modifier</a></li>
                  <li> <a href="<?php echo HOSTE ;?>admin?item=livre&action=supprimer&id=<?php echo $livre['id_livre']?> ">Supprimer</a></li>
             </ul>
        </td>
    </tr> 
<?php endforeach; ?>
</table>