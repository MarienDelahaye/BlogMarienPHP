<!DOCTYPE html>
  <html>
    <head>
    <header>
    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center">Blog Marien</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php">Accueil</a></li>
      </ul>
    </div>
  </nav>
  </header>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Le blog de Marien - Espace commentaires</title>
    </head>

    <body>
    <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
echo 'Connexion a la BDD réussi';
?>