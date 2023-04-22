<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(10);

$desc = 'Gérer le thème du site';

$SH->swiftUpdateTheme();

$page = 3;

require 'includes/header.php';

?>


<div class="content">
  
  
  
  <?php $req = $DB->Query('SELECT * FROM themes');
  foreach($req as $res) { ?>
    
    <div class="card">
    <div class="cardTop" style="background-image: url(../themes/<?= $res->title ?>/global/style/images/<?= $res->preview ?>)">
      <div class="cardCaption"><?= $res->title ?></div>
    </div>
    <div class="cardBottom">
      <?php if($Settings->getCurrentTheme() == $res->id) { ?>
    
      <div class="cardInactive"><i class="fa fa-check"></i> Selectionné</div>
    
  <?php } else { ?>
    
      <form method="POST">
        <input type="hidden" value="<?= $res->id ?>" name="themeID">
        <button class="button" name="updateTheme">Choisir</button>
      </form>
    
  <?php } ?>
    </div>
  </div>
    
  <?php } ?>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>