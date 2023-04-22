<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?= $SH->title() ?> - Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../brain/style/images/icon.png" />
  <link rel="stylesheet" href="../brain/style/css/swift.css?time=<?= time() ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="../brain/js/jquery.min.js"></script>
  <script src="../brain/js/jquery-ui.min.js"></script>
  <script src="../brain/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
	  tinymce.init({
	    selector: 'textarea',
	    theme: 'modern',
	    height: 300,
	    language : "fr_FR",
	    plugins: [
	      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	      'save table contextmenu directionality emoticons template paste textcolor'
	    ],
	    //content_css: 'css/content.css',
	    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
	  });
  </script>
</head>
<body>

<?php //require 'includes/loading.php'; ?>

<?php require 'includes/alerts.php'; ?>


<div class="header">
  <a class="headerLogo" href="index.php">Housekeeping - SwiftHabbo <span class="headerSign"><?= $SH->version() ?></span></a>
  <a href="../index.php" class="headerReturn">Retourner sur <?= $Settings->getTitle() ?></a>
  <div class="headerToggleMenu"><i class="fa fa-ellipsis-v"></i></div>
</div>

<div class="subnav">
  <div class="subnavNav">
    <div class="subnavTitle">général</div>
    <a href="index.php" <?php if($page == 1) { echo 'class="active"'; } ?>'><i class="fa fa-home"></i> Accueil</a>

    <?php if ($User->info('rank') >= 10): ?>
      <a href="settings.php" <?php if($page == 2) { echo 'class="active"'; } ?>'><i class="fa fa-cogs"></i> Paramètres</a>
      <a href="themes.php" <?php if($page == 3) { echo 'class="active"'; } ?>'><i class="fa fa-paint-brush"></i> Thèmes</a>
    <?php endif; ?>
    <a href="articles.php" <?php if($page == 4) { echo 'class="active"'; } ?>'><i class="fa fa-clipboard"></i> Articles</a>
    <a href="drafts.php" <?php if($page == 5) { echo 'class="active"'; } ?>'><i class="fa fa-clipboard"></i> Brouillons</a>
    <?php if ($User->info('rank') >= 4): ?>
      <a href="users.php" <?php if($page == 6) { echo 'class="active"'; } ?>'><i class="fa fa-user"></i> Utilisateurs</a>
    <?php endif; ?>
  </div>
  
  <?php if ($User->info('rank') >= 8): ?>
    <div class="subnavNav">
      <div class="subnavTitle">éléments</div>
      <a href="pages.php" <?php if($page == 7) { echo 'class="active"'; } ?>'><i class="fa fa-file"></i> Pages</a>
      <a href="style.php" <?php if($page == 8) { echo 'class="active"'; } ?>'><i class="fa fa-map-signs"></i> Style</a>
      <a href="menu.php" <?php if($page == 9) { echo 'class="active"'; } ?>'><i class="fa fa-list"></i> Menu</a>
      <a href="widgets.php" <?php if($page == 10) { echo 'class="active"'; } ?>'><i class="fa fa-plus-square"></i> Widgets</a>
    </div>
  <?php endif; ?>
    
  <?php if ($User->info('rank') >= 10): ?>
    <div class="subnavNav">
      <div class="subnavTitle"><?= $Theme->get('title') ?></div>
      <a href="modules.php" <?php if($page == 11) { echo 'class="active"'; } ?>><i class="fa fa-trello"></i> Modules</a>
    </div>
  <?php endif; ?>
</div>


<main>
  
  <div class="wrapper">
    <div class="wrapperCaption"><?= $desc ?></div>
    <div class="wrapperUser" style="background-image: url(<?= $User->getAvatar($User->info('token'),'&size=l&gesture=sml&head_direction=3'); ?>)"></div>
  </div>