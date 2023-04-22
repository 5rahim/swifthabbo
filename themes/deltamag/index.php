<?php

require 'includes/header.php';

?>


<div class="topart">
     
 <?php $topartID = $DB->Query('SELECT * FROM articles ORDER BY id desc LIMIT 1');
 $topartID = $topartID[0]->id;?>

    <div class="topartSectionOne">

      <div class="topartSectionPrimary">

        <?php $topart1Req = $DB->Query('SELECT * FROM articles ORDER BY id desc LIMIT 1');
      foreach($topart1Req as $topart1) {
        ?>
        <a class="topart1" style="background-image:url(./brain/style/img/bank/<?= $topart1->background; ?>)" href="article.php?id=<?= $topart1->id ?>">
          <div class="topart1Caption">
           <div class="topart1Avatar" style="position:absolute;height:220px;width:100px;background:url(http://hbeta.net/habbo-imaging/avatarimage.php?user=<?= $User->get('pseudo','id', $topart1->author_id) ?>&amp;action=std&amp;direction=2&amp;head_direction=2&amp;gesture=sml&amp;size=l);z-index:2;"></div>
            <div class="topart1CaptionInfo">
              <div class="topart1Date">Posté il y a <?= $Date->transform($topart1->added_date); ?></div>
              <div class="topart1Title"><?= $topart1->title; ?></div>
            </div>
          </div>
        </a>
        <?php } ?>

      </div>

      <div class="topartSectionSecondary">

        <?php $topart2Req = $DB->Query('SELECT * FROM articles WHERE id < ? ORDER BY id desc LIMIT 2', array($topartID));
      foreach($topart2Req as $topart2) {
        ?>
        <a class="topart2" style="background-image:url(./brain/style/img/bank/<?= $topart2->background; ?>)" href="article.php?id=<?= $topart2->id ?>">
          <div class="topart2Caption">
            <div class="topart2CaptionInfo">
              <div class="topart2Date">Posté <?= $Date->transform($topart2->added_date); ?></div>
              <div class="topart2Title"><?= $topart2->title; ?></div>
            </div>
          </div>
        </a>
        <?php } ?>

      </div>

    </div>

 </div>


<?php

require 'includes/footer.php';

?>