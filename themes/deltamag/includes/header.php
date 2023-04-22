<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?= $title ?> - <?= $description ?></title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?= $icon ?>" />
  <link rel="stylesheet" href="<?= $style ?>">
  <link rel="stylesheet" href="<?= $fa ?>">
  <script src="brain/js/jquery.min.js"></script>
  <script src="brain/js/jquery-ui.min.js"></script>
</head>

<body <?= $background ?>>


<div class="header" <?= $Tpl->incHeader() ?>>
 
  <div class="headerDT"></div>
  
  <div class="container" style="height: 100%;">
   
    <div class="headerLogo">
      <a href="index.php"><img src="<?= $Tpl->incLogo() ?>" alt="logo" style="top:20px;"></a>
    </div>

    <div class="player">
      <div class="play"><i class="fa fa-play"></i></div>
      <div class="pause"><i class="fa fa-pause"></i></div>
      <div class="dedi"><i class="fa fa-envelope"></i></div>
    </div>
    
    <div class="liveInfo">
      <marquee behavior="" direction="">Aucune animation prévue...</marquee>
    </div>
    
  </div>
  
  <div class="menu">
    <ul class="menuContent">
      <?php $req = $DB->Query('SELECT * FROM anchors ORDER BY item_order');
      foreach($req as $res) { ?>

      <li><a href="<?= $Anchor->getPageAnchor($res->page_id) ?>"><?= iDecode($Anchor->getPageName($res->page_id)) ?></a></li>

      <?php }?>
    </ul>
  </div>
  
</div>


<div class="container">