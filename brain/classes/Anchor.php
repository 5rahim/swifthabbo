<?php

class Anchor {
  
  private function getLastItemOrder() {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM anchors ORDER BY item_order desc LIMIT 1', array());
    
    $count = $DB->RowCount('SELECT * FROM anchors ORDER BY item_order desc LIMIT 1', array());
    
    if($count == 0) {
      
      return 0;
      
    } else {
      
      return $req[0]->item_order;
      
    }
    
  }
  
  public function add($pageID, $newTab) {
    
    global $DB;
    
    $DB->Exec('INSERT INTO anchors(page_id,item_order,new_tab) VALUES(?,?,?)', array($pageID, ($this->getLastItemOrder() + 1), $newTab));
    
  }
  
  // Update element with value where id = $id
  public function update($id, $el, $value) {
    
    global $DB;
    
    $DB->Exec('UPDATE anchors SET '. iSecu($el) .' = ? WHERE id = ?', array($value, $id));
    
  }
  
  public function getPageName($pageID) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM pages WHERE id = ?', array($pageID));
    
    return $req[0]->title;
    
  }
  
  public function getPageAnchor($pageID) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM pages WHERE id = ?', array($pageID));
    
    return $req[0]->anchor;
    
  }
  
  public function delete($id) {
    
    global $DB;
    
    $DB->Exec('DELETE FROM anchors WHERE id = ?', array($id));
    
  }
  
}