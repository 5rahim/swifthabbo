<?php

class Alert {
  
  public function error($msg,$page = NULL) {
    
    $_SESSION['alert']['error'] = $msg;
    if($page !== NULL) {
      
      redirect($page);
      exit();
      
    }
    
  }
  
  public function success($msg,$page = NULL) {
    
    $_SESSION['alert']['success'] = $msg;
    if($page !== NULL) {
      
      redirect($page);
      exit();
      
    }
    
  }
  
}