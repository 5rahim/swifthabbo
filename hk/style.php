<?php

require '../brain/core.php';

$User->restrict();

$User->rankRestrict(8);

$desc = 'Gestion du style';

$SH->swiftUpdateLogo();
$SH->swiftUpdateHeader();
$SH->swiftUpdateBackground();

$page = 8;

require 'includes/header.php';

?>


<div class="content">

    <div class="page pageTwo openModal" data-open-modal="logo">
      <div class="pageTitle">Modifier le logo</div>
    </div>
     
    <div class="page pageTwo openModal" data-open-modal="header">
      <div class="pageTitle">Modifier le header</div>
    </div>
     
    <div class="page pageTwo openModal" data-open-modal="background">
      <div class="pageTitle">Modifier le background</div>
    </div>
      
      
  <div class="modal" id="logo">
    <div class="modalA">
      <div class="modalTitle">Changer le logo
        <div class="modalClose" data-close-modal="logo">×</div>
      </div>
      <div class="modalBody">
        <div class="modalContent">
          <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" class="field two"><br>
            <button class="button" name="updateLogo">Changer</button>               
          </form>
        </div>
      </div>
    </div>
  </div>  
      
  <div class="modal" id="header">
    <div class="modalA">
      <div class="modalTitle">Changer le header
        <div class="modalClose" data-close-modal="header">×</div>
      </div>
      <div class="modalBody">
        <div class="modalContent">
          <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" class="field two"><br>
            <button class="button" name="updateHeader">Changer</button>               
          </form>
        </div>
      </div>
    </div>
  </div>  
      
  <div class="modal" id="background">
    <div class="modalA">
      <div class="modalTitle">Changer le background
        <div class="modalClose" data-close-modal="background">×</div>
      </div>
      <div class="modalBody">
        <div class="modalContent">
          <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" class="field two"><br>
            <button class="button" name="updateBackground">Changer</button>               
          </form>
        </div>
      </div>
    </div>
  </div>


<?php

require 'includes/script.php';

require 'includes/footer.php';

?>