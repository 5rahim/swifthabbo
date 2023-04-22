<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(2);

$desc = 'Gestion des articles';

$SH->swiftCreateArticle();
$SH->swiftUpdateArticle();
$SH->swiftDeleteArticle();
$SH->swiftCreateCategory();

$page = 4;

require 'includes/header.php';

?>


<div class="content">
  
  <a class="button buttonBig openModal" data-open-modal="addArticle"><i class="fa fa-plus"></i> Ajouter un article</a>
   <?php if($User->info('rank') >= 6) { ?>
    <a class="button buttonBig openModal" data-open-modal="addCategory"><i class="fa fa-plus"></i> Ajouter une catégorie</a>
  <?php } ?>
   <br><br>
  
  <?php 
  
  $perPage = 10;
  $total = $DB->RowCount('SELECT id FROM articles');
  $pagesTotales = ceil($total/$perPage);
  if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
     $_GET['page'] = intval($_GET['page']);
     $pageCourante = $_GET['page'];
  } else {
     $pageCourante = 1;
  }
  $depart = ($pageCourante-1)*$perPage;
  
  
  $req = $DB->Query('SELECT * FROM articles ORDER BY id desc LIMIT '.$depart.','.$perPage);
  foreach($req as $res) { ?>
    
    <div class="chips">
     
      <div class="chipsComments"><i class="fa fa-comment"></i> <?= $Article->countComments($res->id) ?></div>
      
      <div class="chipsImage" style="background-image: url(../brain/style/images/upload/<?= $res->image ?>)"></div>
      
      <div class="chipsTitle"><?= iDecode($res->title) ?></div>
      
      <div class="chipsMeta">Posté le <?= date('d/m/Y', strtotime($res->added_date)) ?> à <?= date('H:i', strtotime($res->added_date)) ?> par <?= $User->get('pseudo','token',$res->author_token) ?></div>
      
      <a class="button buttonTiny openModal" data-open-modal="updateArticle<?= $res->id ?>">Modifier l'article</a>
      
      <?php if($User->info('rank') >= 4) { ?>
        <a class="button buttonTiny buttonRed openModal" data-open-modal="deleteArticle<?= $res->id ?>">Supprimer l'article</a>
      <?php } ?>
      
    </div>
    
    
    <!-- Editer l'article -->
    
    <div class="modal" id="updateArticle<?= $res->id ?>">
    <div class="modalA">
      <div class="modalTitle">Modifier l'article <div class="modalClose" data-close-modal="updateArticle<?= $res->id ?>">×</div></div>
      <div class="modalBody">
        <div class="modalContent">

          <form method="POST" enctype="multipart/form-data">

            <label for="">Titre de l'article</label>
            <input type="text" name="articleTitle" class="field two" value="<?= iDecode($res->title) ?>">

            <label for="">Image de l'article: (laisser vide, si vous ne voulez pas modifier)</label>
            <input type="file" name="articleImage" class="field two">

            <label for="">Catégorie de l'article</label>
            <select name="articleCategory" id="" class="field two">

              <?= $SH->listCategories($res->category) ?>
              
            </select>

            <label for="">Contenu</label>
            <textarea name="articleContent" id="" cols="30" rows="10"><?= $res->content ?></textarea>
            
            <input type="hidden" name="articleID" value="<?= $res->id ?>">
            
            <br>
            <button class="button" name="updateArticle">Modifier</button>

          </form>

        </div>
      </div>
    </div>
  </div>

    
   <!-- Supprimer l'article -->
    
    <div class="modal" id="deleteArticle<?= $res->id ?>">
    <div class="modalA">
      <div class="modalTitle">Voulez-vous supprimer l'article ? <div class="modalClose" data-close-modal="deleteArticle<?= $res->id ?>">×</div></div>
      <div class="modalBody">
        <div class="modalContent">

          <form method="POST">
            
            <input type="hidden" name="articleID" value="<?= $res->id ?>">
            
            <br>
            <button class="button" name="deleteArticle">Oui, supprimer</button>

          </form>

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
        echo '<a href="articles.php?page='.$i.'" class="pagination">'.$i.'</a> ';
     }
    }
  ?>
  
</div>

<!-- Add article -->

<div class="modal" id="addArticle">
  <div class="modalA">
    <div class="modalTitle">Ajouter un article <div class="modalClose" data-close-modal="addArticle">×</div></div>
    <div class="modalBody">
      <div class="modalContent">
       
        <form method="POST" enctype="multipart/form-data">
         
          <label for="">Titre de l'article</label>
          <input type="text" name="articleTitle" class="field two">
          
          <label for="">Image de l'article:</label>
          <input type="file" name="articleImage" class="field two">
          
          <label for="">Catégorie de l'article</label>
          <select name="articleCategory" id="" class="field two">
           
            <?= $SH->listCategories() ?>
          </select>
          
          <label for="">Contenu</label>
          <textarea name="articleContent" id="" cols="30" rows="10"><?= $Article->displayCurrentDraft() ?></textarea>
          <br>
          <button class="button" name="createArticle">Envoyer</button>
          
        </form>
        
      </div>
    </div>
  </div>
</div>

<?php
  
  if($User->info('rank') >= 6) { ?>
    
    <!-- Add category -->

    <div class="modal" id="addCategory">
      <div class="modalA">
        <div class="modalTitle">Ajouter une catégorie <div class="modalClose" data-close-modal="addCategory">×</div></div>
        <div class="modalBody">
          <div class="modalContent">

            <form method="POST">

              <label for="">Titre de la catégorie</label>
              <input type="text" name="categoryTitle" class="field two">
              <br>
              <button class="button" name="createCategory">Envoyer</button>

            </form>

          </div>
        </div>
      </div>
    </div>
    
  <?php }
  
?>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>