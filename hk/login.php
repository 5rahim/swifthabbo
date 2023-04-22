<?php

require '../brain/core.php';

$User->inverseRestrict();

$SH->swiftLogin('admin');

?>


<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?= $SH->title() ?> - Connexion</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../brain/style/images/icon.png" />
  <link rel="stylesheet" href="../brain/style/css/swift.css?time=<?= time() ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="../brain/js/jquery.min.js"></script>
  <script src="../brain/js/jquery-ui.min.js"></script>
</head>
<body>

<?php include 'includes/alerts.php'; ?>

<div class="container containerCentered">
  
<div class="panel">
      
  <div class="panelTitle panelTitleHaveIcon iconHome">Connexion au pannel</div>
  <div class="panelBody">
    <div class="panelContent">
     <div class="warningContent"></div>
      <form method="post">
        <label for="">Pseudonyme:</label>
        <input type="text" class="field" name="loginPseudo"><br>
        <label for="">Mot de passe:</label>
        <input type="password" class="field" name="loginPassword"><br>
        <button class="button" name="login"><i class="fa fa-check"></i> Se connecter</button>
      </form>
    </div>
  </div>

</div>

</div>

<?php include 'includes/script.php'; ?>

</body>
</html>