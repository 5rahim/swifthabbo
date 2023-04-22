<?php

require '../brain/core.php';

if ($Settings->isInstalled()) {
  die();
}

if(getField('siteTitle')) {
  
  $DB->Exec('INSERT INTO settings(title,description,installed,currentTheme) VALUES(?,?,?,?)', array(field('siteTitle'),field('siteDescription'),1,1));
  
  if(preg_match('`^([a-zA-Z0-9-_]{2,36})$`', field('creatorPseudo'))) {
    
    if(strlen(field('creatorPseudo')) >= 3) {
      
      if(strlen(field('creatorPassword')) >= 6) {
        
        if(field('creatorPassword') == field('creatorPasswordCf')) {
          
          $User->add(field('creatorPseudo'),field('creatorEmail'),field('creatorPassword'));
          
          echo 'finish';
          
        } else {
          
          echo 'passwordCf';
          
        }
        
      } else {
        
        echo 'passwordLength';
        
      }
      
    } else {
      
      echo 'pseudoLength';
      
    }
    
  } else {
    
    echo 'pseudo';
    
  }
  
}