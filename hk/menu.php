<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(8);

$desc = 'Gestion du menu';

$SH->swiftUpdateAnchor();
$SH->swiftCreateAnchor();
$SH->swiftDeleteAnchor();

$page = 9;

require 'includes/header.php';

?>


<div class="content">
 <a class="button buttonBig openModal" data-open-modal="addAnchor"><i class="fa fa-plus"></i> Ajouter un lien</a>
 <br><br>
 
 <ul id="sortableLink">
  
  <?php $req = $DB->Query('SELECT * FROM anchors ORDER BY item_order');
  foreach($req as $res) { ?>
    
    
     
     <li class="tip" id="<?= $res->id ?>">
       <span><i class="fa fa-reorder"></i></span>
       <div class="tipTitle titleB">Lien vers la page: <strong><?= iDecode($Anchor->getPageName($res->page_id)) ?></strong></div>
       <div class="tipOptions">
         <div class="tipDelete rounded openModal" data-open-modal="deleteAnchor<?= $res->id ?>"><i class="fa fa-times"></i></div>
         <div class="tipNormal openModal" data-open-modal="updateAnchor<?= $res->id ?>"><i class="fa fa-edit"></i></div>
       </div>
     </li>
    
    <div class="modal" id="updateAnchor<?= $res->id ?>">
      <div class="modalA">
        <div class="modalTitle">Modifier le lien
          <div class="modalClose" data-close-modal="updateAnchor<?= $res->id ?>">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Page du lien:</label>
              <select name="pageID" id="" class="field two">
                <?= $SH->listPages($res->page_id) ?>
              </select>
              <label for="">Ouvrir le lien dans une nouvelle page</label><br>
              <input type="radio" name="newTab" value="1" <?php if($res->new_tab == 1) { echo 'checked'; } ?>> Non
              <input type="radio" name="newTab" value="2" <?php if($res->new_tab == 2) { echo 'checked'; } ?>> Oui
              <input type="hidden" name="anchorID" value="<?= $res->id ?>">
              <br><br>
              <button class="button" name="updateAnchor">Enregistrer</button>               
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal" id="deleteAnchor<?= $res->id ?>">
      <div class="modalA">
        <div class="modalTitle">Voulez-vous supprimer le lien ?
          <div class="modalClose" data-close-modal="deleteAnchor<?= $res->id ?>">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <input type="hidden" name="anchorID" value="<?= $res->id ?>">
              <button class="button buttonRed" name="deleteAnchor">Oui, supprimer</button>               
            </form>
          </div>
        </div>
      </div>
    </div>
    
  <?php } ?>
  
  </ul>
  
  <div class="modal" id="addAnchor">
      <div class="modalA">
        <div class="modalTitle">Créer un lien
          <div class="modalClose" data-close-modal="addAnchor">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Page du lien:</label>
              <select name="pageID" id="" class="field two">
                <?= $SH->listPages() ?>
              </select>
              <label for="">Ouvrir le lien dans une nouvelle page</label><br>
              <input type="radio" name="newTab" value="1" checked> Non
              <input type="radio" name="newTab" value="2"> Oui
              <br><br>
              <button class="button" name="createAnchor">Créer</button>            
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