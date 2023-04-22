<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(2);

$desc = 'Gestion des brouillons';

$SH->swiftDeleteDraft();

$page = 5;

require 'includes/header.php';

?>


<div class="content">
  
  <?php 
  
  $perPage = 5;
  $total = $DB->RowCount('SELECT id FROM drafts');
  $pagesTotales = ceil($total/$perPage);
  if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
     $_GET['page'] = intval($_GET['page']);
     $pageCourante = $_GET['page'];
  } else {
     $pageCourante = 1;
  }
  $depart = ($pageCourante-1)*$perPage;
  
  
  $req = $DB->Query('SELECT * FROM drafts ORDER BY id desc LIMIT '.$depart.','.$perPage);
  foreach($req as $res) { ?>
   
   
   
   <div class="tip">
     <div class="tipTitle"><i class="fa fa-clipboard"></i> Enregistré il y a <?= $Date->transform($res->added_date) ?></div>
     <div class="tipOptions">
       <div class="tipDelete rounded openModal" data-open-modal="deleteDraft<?= $res->id ?>"><i class="fa fa-times"></i></div>
       <div class="tipNormal openModal" data-open-modal="seeDraft<?= $res->id ?>"><i class="fa fa-eye"></i></div>
     </div>
   </div>
    
    

    
   <!-- Supprimer le brouillon -->
    
    <div class="modal" id="deleteDraft<?= $res->id ?>">
    <div class="modalA">
      <div class="modalTitle">Voulez-vous supprimer cette sauvegarde ? <div class="modalClose" data-close-modal="deleteDraft<?= $res->id ?>">×</div></div>
      <div class="modalBody">
        <div class="modalContent">

          <form method="POST">
            
            <input type="hidden" name="draftID" value="<?= $res->id ?>">
            
            <br>
            <button class="button" name="deleteDraft">Oui, supprimer</button>

          </form>

        </div>
      </div>
    </div>
  </div> 

    
   <!-- Voir le brouillon -->
    
    <div class="modal" id="seeDraft<?= $res->id ?>">
    <div class="modalA">
      <div class="modalTitle">Visualisation du brouillon <div class="modalClose" data-close-modal="seeDraft<?= $res->id ?>">×</div></div>
      <div class="modalBody">
        <div class="modalContent">

          <?= $res->content ?>

        </div>
      </div>
    </div>
  </div>  
    
    
    
    
    
  <?php } ?>
  
  <?php
    for($i=1;$i<=$pagesTotales;$i++) {
     if($i == $pageCourante) {
        echo '<span class="pagination active">'.$i.'</span>';
     } else {
        echo '<a href="drafts.php?page='.$i.'" class="pagination">'.$i.'</a> ';
     }
    }
  ?>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>