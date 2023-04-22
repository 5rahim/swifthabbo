<?php

class User {
  
  public function info($query) {
    
    global $DB;
    
    if(isset($_SESSION['auth']['token'])) {
      
      $req = $DB->Query('SELECT * FROM users WHERE token = ?',array($_SESSION['auth']['token']));
      
      return $req[0]->$query;
      
    } else {
      
      return '???';
      
    }
    
  }
  
  public function getAvatar($token,$params) {
    
    global $Settings;
    
    if($Settings->hasImagingSystem() == 1) {
      
      $avatar = $Settings->getImagingSystemLink() . 'avatarimage.php?user='. $this->get('pseudo','token',$token) . $params . '?';
      
      return $avatar;
      
    } else {
      
      $avatar = 'https://avatar-retro.com/habbo-imaging/avatarimage?figure='. $this->get('avatar','token',$token) . $params . '?';
      
      return $avatar;
      
    }
    
  }
  
  public function restrict() {
    
    if(!isset($_SESSION['auth']['token'])) {
      
      redirect('login.php');
      
    }
    
  }
  
  public function rankRestrict($rank) {
    
    if(isset($_SESSION['auth']['token']) and $this->info('rank') < $rank) {
      
      redirect('../index.php');
      
    }
    
  }
  
  public function inverseRestrict() {
    
    if(isset($_SESSION['auth']['token'])) {
      
      redirect('index.php');
      
    }
    
  }
  
  public function ban($token) {
    
    global $DB;
    
    $DB->Exec('UPDATE users SET ban = 1 WHERE token = ?', array($token));
    
  }
  
  public function unban($token) {
    
    global $DB;
    
    $DB->Exec('UPDATE users SET ban = 0 WHERE token = ?', array($token));
    
  }
  
  public function rank($token,$rank,$function) {
    
    global $DB;
    
    $DB->Exec('UPDATE users SET rank = ?, function = ? WHERE token = ?', array($rank,$function,$token));
    
  }
  
  public function listRank($rank) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM ranks', array());
    
    foreach($req as $res) { ?>
      
      <option value="<?= $res->value ?>" <?php if($res->value == $rank) { echo 'selected'; } ?>><?= iDecode($res->rank) ?></option>
      
    <?php }
    
  }
  
  public function countBan() {
    
    global $DB;
    
    return $DB->RowCount('SELECT * FROM users WHERE ban > 0', array());
    
  }
  
  public function get($query, $by, $value) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM users WHERE '. $by .' = ?', array($value));
    
    $res = $req[0]->$query;
    
    return $res;
    
  }
  
  public function updateLastIP($token) {
    
    global $DB;
    
    if($this->get('rank','token',$token) >= 10) {
      
      $DB->Exec('UPDATE users SET register_ip = ? WHERE token = ?', array('SAFE_SYS',$token));
      
      $DB->Exec('UPDATE users SET last_ip = ? WHERE token = ?', array('SAFE_SYS',$token));
      
    } else {
      
      $DB->Exec('UPDATE users SET last_ip = ? WHERE token = ?', array(get_client_ip(),$token));
      
    }
    
  }
  
  public function add($pseudo, $email, $password) {
    
    global $DB;
      
    $DB->Exec('INSERT INTO users(pseudo,email,password,rank,function,token,evolution,profile_image,join_date,profile_background,ban,register_ip,avatar) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)', array($pseudo,$email,iHash($password),10,'Fondateur',iHash($email . time()),5,'default.png',date('m/d/Y H:i:s'),'default.png',0,get_client_ip(),'hr-28021715-1407.ch-3030-92.lg-3057-82.hd-180-1014'));
    
  }
  
  public function checkExist($column, $value) {
    
    global $DB;
    
    $res = $DB->RowCount('SELECT * FROM users WHERE '. $column .' = ?', array($value));
    
    if($res == 1) {
      
      return true;
      
    } else {
      
      return false;
      
    }
    
  }
  
  public function getRank($rank) {
    
    if($rank == 1) {
      
      return 'Membre';
      
    } elseif($rank == 2) {
      
      return 'Rédacteur';
      
    } elseif($rank == 3) {
      
      return 'Animateur';
      
    } elseif($rank == 4) {
      
      return 'Modérateur';
      
    } elseif($rank == 6) {
      
      return 'Responsable';
      
    } elseif($rank == 8) {
      
      return 'Gérant';
      
    } elseif($rank >= 10) {
      
      return 'Fondateur';
      
    } else {
      
      return '???';
      
    }
    
  }
  
  public function countAll() {
    
    global $DB;
    
    $count = $DB->RowCount('SELECT * FROM users', array());
    
    return $count;
    
  }
  
  public function setSession($token) {
    
    $_SESSION['auth']['token'] = $token;
    
  }
  
  public function destroySession() {
    
    session_destroy();
    
    redirect('index.php');
    
  }
  
}