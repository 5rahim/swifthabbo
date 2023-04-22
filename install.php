<?php

require 'brain/core.php';

if($Settings->isInstalled()) {
  redirect('index.php');
}

?>

<!Doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>SwiftHabbo</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="brain/style/images/icon.png" />
  <link rel="stylesheet" href="brain/style/css/swift.css?time=<?= time() ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="brain/js/jquery.min.js"></script>
  <script src="brain/js/jquery-ui.min.js"></script>
</head>
<body>

  <?php require 'includes/alerts.php'; ?>

  <div class="container containerCentered">
    
    <div class="panel">
      
      <div class="panelTitle panelTitleHaveIcon iconConfig">Configuration du site de fan</div>
      <div class="panelBody">
        <div class="panelContent">
         <div class="warningContent"></div>
          <form id="installation">
            <label for="">Nom du site de fan</label>
            <input type="text" class="field" name="siteTitle" id="siteTitle"><br>
            <label for="">Description du site de fan</label>
            <input type="text" class="field" name="siteDescription" id="siteDescription"><br>
            <label for="">Pseudonyme</label>
            <input type="text" class="field" name="creatorPseudo" id="creatorPseudo"><br>
            <label for="">Adresse mail</label>
            <input type="email" class="field" name="creatorEmail" id="creatorEmail"><br>
            <label for="">Mot de passe</label>
            <input type="password" class="field" name="creatorPassword" id="creatorPassword"><br>
            <label for="">Confirmer le mot de passe</label>
            <input type="password" class="field" name="creatorPasswordCf" id="creatorPasswordCf"><br>
            <button class="button"><i class="fa fa-check"></i> Terminer la configuration</button>
          </form>
        </div>
      </div>
      
    </div>
    
  </div>

  <?php require 'includes/script.php'; ?>

</body>
</html>

