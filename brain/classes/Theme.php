<?php

class Theme {
  
  public function get($query) {
    
    global $Settings;
    global $DB;
    
    $req = $DB->Query('SELECT * FROM themes WHERE id = ?', array($Settings->getCurrentTheme()));
    $res = $req[0]->$query;
    
    return $res;
    
  }
  
  public function select($id) {
    
    global $DB;
    
    $DB->Exec('UPDATE settings SET currentTheme = ? WHERE id = 1', array($id));
    
  }
  
  public function updateElement($el,$value) {
    
    global $DB;
      
    $DB->Exec('UPDATE themes SET '. iSecu($el) .' = ? WHERE id = ?', array($value,$this->get('id')));
    
  }
  
}