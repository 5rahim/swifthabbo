<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(8);

$desc = 'Gestion des widgets';

$SH->swiftUpdateWidget();
$SH->swiftCreateWidget();
$SH->swiftDeleteWidget();

$page = 10;

require 'includes/header.php';

?>


<div class="content">
 
 <a class="button buttonBig openModal" data-open-modal="addWidget"><i class="fa fa-plus"></i> Ajouter un widget</a>
 <br><br>
 
 <ul id="sortableWidget">
  
  <?php $req = $DB->Query('SELECT * FROM widgets ORDER BY item_order');
  foreach($req as $res) { ?>
    
    <li class="tip" id="<?= $res->id ?>">
       <span><i class="fa fa-reorder"></i></span>
       <div class="tipTitle titleB"><?= $res->title ?></strong></div>
       <div class="tipOptions">
         <div class="tipDelete rounded openModal" data-open-modal="deleteWidget<?= $res->id ?>"><i class="fa fa-times"></i></div>
         <div class="tipNormal openModal" data-open-modal="updateWidget<?= $res->id ?>"><i class="fa fa-edit"></i></div>
       </div>
     </li>
    
    <div class="modal" id="updateWidget<?= $res->id ?>">
      <div class="modalA">
        <div class="modalTitle"><?= iDecode($res->title); ?>
          <div class="modalClose" data-close-modal="updateWidget<?= $res->id ?>">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Titre du widget:</label>
              <input type="text" name="widgetTitle" class="field two" value="<?= iDecode($res->title) ?>">
              <?php if($res->type == 1) { ?>
              <label for="">Contenu du widget:</label>
              <textarea name="widgetContent" id="" cols="30" rows="10" class="field two"><?= iDecode($res->content) ?></textarea>
              <?php } ?><br>
              <input type="hidden" value="<?= $res->id ?>" name="widgetID">
              <input type="hidden" value="<?= $res->type ?>" name="widgetType">
              <button class="button" name="updateWidget">Enregistrer</button>            
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal" id="deleteWidget<?= $res->id ?>">
      <div class="modalA">
        <div class="modalTitle">Voulez-vous supprimer le widget ?
          <div class="modalClose" data-close-modal="deleteWidget<?= $res->id ?>">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <input type="hidden" name="widgetID" value="<?= $res->id ?>">
              <button class="button buttonRed" name="deleteWidget">Oui, supprimer</button>               
            </form>
          </div>
        </div>
      </div>
    </div>
    
  <?php } ?>
  
</ul>
  
  <div class="modal" id="addWidget">
      <div class="modalA">
        <div class="modalTitle">Créer un widget
          <div class="modalClose" data-close-modal="addWidget">×</div>
        </div>
        <div class="modalBody">
          <div class="modalContent">
            <form method="post">
              <label for="">Titre du widget:</label>
              <input type="text" name="widgetTitle" class="field two">
              <label for="">Type du widget:</label>
              <select name="widgetType" id="" class="field two">
                <option value="1">Widget personnalisé</option>
                <option value="2">Widget derniers articles</option>
                <option value="3">Widget derniers commentaires</option>
              </select>
              <label for="">Contenu du widget: (Uniquement si widget personnalisé)</label>
              <textarea name="widgetContent" id="" cols="30" rows="10" class="field two"></textarea><br>
              <button class="button" name="createWidget">Créer</button>            
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