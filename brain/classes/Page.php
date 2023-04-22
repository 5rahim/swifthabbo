<?php

class Page {
  
  public function add($title,$type,$content = NULL, $anchor) {
    
    global $DB;
  
    $DB->Exec('INSERT INTO pages(title,content,anchor,type) VALUES(?,?,?,?)', array($title,$content,$anchor,$type));
    
  }
  
  public function getLastID() {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM pages ORDER BY id desc LIMIT 1', array());
    
    return $req[0]->id;
    
  }
  
  public function update($id, $el, $value) {
    
    global $DB;
    
    $DB->Exec('UPDATE pages SET '. iSecu($el) .' = ? WHERE id = ?', array($value, $id));
    
  }
  
  public function delete($id) {
    
    global $DB;
    
    $DB->Exec('DELETE FROM pages WHERE id = ?', array($id));
    
    $check = $DB->RowCount('SELECT * FROM anchors WHERE page_id = ?', array($id));
    
    if($check > 0) {
      
      $DB->Exec('DELETE FROM anchors WHERE page_id = ?', array($id));
      
    }
    
  }
  
}