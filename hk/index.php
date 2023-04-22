<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(2);

$desc = 'Housekeeping - '.$Settings->getTitle();

$page = 1;

require 'includes/header.php';

?>


<div class="content">
  
  <div class="info"><?= $Settings->getTitle() ?> est propulsé par la version <?= $SH->version() ?> de <?= $SH->title() ?></div>
  
  <div class="stats">
    <div class="stat first"><?= $User->countAll() ?> utilisateur(s)</div>
    <div class="stat bans"><?= $User->countBan() ?> utilisateur(s) banni(s)</div>
    <div class="stat comments"><?= $Comment->countAll() ?> commentaire(s)</div>
    <div class="stat articles last"><?= $Article->countAll() ?> article(s)</div>
  </div>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>