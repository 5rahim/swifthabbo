<?php

class Article {
  
  public function countAll() {
    
    global $DB;
    
    $count = $DB->RowCount('SELECT * FROM articles', array());
    
    return $count;
    
  }
  
  public function countComments($id) {
    
    global $DB;
    
    $count = $DB->RowCount('SELECT * FROM comments WHERE article_id = ?', array($id));
    
    return $count;
    
  }
  
  public function checkArticle($id) {
    
    global $DB;
    
    if($id == NULL || $id == '') {
      
      redirect('index.php');
      
    } else {
      
      $count = $DB->RowCount('SELECT * FROM articles WHERE article_id = ?', array($id));
    
      if($count == 0) {

        redirect('index.php');

      } else {
        
        //
        
      }
      
    }
    
  }
  
  public function add($title,$category,$content,$image) {
    
    global $DB;
    global $Alert;
    global $User;
    
    $draft = $DB->Exec('INSERT INTO drafts(content,added_date) VALUES(?,?)',array($content,date('m/d/Y H:i:s')));
    
    $check = $DB->RowCount('SELECT * FROM categories WHERE id = ?', array($category));
    
    if($check > 0) {
      
      $DB->Exec('INSERT INTO articles(title,category,content,author_token,image,added_date) VALUES(?,?,?,?,?,?)', array($title,$category,$content,$User->info('token'),$image,date('m/d/Y H:i:s')));
      
    } else {
      
      $Alert->error('Erreur au niveau de la catégorie');
      redirect('articles.php');
      
    }
    
  }
  
  public function liveDraft($content) {
    
    $_SESSION['articles']['draft'] = $content;
    
  }
  
  public function displayCurrentDraft() {
    
    if(isset($_SESSION['articles']['draft'])) {
      
      echo $_SESSION['articles']['draft'];
      
    } 
    
  }
  
  public function deleteDraft() {
    
    unset($_SESSION['articles']['draft']);
    
  }
  
  
  public function delete($id) {
    
    global $DB;
    
    $DB->Exec('DELETE FROM articles WHERE id = ?', array($id));
    
  }
  
  public function addCategory($title) {
    
    global $DB;
    
    $DB->Exec('INSERT INTO categories(title) VALUES(?)', array($title));
    
  }
  
  public function getCategoryTitle($id) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM categories WHERE id = ?', array($id));
    
    $res = $req[0]->title;
    
    return $res;
    
  }
  
  public function update($id, $el, $value) {
    
    global $DB;
    
    $DB->Exec('UPDATE articles SET '. iSecu($el) .' = ? WHERE id = ?', array($value, $id));
    
  }
  
}