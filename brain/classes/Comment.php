<?php

class Comment {
  
  public function add($content,$articleID) {
    
    global $DB;
    global $User;
    
    $DB->Exec('INSERT INTO comments(article_id,author_token,content,added_date) VALUES(?,?,?,?)', array($articleID,$User->info('token'),$content,date('m/d/Y H:i:s')));
    
  }
  
  public function countAll() {
    
    global $DB;
    
    $count = $DB->RowCount('SELECT * FROM comments', array());
    
    return $count;
    
  }
  
  public function update($id, $el, $value) {
    
    global $DB;
    
    $DB->Exec('UPDATE comments SET '. iSecu($el) .' = ? WHERE id = ?', array($value, $id));
    
  }
  
  public function delete($id) {
    
    $DB->Exec('DELETE FROM comments WHERE id = ?', array($id));
    
  }
  
}