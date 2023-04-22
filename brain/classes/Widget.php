<?php

class Widget {
  
  private function getLastItemOrder() {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM widgets ORDER BY item_order desc LIMIT 1', array());
    
    $count = $DB->RowCount('SELECT * FROM widgets ORDER BY item_order desc LIMIT 1', array());
    
    if($count == 0) {
      
      return 0;
      
    } else {
      
      return $req[0]->item_order;
      
    }
    
  }
  
  public function get($id, $query) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM widgets WHERE id = ?', array($id));
    
    $res = $req[0]->$query;
    
    return $res;
    
  }
  
  public function add($type, $title, $content = NULL) {
    
    global $DB;
    
    $DB->Exec('INSERT INTO widgets(title,content,item_order,type) VALUES(?,?,?,?)',array($title,$content,($this->getLastItemOrder() + 1), $type));
    
  }
  
  public function update($id, $el, $value) {
    
    global $DB;
    
    $DB->Exec('UPDATE widgets SET '. iSecu($el) .' = ? WHERE id = ?', array($value, $id));
    
  }
  
  public function delete($id) {
    
    global $DB;
    
    $DB->Exec('DELETE FROM widgets WHERE id = ?', array($id));
    
  }
  
}