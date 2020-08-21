<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo STYLES;?>styles.css">
    <title><?php echo $titre ?></title>
</head>
<body>
    <div id="global">
        <header>
            <h1>ADMINISTRATION DE LA BIBLIOTHEQUE !</h1>
            <ul>
                <li><a class="<?php echo $this->vue === "LivresAdmin" ? "active" : ""; ?>"
                       href="admin">Liste des livres</a></li>
            </ul>
        </header>
        <div id="contenu">
            <?php echo $contenu ?> <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>