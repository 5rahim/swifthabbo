<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(8);

$desc = 'Gestion des pages';

$SH->swiftUpdatePage();
$SH->swiftCreatePage();
$SH->swiftDeletePage();

$page = 7;

require 'includes/header.php';

?>


<div class="content">
 
 <div class="info">Pour afficher vos pages, rendez-vous dans la partie "Menu"</div>
 <a class="button buttonBig openModal" data-open-modal="addPage"><i class="fa fa-plus"></i> Ajouter une page</a>
 <br><br>
  
  <?php $req = $DB->Query('SELECT * FROM pages ORDER BY id');
  foreach($req as $res) { ?>
    
    <div>
      <div class="page openModal" data-open-modal="page<?= $res->id ?>">
        <div class="pageTitle"><?= iDecode($res->title) ?></div>
      </div>
    </div>
    
    <div class="modal" id="page<?= $res->id ?>">
      <div class="modalA">
        <div class="modalTitle"><?= iDecode($res->title); ?>
          <div class="modalClose" data-close-modal="page<?= $res->id ?>">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Titre de la page:</label>
              <input type="text" name="pageTitle" class="field two" value="<?= iDecode($res->title) ?>">
              <?php if($res->type == 1) { ?>
              <label for="">Contenu de la page:</label>
              <textarea name="pageContent" id="" cols="30" rows="10" class="field two"><?= iDecode($res->content) ?></textarea>
              <?php } ?><br>
              <input type="hidden" value="<?= $res->id ?>" name="pageID">
              <input type="hidden" value="<?= $res->type ?>" name="pageType">
              <button class="button" name="updatePage">Enregistrer</button>            
            </form>
            <br><br>
            Voulez-vous supprimer la page ?
            <form method="post">
              <input type="hidden" value="<?= $res->id ?>" name="pageID">
               <button class="button buttonRed" name="deletePage">Supprimer la page</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  <?php } ?>
  
  <div class="modal" id="addPage">
      <div class="modalA">
        <div class="modalTitle">Créer une page
          <div class="modalClose" data-close-modal="addPage">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Titre de la page:</label>
              <input type="text" name="pageTitle" class="field two">
              <label for="">Type de la page:</label>
              <select name="pageType" id="" class="field two">
                <option value="1">Page personnalisée</option>
                <option value="2">Page équipe</option>
                <option value="3">Page acceuil</option>
              </select>
              <label for="">Contenu de la page: (Uniquement si page personnalisée)</label>
              <textarea name="pageContent" id="" cols="30" rows="10" class="field two"></textarea><br>
              <button class="button" name="createPage">Créer</button>            
            </form>
          </div>
        </div>
      </div>
    </div>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>