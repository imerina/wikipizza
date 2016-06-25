<?php
/**
 * Reprise des données
 */
/**
 * Connexion à la base de données
 */
$user = 'root';
$pass = '';
$host = 'localhost';
$base = 'wikipizza';
$dsn = 'mysql:host=' . $host . ';dbname=' . $base;
try {
  $dbh = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
  die("<p>Erreur lors de la connexion : " . $e->getMessage() . "</p>");
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/**
 * Boucle des mises à jour 
 */
$total_pizzas = 0;
$nb_pizzas = 0;
$total_ingredients = 0;
$nb_ingredients = 0;
$total_contient = 0;
$nb_contient = 0;
$file = 'reprise.csv';
$handle = @fopen($file, "r");
if ($handle) {
  while (($items = fgetcsv($handle, 0, ';')) !== false) {
    // Lecture de la pizza
    $libelle = $items[0];
    $prix_petite = str_replace(',', '.', $items[2]);
    $prix_grande = str_replace(',', '.', $items[3]);
    $prix_plaque = str_replace(',', '.', $items[4]);
    // Ajout dans la table pizza
    try {
      $sql = "insert into pizza (libelle,prix_petite,prix_grande,prix_plaque) values (?,?,?,?)";
      $sth = $dbh->prepare($sql);
      $nb_pizzas = $sth->execute(array($libelle, $prix_petite, $prix_grande, $prix_plaque));
      $total_pizzas = $total_pizzas + $nb_pizzas;
      $id_pizza = $dbh->lastInsertId();
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $sql . "<br/>" . $e->getMessage() . "</p>");
    }
    // Lecture des ingrédients
    $chaine = $items[1];
    $libelles = explode(',', $chaine);
    // Parcour de chaque ingrédient de la pizza
    foreach ($libelles as $libelle) {
      // Ingrédient existe déjà ?
      try {
        $sql = "select * from ingredient where libelle = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($libelle));
        $rows = $sth->fetchAll();
      } catch (PDOException $e) {
        die("<p>Erreur lors de la requête SQL : " . $sql . "<br/>" . $e->getMessage() . "</p>");
      }
      if ($rows) {
        // L'ingrédient existe
        $id_ingredient = $rows[0]['id_ingredient'];
        // Ajout de la relation dans la table contient
        try {
          $sql = "insert into contient (id_pizza,id_ingredient) values (?,?)";
          $sth = $dbh->prepare($sql);
          $nb_contient = $sth->execute(array($id_pizza, $id_ingredient));
          $total_contient = $total_contient + $nb_contient;
        } catch (PDOException $e) {
          die("<p>Erreur lors de la requête SQL : " . $sql . "<br/>" . $e->getMessage() . "</p>");
        }
      } else {
        // L'ingrédient n'existe pas
        // Ajout de l'ingrédient
        try {
          $sql = "insert into ingredient (libelle) values (?)";
          $sth = $dbh->prepare($sql);
          $nb_ingredients = $sth->execute(array($libelle));
          $total_ingredients = $total_ingredients + $nb_ingredients;
          $id_ingredient = $dbh->lastInsertId();
        } catch (PDOException $e) {
          die("<p>Erreur lors de la requête SQL : " . $sql . "<br/>" . $e->getMessage() . "</p>");
        }
        // Ajout de la relation dans la table contient
        try {
          $sql = "insert into contient (id_pizza,id_ingredient) values (?,?)";
          $sth = $dbh->prepare($sql);
          $nb_contient = $sth->execute(array($id_pizza, $id_ingredient));
          $total_contient = $total_contient + $nb_contient;
        } catch (PDOException $e) {
          die("<p>Erreur lors de la requête SQL : " . $sql . "<br/>" . $e->getMessage() . "</p>");
        }
      }
    }
  }
  fclose($handle);
} else {
  echo("<p>Impossible d'ouvrir le fichier '$file'</p>");
}
/**
 * statistiques
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
    <meta http-equiv="Content-language" content="fr" />
    <meta name="description" content="--Ajouter une description--" />  
    <meta name="keywords" content="--Ajouter les mots-cles--" />
    <title>Wikipizza - Reprise des données</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
    <h1>Reprise des données</h1>
    <?php
    echo "<p>$total_pizzas pizza(s) ajoutée(s) dans la table</p>";
    echo "<p>$total_ingredients ingrédient(s) ajouté(s) dans la table</p>";
    echo "<p>$total_contient relation(s) ajoutée(s) dans la table</p>";
    ?>
  </body>
</html>