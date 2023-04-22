<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(10);

$desc = 'Paramètres du site';

$page = 2;

$SH->swiftUpdateAIS();
$SH->swiftUpdateDescription();
$SH->swiftUpdateTitle();

require 'includes/header.php';

?>


<div class="content">
  
  <div class="panel panelNormal">
    <div class="panelTitle">Configurer le nom du site</div>
    <div class="panelBody">
      <div class="panelContent">
        <form method="post">
          <label for="">Nom du site:</label>
          <input type="text" name="siteTitle" class="field" value="<?= $Settings->getTitle() ?>"><br>
          <button class="button" name="updateTitle">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
  
  <div class="panel panelNormal">
    <div class="panelTitle">Description du site</div>
    <div class="panelBody">
      <div class="panelContent">
        <form method="post">
          <label for="">Description:</label>
          <input type="text" name="siteDescription" class="field" value="<?= $Settings->getDescription() ?>"><br>
          <button class="button" name="updateDescription">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
  
  <div class="panel panelNormal">
    <div class="panelTitle">Système d'avatar</div>
    <div class="panelBody">
      <div class="panelContent">
        <form method="post">
          <label for="">Le rétroserveur du fansite as-t'il un système d'habbo-imaging ?</label>
          <div>
            <input type="radio" name="hasImagingSystem" value="1" <?= $SH->defaultAvatarImagingRadio(1) ?>> Oui <br>
            <input type="radio" name="hasImagingSystem" value="0" <?= $SH->defaultAvatarImagingRadio(0) ?>> Non
          </div>
          <br>
          <label for="">L'url de début de l'habbo-imaging du rétroserveur (si oui) (Exemple: http://hbeta.net/habbo-imaging/)</label>
          <input type="text" name="imagingSystemLink" class="field" value="<?= $Settings->getImagingSystemLink() ?>"><br>
          <button class="button" name="avatarImaging">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>