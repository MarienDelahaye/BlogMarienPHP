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
    <title>Le blog de Marien</title>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    <h1>Mon nouveau blog !</h1>
    <p>Derniers billets du blog<p>
    <?php


try

{

    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');


while ($donnees = $req->fetch())

{

  ?>
  <div class="news">
      <h3>
          <?php echo htmlspecialchars($donnees['titre']); ?>
          <em>le <?php echo $donnees['date_creation_fr']; ?></em>
      </h3>
      
      <p>
      <?php
      
      echo nl2br(htmlspecialchars($donnees['contenu']));
      ?>
      <br />
      <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
      </p>
  </div>
  <?php
  } 
  $req->closeCursor();
  ?>

    </body>
  </html>
