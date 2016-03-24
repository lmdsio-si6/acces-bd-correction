<?php
try {
    // Connexion à la BD
    $bdd = new PDO("mysql:host=localhost;dbname=personnel;charset=utf8", "personnel_util", "secret",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // Définition de la requête SQL
    $requete = "SELECT NomEmpl, PrenomEmpl FROM employe ORDER BY Matricule";
    // Exécution de la requête SQL et récupération de ses résultats
    $resultat = $bdd->query($requete);
    // Calcul du nombre de résultats
    $nbEmployes = $resultat->rowCount();
}
catch (Exception $e) {
    die('Erreur fatale : ' . $e->getMessage());
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Liste des employés</title>
</head>
<body>
    <h1>Liste des employés</h1>
    <ul>
        <?php
        // Récupération de tous les résultats de la requête dans un tableau
        $donnees = $resultat->fetchAll();
        // Itération sur les résultats de la requête SQL
        foreach ($donnees as $ligne) {
            $nom = $ligne['NomEmpl'];
            $prenom = $ligne['PrenomEmpl'];
            echo "<li>$nom $prenom</li>";
        }
        ?>
    </ul>
    <?php echo "Total : $nbEmployes employé(s)"; ?>
</body>
</html>
