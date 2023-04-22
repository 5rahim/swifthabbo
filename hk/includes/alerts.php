<?php
if (isset($_SESSION['alert']['error'])) { ?>
  <div class="alert alert-error"><i class="fa fa-shield"></i> <?= $_SESSION['alert']['error']; ?></div>
<?php unset($_SESSION['alert']['error']); }
?>

<?php
if (isset($_SESSION['alert']['success'])) { ?>
  <div class="alert alert-success"><i class="fa fa-check"></i> <?= $_SESSION['alert']['success']; ?></div>
<?php unset($_SESSION['alert']['success']); }
?>
