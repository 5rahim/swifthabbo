<?php

/*********************************/
/*********************************
              _  __ _   _           _     _           
             (_)/ _| | | |         | |   | |          
 _____      ___| |_| |_| |__   __ _| |__ | |__   ___  
/ __\ \ /\ / / |  _| __| '_ \ / _` | '_ \| '_ \ / _ \ 
\__ \\ V  V /| | | | |_| | | | (_| | |_) | |_) | (_) |
|___/ \_/\_/ |_|_|  \__|_| |_|\__,_|_.__/|_.__/ \___/ 
                                                      
                                                      
                                                      
/*********************************/
/*********************************/

/**
 *    SwiftHabbo CMS - 2017 - 01/03/17
 *    Content Managing System pour sites de fan Habbo
 *
 *    Codé par Hardway
 *
 */

session_start();
date_default_timezone_set('Europe/Paris');


/*try{
	$param = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	$bdd = new PDO("mysql:host=127.0.0.1;dbname=swifthabbo", "root", "", $param);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
	echo $e->getMessage();
	die();
}*/

require_once 'classes/DatabaseConfig.php';
require_once 'classes/Database.php';

/* Initialisation de la variable $bdd */
$DB = new Database();

function iSecu($var){
	$var = htmlspecialchars(htmlentities(trim($var), ENT_NOQUOTES, "UTF-8"));
	return $var;
}

function iHash($var){
	$var = iSecu(md5(sha1(md5(sha1($var)))));
	return $var;
}

function iDecode($var) {
	$var = html_entity_decode($var);
	return $var;
}

function field($what) {
  $field = iSecu($_POST[$what]);
  return $field;
}

function trigger($what) {
  if (isset($_POST[$what])) {
    return true;
  } else {
    return false;
  }
}

function getField($what) {
  if (!empty($_POST[$what])) {
    return true;
  } else {
    return false;
  }
}

function url($url) {
  if (isset($_GET[$url])) {
    return true;
  } else {
    return false;
  }
}

function urlVal($url) {
  return $_GET[$url];
}

function redirect($where) {
  header('Location: '.$where);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/* Dates */
require_once 'classes/Date.php';
$Date = new Date();

/* Alertes */
require_once 'classes/Alert.php';
$Alert = new Alert();

/* Users */
require_once 'classes/User.php';
$User = new User();

/* Settings */
require_once 'classes/Settings.php';
$Settings = new Settings();

/* Themes */
require_once 'classes/Theme.php';
$Theme = new Theme();

/* Anchors */
require_once 'classes/Anchor.php';
$Anchor = new Anchor();

/* Widgets */
require_once 'classes/Widget.php';
$Widget = new Widget();

/* Articles */
require_once 'classes/Article.php';
$Article = new Article();

/* Comments */
require_once 'classes/Comment.php';
$Comment = new Comment();

/* Pages */
require_once 'classes/Page.php';
$Page = new Page();

/* Templates */
require_once 'classes/Template.php';
$Tpl = new Template();






/* SwiftH */
require_once 'classes/SwiftH.php';
$SH = new SwiftH();

