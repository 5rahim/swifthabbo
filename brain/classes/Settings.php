<?php

class Settings {
  
  public function getTitle() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return $res[0]->title;
    
  }
  
  public function getDescription() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return iDecode($res[0]->description);
    
  }
  
  public function getCurrentTheme() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return $res[0]->currentTheme;
    
  }
  
  public function hasImagingSystem() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return $res[0]->hasImagingSystem;
    
  }
  
  public function getImagingSystemLink() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return $res[0]->imagingSystemLink;
    
  }
  
  public function installState() {
    
    global $DB;
    $res = $DB->Query('SELECT * FROM settings WHERE id = ?', array(1));
    return $res[0]->installed;
    
  }
  
  
  public function isInstalled() {
    
    global $DB;
    
    $res = $DB->RowCount('SELECT * FROM settings WHERE id = 1', array());
    
    if($res == 1) {
      return true;
    } else {
      return false;
    }
    
  }
  
  public function checkInstallState() {
    
    global $DB;
    
    if(!$this->isInstalled()) {
      redirect('install.php');
      die();
    }
    
  }
  
  public function setTitle($value) {
    
    global $DB;
    
    $DB->Exec('UPDATE settings SET title = ? WHERE id = 1', array($value));
    
  }
  
  public function setSlogan($value) {
    
    global $DB;
    
    $DB->Exec('UPDATE settings SET description = ? WHERE id = 1', array($value));
    
  }
  
  public function setAvatarImagingSystem($radio,$value = NULL) {
    
    global $DB;
    
    if($radio == 1) {
      
      $DB->Exec('UPDATE settings SET hasAvatarImagingSystem = ? AND imagingSystemLink WHERE id = 1', array(1,$value));
      
    } else {
      
      $DB->Exec('UPDATE settings SET hasAvatarImagingSystem = ? WHERE id = 1', array(0));
      
    }
    
  }
  
}