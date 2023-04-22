<?php

class Template {
  
  private function path() {
    
    global $Theme;
    
    $path = 'themes/'. strtolower($Theme->get('title')) .'/';
    
    return $path;
    
  }
  
  private function uploadPath() {
    
    global $Theme;
    
    $path = 'themes/'.strtolower($Theme->get('title')).'/global/style/images/';
    
    return $path;
    
  }
  
  private function filter($marker,$value, $tpl) {
    
    $template = str_replace($marker, $value, $tpl);
    
  }
  
  /*public function swiftHeader() {
    
    global $Theme;
    
    $template = file_get_contents('themes/'. strtolower($Theme->get('title')) .'/includes/tpl/header.php');
    
    $logo = $Theme->get('logo');
    $logo = $this->uploadPath() . $logo;
    
    $header = $Theme->get('header');
    $header = 'style="background-image:url('. $this->uploadPath() . $header .')"';
    
    $template = str_replace('{{logo}}', $logo, $template);
    $template = str_replace('{{header}}', $header, $template);
    $template = str_replace('{{menu}}',$this->swiftMenu(),$template);
    
    return $template;
    
  }*/
  
  public function incHeader() {
    
    global $Theme;
    
    $headerInc = $Theme->get('header');
    $header = 'style="background-image:url('. $this->uploadPath() . $headerInc .')"';
    
    return $header;
    
  }
  
  public function incLogo() {
    
    global $Theme;
    
    $reqInc = $Theme->get('logo');
    $req = $this->uploadPath() . $reqInc;
    
    return $req;
    
  }
  
}