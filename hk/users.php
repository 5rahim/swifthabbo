<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(4);

$desc = 'Gestion des utilisateurs';

$SH->swiftDeleteDraft();
$SH->swiftBanUser();
$SH->swiftUnbanUser();
$SH->swiftRankUser();

$page = 6;

require 'includes/header.php';

?>


<div class="content">
 
 <h1 class="contentTitle">Les derniers utilisateurs:</h1>
  
  <div style="overflow: hidden;margin-bottom: 40px;">
    
    <?php 
  
    $req = $DB->Query('SELECT * FROM users ORDER BY id desc LIMIT 9');
    foreach($req as $res) {

      $pseudo = $User->get('pseudo','token',$res->token);
      $avatar = $User->getAvatar($res->token,'&size=a&gesture=sml&head_direction=3');

    ?>



     <div class="pill">
        <div class="pillAvatar" style="background-image: url(<?= $avatar ?>)"></div>
       <div class="pillBottom"><?= $pseudo ?></div>
     </div>

    
    

    <?php } ?>
    
  </div>
  
  <h1 class="contentTitle">Rechercher un utilisateur:</h1>
  
  <form action="?search" method="POST">
    <div class="searchArea">
      <span class="searchIcon"><i class="fa fa-search"></i></span>
      <input type="text" name="userPseudo" class="fieldSearch">
    </div>
  </form>
  
  <?php if(url('search')) {
  
  if(trigger('userPseudo')) {
    
    if(!empty(field('userPseudo'))) {
    
      $pseudo = field('userPseudo');

      $req = $DB->Query("SELECT * FROM users WHERE pseudo LIKE '{$_POST['userPseudo']}%' ",array());

      foreach($req as $res) { 
  
        $pseudo = $User->get('pseudo','token',$res->token);
        $avatar = $User->getAvatar($res->token,'&size=a&gesture=sml&head_direction=3');
        $ban = $User->get('ban','token',$res->token);
        $rank = $User->get('rank','token',$res->token);
        $function = $User->get('function','token',$res->token);
  
      ?>

        <div class="pill openModal" data-open-modal="user<?= $res->id ?>">
          <div class="pillAvatar" style="background-image: url(<?= $avatar ?>)"></div>
         <div class="pillBottom"><?= $pseudo ?></div>
       </div>
       
       
       
       
       <!-- User -->

      <div class="modal" id="user<?= $res->id ?>">
        <div class="modalA">
          <div class="modalTitle">Utilisateur: <?= $pseudo ?> <div class="modalClose" data-close-modal="user<?= $res->id ?>">×</div></div>
          <div class="modalBody">
            <div class="modalContent">

              <div class="pillBigCircle">
                <div class="pillBigAvatar" style="background-image: url(<?= $User->getAvatar($res->token,'&size=l&gesture=sml&head_direction=3') ?>)"></div>
              </div>
              
              
              <?php if($ban < 1): ?>
                <button class="button buttonRed buttonBig openModal closeModal" data-close-modal="user<?= $res->id ?>" data-open-modal="ban<?= $res->id ?>"><i class="fa fa-user-times"></i> Bannir</button>
              <?php endif; ?>
              
              <?php if($ban > 0): ?>
                <button class="button buttonRed buttonBig openModal closeModal" data-close-modal="user<?= $res->id ?>" data-open-modal="unban<?= $res->id ?>"><i class="fa fa-user-times"></i> Débannir</button>
              <?php endif; ?>
              
              <br><br>
              
              <?php if($User->info('rank') >= 8): ?>
                <button class="button buttonBig openModal closeModal" data-close-modal="user<?= $res->id ?>" data-open-modal="rank<?= $res->id ?>"><i class="fa fa-user-plus"></i> Grader</button>
              <?php endif; ?>
              
              <br><br>
              Cet utilisateur à le rank <strong><?= iDecode($User->getRank($rank)) ?></strong> et est <strong><?= iDecode($function) ?></strong><br>
              <?php if($ban > 0): ?>
                <div style="color:red"><i class="fa fa-times"></i> Cet utilisateur est banni</div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Ban -->

      <div class="modal" id="ban<?= $res->id ?>">
        <div class="modalA">
          <div class="modalTitle">Voulez vous bannir: <?= $pseudo ?> <div class="modalClose openModal" data-open-modal="user<?= $res->id ?>" data-close-modal="ban<?= $res->id ?>">×</div></div>
          <div class="modalBody">
            <div class="modalContent">

              <form method="post">
                <button class="button" name="banUser">Oui, bannir</button>
                <input type="hidden" name="userToken" value="<?= $res->token ?>">
              </form>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Unban -->

      <div class="modal" id="unban<?= $res->id ?>">
        <div class="modalA">
          <div class="modalTitle">Voulez vous bannir: <?= $pseudo ?> <div class="modalClose openModal" data-open-modal="user<?= $res->id ?>" data-close-modal="unban<?= $res->id ?>">×</div></div>
          <div class="modalBody">
            <div class="modalContent">

              <form method="post">
                <button class="button" name="unbanUser">Débannir</button>
                <input type="hidden" name="userToken" value="<?= $res->token ?>">
              </form>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Unban -->

      <div class="modal" id="rank<?= $res->id ?>">
        <div class="modalA">
          <div class="modalTitle">Rank: <?= $pseudo ?> <div class="modalClose openModal" data-open-modal="user<?= $res->id ?>" data-close-modal="rank<?= $res->id ?>">×</div></div>
          <div class="modalBody">
            <div class="modalContent">

              <form method="post">
               <label for="">Grade</label>
                <select name="userRank" class="field two" id="">
                  <?= $User->listRank($res->rank) ?>
                </select>
                <label for="">Fonction</label>
                 <input type="text" name="userFunction" class="field two" value="<?= iDecode($res->function) ?>">
                 <br><br>
                 <input type="hidden" name="userToken" value="<?= $res->token ?>">
                <button class="button" name="rankUser">Débannir</button>
              </form>

            </div>
          </div>
        </div>
      </div>
       
       
       

     <?php }

    }
    
  }
  
  } ?>
  
</div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>