<?php

class SwiftH {
  
  private $title = 'SwiftHabbo';
  private $version = 'ALPHA';
  
  
  public function display($page) {
    
    
    global $DB;
    global $Settings;
    global $Widget;
    global $Anchor;
    global $Theme;
    global $User;
    global $Date;
    global $Article;
    global $Comment;
    global $Page;
    global $Tpl;
    //global $this;
    
    $theme = strtolower($Theme->get('title'));
    
    $title = $Settings->getTitle();
    
    $description = $Settings->getDescription();
    
    $style = 'themes/'. $theme .'/global/style/css/'. $theme .'.css?time='. time() .'';
    
    $icon = 'brain/style/images/icon.png';
    
    $background = 'style="background-image:url(themes/'. $theme .'/global/style/images/'. $Theme->get('background').')"';
    
    $fa = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css';
    
    require 'themes/'.strtolower($Theme->get('title')).'/'.strtolower($page).'.php';
    
    
  }
  
  public function title() {
    
    return $this->title;
    
  }
  
  public function version() {
    
    return $this->version;
    
  }
  
  /* Basics functions */
  
  public function defaultAvatarImagingRadio($value) {
    
    global $Settings;
    
    if($Settings->hasImagingSystem() == $value) {
      
      echo 'checked';
      
    } else {
      
      //
      
    }
    
  }
  
  public function listCategories($default = NULL) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM categories ORDER BY id');
    
    foreach($req as $res) { ?>
      
      <option value="<?= $res->id ?>" <?php if($res->id == $default) { echo 'selected'; } ?>><?= iDecode($res->title) ?></option>
      
    <?php }
    
  }
  
  public function listPages($default = NULL) {
    
    global $DB;
    
    $req = $DB->Query('SELECT * FROM pages ORDER BY id');
    
    foreach($req as $res) { ?>
      
      <option value="<?= $res->id ?>" <?php if($res->id == $default) { echo 'selected'; } ?>><?= iDecode($res->title) ?></option>
      
    <?php }
    
  }
  
  /* Forms functions */
  
  public function swiftLogin($page) {
    
    global $Alert;
    global $User;
    global $DB;
    
    if(trigger('login')) {
      
      $pseudo = field('loginPseudo');
      $password = iHash(field('loginPassword'));
      
      if(!empty($pseudo) && !empty($password)) {
        
        if($User->checkExist('pseudo',$pseudo)) {
        
          $check = $DB->RowCount('SELECT * FROM users WHERE pseudo = ? AND password = ?', array($pseudo,$password));
          
          if ($check > 0) {
            
            $ban = $DB->Query('SELECT * FROM users WHERE pseudo = ?', array($pseudo));
            $ban = $ban[0]->ban;

            if($ban < 1) {
              
              $userToken = $User->get('token','pseudo',$pseudo);
              $User->setSession($userToken);
              $User->updateLastIP($userToken);
              redirect('index.php');
              
            } else {
              
              $Alert->error('Cet utilisateur est banni','index.php');
              
            }
            

          } else {

            $Alert->error('Mot de passe incorrect');

          }

        } else {

          $Alert->error('Cet utilisateur n\'existe pas');

        }
        
      } else {
        
        $Alert->error('Veuillez remplir tous les champs');
        
      }
      
    }
    
  }
  
  public function swiftUpdateAIS() {
    
    global $User;
    global $DB;
    global $Alert;
    
    if(trigger('avatarImaging')) {
      
      $hasImagingSystem = field('hasImagingSystem');
      $imagingSystemLink = field('imagingSystemLink');
      
      if($User->info('rank') >= 10) {
        
        if($hasImagingSystem == 1 || $hasImagingSystem == 0) {
          
          if($hasImagingSystem == 1 && !empty($imagingSystemLink)) {
            
            $DB->Exec('UPDATE settings SET hasImagingSystem = 1, imagingSystemLink = ? WHERE id = 1', array($imagingSystemLink));
            $Alert->success('Action effectuée','settings.php');
            
          } elseif($hasImagingSystem == 0 && !empty($imagingSystemLink)) {
            
            $DB->Exec('UPDATE settings SET hasImagingSystem = 0 WHERE id = 1', array());
            $Alert->success('Action effectuée','settings.php');
            
          } else {
            
            $Alert->error('Veuillez completer tous les champs','settings.php');
            
          }
          
        } else {
          
          $Alert->error('Le formulaire n\'est plus valide','settings.php');
          
        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','settings.php');
        
      }
      
    }
    
  }
  
  public function swiftUpdateDescription() {
    
    global $DB;
    global $Settings;
    global $Alert;
    
    if(trigger('updateDescription')) {
      
      $description = field('siteDescription');
      
      if($description !== NULL) {
        
        if(strlen($description) >= 8) {
          
          $Settings->setSlogan($description);
          $Alert->success('Description mise à jour','settings.php');
          
        } else {
          
          $Alert->error('Description trop courte','settings.php');
          
        }
        
      } else {
        
        $Alert->error('Veuillez completer tous les champs','settings.php');
        
      }
      
    }
    
  }
  
  public function swiftUpdateTitle() {
    
    global $DB;
    global $Settings;
    global $Alert;
    
    if(trigger('updateTitle')) {
      
      $title = field('siteTitle');
      
      if($title !== NULL) {
        
        if(strlen($title) >= 8) {
          
          $Settings->settitle($title);
          $Alert->success('Nom du site mis à jour','settings.php');
          
        } else {
          
          $Alert->error('Titre trop court','settings.php');
          
        }
        
      } else {
        
        $Alert->error('Veuillez completer tous les champs','settings.php');
        
      }
      
    }
    
  }
  
  public function swiftUpdateTheme() {
    
    global $DB;
    global $Theme;
    global $Alert;
    global $User;
    
    if(trigger('updateTheme')) {
      
      if($User->info('rank') >= 10) {
        
        $themeID = field('themeID');
    
        $check = $DB->RowCount('SELECT * FROM themes WHERE id = ?', array($themeID));

        if($check > 0) {

          $Theme->select($themeID);

          $Alert->success('Thème mis à jour','themes.php');

        } else {

          $Alert->error('Thème non valide','themes.php');

        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','themes.php');
        
      }
      
    }
    
  }
  
  public function swiftCreateArticle() {
    
    global $DB;
    global $Alert;
    global $User;
    global $Article;
    
    if(trigger('createArticle')) {
      
      if($User->info('rank') >= 2) {
        
        $title = field('articleTitle');
        $image = $_FILES['articleImage'];
        $category = field('articleCategory');
        $content = $_POST['articleContent'];

        if(!empty($content)) {

          $Article->liveDraft($content);

        }

        if(!empty($image)) {

          $imageNameB = iHash(iSecu($_FILES['articleImage']['name']) . time());
          $path = $_FILES['articleImage']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          $imageName = $imageNameB . '.' . $ext;
          $imageTmp = iSecu($_FILES['articleImage']['tmp_name']);
          $imageSize = iSecu($_FILES['articleImage']['size']);
          $dir = "../brain/style/images/upload/";
          $maxsize = 99999999999999999999999999; // Taille en bytes (octets)
          if($_FILES['articleImage']['size'] > $maxsize){

            $Alert->error('L\'image est trop lourde','articles.php');

          } else {
             if(($_FILES['articleImage']['type'] == 'image/gif') || ($_FILES['articleImage']['type'] == 'image/jpeg') || ($_FILES['articleImage']['type'] == 'image/png') || ($_FILES['articleImage']['type'] == 'image/jpg')) {

              if(move_uploaded_file($imageTmp,$dir .$imageName)){
                #...
               } else {

                 $Alert->error('Une erreur est survenue','articles.php');

               }
             } else {

               $Alert->error('Format interdit','articles.php');

             }

          }

        }

        if(!empty($title) && !empty($image) && !empty($category) && !empty($content)) {

          if(strlen($title) > 8) {

            if(strlen($content) > 20) {

              $Article->add($title,$category,$content,$imageName);

              $Alert->error('Article posté','articles.php');

              $Article->deleteDraft();

            } else {

              $Alert->error('Contenu trop court','articles.php');

            }

          } else {

            $Alert->error('Titre trop court','articles.php');

          }

        } else {

          $Alert->error('Veuillez remplir tous les champs','articles.php');

        }
        
      }
      
      
      
    }
    
  }
  
  public function swiftUpdateArticle() {
    
    global $DB;
    global $Alert;
    global $User;
    global $Article;
    
    if(trigger('updateArticle')) {
      
      if($User->info('rank') >= 2) {
        
        $title = field('articleTitle');
        $image = $_FILES['articleImage'];
        $category = field('articleCategory');
        $content = $_POST['articleContent'];
        $id = field('articleID');
        
        $updateError = false;

        if(!empty($content)) {

          $Article->liveDraft($content);

          if(strlen($content) > 20) {

            $Article->update($id,'content',$content);
            
            $Article->deleteDraft();

          } else {
            
            $Alert->error('Contenu trop court','articles.php');
            
            $updateError = true;
            
          }

        }

        if($image['error'] == 0) {

          $imageNameB = iHash(iSecu($_FILES['articleImage']['name']) . time());
          $path = $_FILES['articleImage']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          $imageName = $imageNameB . '.' . $ext;
          $imageTmp = iSecu($_FILES['articleImage']['tmp_name']);
          $imageSize = iSecu($_FILES['articleImage']['size']);
          $dir = "../brain/style/images/upload/";
          $maxsize = 99999999999999999999999999; // Taille en bytes (octets)
          if($_FILES['articleImage']['size'] > $maxsize){

            $Alert->error('L\'image est trop lourde','articles.php');

          } else {
             if(($_FILES['articleImage']['type'] == 'image/gif') || ($_FILES['articleImage']['type'] == 'image/jpeg') || ($_FILES['articleImage']['type'] == 'image/png') || ($_FILES['articleImage']['type'] == 'image/jpg')) {

              if(move_uploaded_file($imageTmp,$dir .$imageName)){
                
                $Article->update($id,'image',$imageName);
                
               } else {

                 $Alert->error('Une erreur est survenue','articles.php');

               }
             } else {

               $Alert->error('Format interdit','articles.php');

             }

          }

        }
        
        if(!empty($category)) {
          
          $Article->update($id,'category',$category);
          
        }

        if(!empty($title)) {

          if(strlen($title) > 8) {

            $Article->update($id,'title',$title);

          } else {

            $Alert->error('Titre trop court','articles.php');
            
            $updateError = true;

          }

        } else {

          $Alert->error('Veuillez renseigner un titre','articles.php');
          
          $updateError = true;

        }
        
        if($updateError == false) {
          
          $Alert->success('Article modifié','articles.php');
          
        }
        
      }
      
      
      
    }
    
  }
  
  public function swiftDeleteArticle() {
    
    global $Article;
    global $Alert;
    global $User;
    
    if(trigger('deleteArticle')) {
      
      if($User->info('rank') >= 4) {
        
        $articleID = field('articleID');

        $Article->delete($articleID);
        $Alert->success('Article supprimé','articles.php');
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','articles.php');
        
      }
      
    }
    
  }
  
  public function swiftCreateCategory() {
    
    global $DB;
    global $Article;
    global $Alert;
    global $User;
    
    if(trigger('createCategory')) {
      
      if($User->info('rank') >= 6) {
        
        $title = field('categoryTitle');

        var_dump(strlen($title));

        if(strlen($title) > 3 && strlen($title) < 30) {

          $check = $DB->RowCount('SELECT * FROM categories WHERE title = ?', array($title));

          if($check < 1) {

            $Article->addCategory($title);

            $Alert->success('Catégorie ajoutée','articles.php');

          } else {

            $Alert->error('Cette catégorie existe déjà','articles.php');

          }

        } else {

          $Alert->error('Nombre de caractères invalide','articles.php');

        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','articles.php');
        
      }
      
    }
    
  }
  
  public function swiftDeleteDraft() {
    
    global $DB;
    global $Alert;
    
    if(trigger('deleteDraft')) {
      
      $id = field('draftID');
      
      $check = $DB->RowCount('SELECT * FROM drafts WHERE id = ?',array($id));
      
      if($check > 0) {
        
        $DB->Exec('DELETE FROM drafts WHERE id = ?',array($id));
        
        $Alert->success('Brouillon supprimé','drafts.php');
        
      } else {
        
        $Alert->error('Erreur','drafts.php');
        
      }
      
    }
    
  }
  
  public function swiftBanUser() {
    
    global $DB;
    global $Alert;
    global $User;
    
    if(trigger('banUser')) {
      
      $token = field('userToken');
      
      if($User->info('rank') >= 4) {
        
        if($User->checkExist('token',$token)) {
          
          if($User->get('rank','token',$token) < 10) {
          
            $User->ban($token);

            $Alert->success('Cet utilisateur a été banni');

          } else {

            $Alert->error('Vous ne pouvez pas bannir cet utilisateur','users.php');

          }
          
        } else {
          
          $Alert->error('Cet utilisateur n\'existe pas','users.php');
          
        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','users.php');
        
      }
      
    }
    
  }
  
  public function swiftUnbanUser() {
    
    global $DB;
    global $Alert;
    global $User;
    
    if(trigger('unbanUser')) {
      
      $token = field('userToken');
      
      if($User->info('rank') >= 4) {
        
        if($User->checkExist('token',$token)) {
          
          if($User->get('rank','token',$token) < 10) {
          
            $User->unban($token);

            $Alert->success('Cet utilisateur a été débanni');

          } else {

            $Alert->error('Vous ne pouvez pas bannir cet utilisateur','users.php');

          }
          
        } else {
          
          $Alert->error('Cet utilisateur n\'existe pas','users.php');
          
        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','users.php');
        
      }
      
    }
    
  }
  
  public function swiftRankUser() {
    
    global $DB;
    global $Alert;
    global $User;
    
    if(trigger('rankUser')) {
      
      $token = field('userToken');
      $rank = field('userRank');
      $function = field('userFunction');
      
      if($User->info('rank') >= 8) {
        
        if($User->checkExist('token',$token)) {
          
          if($User->get('rank','token',$token) < 11) {
          
            $User->rank($token,$rank,$function);

            $Alert->success('Cet utilisateur a été gradé');

          } else {

            $Alert->error('Vous ne pouvez pas altérer le rank de cet utilisateur','users.php');

          }
          
        } else {
          
          $Alert->error('Cet utilisateur n\'existe pas','users.php');
          
        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','users.php');
        
      }
      
    }
    
  }
  
  public function swiftCreatePage() {
    
    global $DB;
    global $Alert;
    global $Page;
    global $User;
    
    if(trigger('createPage')) {
      
      $type = field('pageType');
      $title = field('pageTitle');
      
      if($type == 1) {
        
        $content = field('pageContent');
        
        if($User->info('rank') >= 8) {
          
          if(!empty($title)) {
            
            if(!empty($content)) {
              
              $anchor = 'page.php?id=' . ($Page->getLastID() + 1);
              
              $Page->add($title,1,$content,$anchor);
              
              $Alert->success('Page crée','pages.php');
              
            } else {
              
              $Alert->error('Veuillez mettre du contenu dans votre page','pages.php');
              
            }
            
          } else {
            
            $Alert->error('Veuillez remplir le titre','pages.php');
            
          }
          
        } else {
          
          $Alert->error('Vous n\'avez pas le rank requis','pages.php');
          
        }
        
      } elseif($type == 2) {
        
        if(!empty($title)) {
          
          $anchor = 'staff.php';
          
          $Page->add($title,2,NULL,$anchor);
              
          $Alert->success('Page crée','pages.php');
          
        } else {
          
          $Alert->error('Veuillez remplir le titre','pages.php');
          
        }
        
      } elseif($type == 3) {
        
        if(!empty($title)) {
          
          $anchor = 'index.php';
          
          $Page->add($title,3,NULL,$anchor);
              
          $Alert->success('Page crée','pages.php');
          
        } else {
          
          $Alert->error('Veuillez remplir le titre','pages.php');
          
        }
        
      }
      
    }
    
  }
  
  public function swiftUpdatePage() {
    
    global $DB;
    global $Alert;
    global $Page;
    global $User;
    
    if(trigger('updatePage')) {
      
      $id = field('pageID');
      $type = field('pageType');
      $title = field('pageTitle');
      
      if($type == 1) {
        
        $content = field('pageContent');
        
        if($User->info('rank') >= 8) {
          
          if(!empty($title)) {
            
            if(!empty($content)) {
              
              $Page->update($id,'title',$title);
              $Page->update($id,'content',$content);
              
              $Alert->success('Page mise à jour','pages.php');
              
            } else {
              
              $Alert->error('Veuillez mettre du contenu dans votre page','pages.php');
              
            }
            
          } else {
            
            $Alert->error('Veuillez remplir le titre','pages.php');
            
          }
          
        } else {
          
          $Alert->error('Vous n\'avez pas le rank requis','pages.php');
          
        }
        
      } elseif($type >= 2) {
        
        if(!empty($title)) {
          
          $Page->update($id,'title',$title);
              
          $Alert->success('Page mise à jour','pages.php');
          
        } else {
          
          $Alert->error('Veuillez remplir le titre','pages.php');
          
        }
        
      }
      
    }
    
  }
  
  public function swiftDeletePage() {
    
    global $DB;
    global $Alert;
    global $Page;
    
    if(trigger('deletePage')) {
      
      $id = field('pageID');
      
      $Page->delete($id);
      
      $Alert->success('Page supprimée','pages.php');
      
    }
    
  }
  
  public function swiftCreateAnchor() {
    
    global $DB;
    global $Alert;
    global $Anchor;
    global $User;
    
    if(trigger('createAnchor')) {
      
      $newTab = field('newTab');
      $pageID = field('pageID');
      
      if($User->info('rank') >= 8) {
        
        if(!empty($pageID)) {
        
          if($newTab == 1 || $newTab == 2) {

            $Anchor->add($pageID,$newTab);
            $Alert->success('Lien ajouté','menu.php');

          } else {

            $Alert->error('Erreur','menu.php');

          }

        } else {

          $Alert->error('Erreur','menu.php');

        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','menu.php');
        
      }
      
    }
    
  }
  
  public function swiftUpdateAnchor() {
    
    global $DB;
    global $Alert;
    global $Anchor;
    global $User;
    
    if(trigger('updateAnchor')) {
      
      $newTab = field('newTab');
      $pageID = field('pageID');
      $id = field('anchorID');
      
      if($User->info('rank') >= 8) {
        
        if(!empty($id)) {
        
          if($newTab == 1 || $newTab == 2) {

            $Anchor->update($id,'page_id',$pageID);
            $Anchor->update($id,'new_tab',$newTab);
            
            $Alert->success('Lien modifié','menu.php');

          } else {

            $Alert->error('Erreur','menu.php');

          }

        } else {

          $Alert->error('Erreur','menu.php');

        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','menu.php');
        
      }
      
    }
    
  }
  
  public function swiftDeleteAnchor() {
    
    global $DB;
    global $Alert;
    global $Anchor;
    global $User;
    
    if(trigger('deleteAnchor')) {
      
      $id = field('anchorID');
      
      if($User->info('rank') >= 8) {
        
        if(!empty($id)) {

            $Anchor->delete($id);
            
            $Alert->success('Lien supprimé','menu.php');

        } else {

          $Alert->error('Erreur','menu.php');

        }
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','menu.php');
        
      }
      
    }
    
  }
  
  public function swiftCreateWidget() {
    
    global $DB;
    global $Alert;
    global $Widget;
    global $User;
    
    if(trigger('createWidget')) {
      
      $type = field('widgetType');
      $title = field('widgetTitle');
      
      if($User->info('rank') >= 8) {
      
        if($type == 1) {

          $content = field('widgetContent');

            if(!empty($title)) {

              if(!empty($content)) {

                $Widget->add(1,$title,$content);

                $Alert->success('Widget créé','widgets.php');

              } else {

                $Alert->error('Veuillez mettre du contenu dans votre widget','widgets.php');

              }

            } else {

              $Alert->error('Veuillez remplir le titre','widgets.php');

            }
          
        } elseif($type == 2) {

          if(!empty($title)) {

            $Widget->add(2,$title);

            $Alert->success('Widget créé','widgets.php');

          } else {

            $Alert->error('Veuillez remplir le titre','widgets.php');

          }

        } elseif($type == 3) {

          if(!empty($title)) {

            $anchor = 'index.php';

            $Widget->add(3,$title);

            $Alert->success('Widget créé','widgets.php');

          } else {

            $Alert->error('Veuillez remplir le titre','widgets.php');

          }

        }

      } else {

        $Alert->error('Vous n\'avez pas le rank requis','widgets.php');

      }
      
    }
    
  }
  
  public function swiftUpdateWidget() {
    
    global $DB;
    global $Alert;
    global $Widget;
    global $User;
    
    if(trigger('updateWidget')) {
      
      $id = field('widgetID');
      $type = field('widgetType');
      $title = field('widgetTitle');
      
      if($User->info('rank') >= 8) {
      
        if($type == 1) {

          $content = field('widgetContent');

            if(!empty($title)) {

              if(!empty($content)) {

                $Widget->update($id,'title',$title);
                $Widget->update($id,'content',$content);

                $Alert->success('Page mise à jour','widgets.php');

              } else {

                $Alert->error('Veuillez mettre du contenu dans votre widget','widgets.php');

              }

            } else {

              $Alert->error('Veuillez remplir le titre','widgets.php');

            }

        } elseif($type >= 2) {

          if(!empty($title)) {

            $Widget->update($id,'title',$title);

            $Alert->success('Widget mis à jour','widgets.php');

          } else {

            $Alert->error('Veuillez remplir le titre','widgets.php');

          }

        }

      } else {

        $Alert->error('Vous n\'avez pas le rank requis','widgets.php');

      }
      
    }
    
  }
  
  public function swiftDeleteWidget() {
    
    global $DB;
    global $Alert;
    global $Widget;
    global $User;
    
    if(trigger('deleteWidget')) {
      
      if($User->info('rank') >= 8) {
        
        $id = field('widgetID');

        $Widget->delete($id);

        $Alert->success('Widget supprimé','widgets.php');
        
      } else {
        
        $Alert->error('Vous n\'avez pas le rank requis','widgets.php');
        
      }
      
    }
    
  }
  
  public function swiftUpdateLogo() {
    
    global $DB;
    global $Alert;
    global $User;
    global $Theme;
    
    if(trigger('updateLogo')) {
      
      if($User->info('rank') >= 8) {
        
        $image = $_FILES['image'];

        if(!empty($image)) {

          $imageNameB = iHash(iSecu($_FILES['image']['name']) . time());
          $path = $_FILES['image']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          $imageName = $imageNameB . '.' . $ext;
          $imageTmp = iSecu($_FILES['image']['tmp_name']);
          $imageSize = iSecu($_FILES['image']['size']);
          $dir = '../themes/'.strtolower($Theme->get('title')).'/global/style/images/';
          $maxsize = 99999999999999999999999999; // Taille en bytes (octets)
          if($_FILES['image']['size'] > $maxsize){

            $Alert->error('L\'image est trop lourde','style.php');

          } else {
             if(($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/jpg')) {

              if(move_uploaded_file($imageTmp,$dir .$imageName)){
                
                $Theme->updateElement('logo',$imageName);
                
                $Alert->success('Logo mis à jour','style.php');
                
               } else {

                 $Alert->error('Une erreur est survenue','style.php');

               }
             } else {

               $Alert->error('Format interdit','style.php');

             }

          }

        }
        
      }
      
    }
    
  }
  
  public function swiftUpdateHeader() {
    
    global $DB;
    global $Alert;
    global $User;
    global $Theme;
    
    if(trigger('updateHeader')) {
      
      if($User->info('rank') >= 8) {
        
        $image = $_FILES['image'];

        if(!empty($image)) {

          $imageNameB = iHash(iSecu($_FILES['image']['name']) . time());
          $path = $_FILES['image']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          $imageName = $imageNameB . '.' . $ext;
          $imageTmp = iSecu($_FILES['image']['tmp_name']);
          $imageSize = iSecu($_FILES['image']['size']);
          $dir = '../themes/'.strtolower($Theme->get('title')).'/global/style/images/';
          $maxsize = 99999999999999999999999999; // Taille en bytes (octets)
          if($_FILES['image']['size'] > $maxsize){

            $Alert->error('L\'image est trop lourde','style.php');

          } else {
             if(($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/jpg')) {

              if(move_uploaded_file($imageTmp,$dir .$imageName)){
                
                $Theme->updateElement('header',$imageName);
                
                $Alert->success('Header mis à jour','style.php');
                
               } else {

                 $Alert->error('Une erreur est survenue','style.php');

               }
             } else {

               $Alert->error('Format interdit','style.php');

             }

          }

        }
        
      }
      
    }
    
  }
  
  public function swiftUpdateBackground() {
    
    global $DB;
    global $Alert;
    global $User;
    global $Theme;
    
    if(trigger('updateBackground')) {
      
      if($User->info('rank') >= 8) {
        
        $image = $_FILES['image'];

        if(!empty($image)) {

          $imageNameB = iHash(iSecu($_FILES['image']['name']) . time());
          $path = $_FILES['image']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          $imageName = $imageNameB . '.' . $ext;
          $imageTmp = iSecu($_FILES['image']['tmp_name']);
          $imageSize = iSecu($_FILES['image']['size']);
          $dir = '../themes/'.strtolower($Theme->get('title')).'/global/style/images/';
          $maxsize = 99999999999999999999999999; // Taille en bytes (octets)
          if($_FILES['image']['size'] > $maxsize){

            $Alert->error('L\'image est trop lourde','style.php');

          } else {
             if(($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/jpg')) {

              if(move_uploaded_file($imageTmp,$dir .$imageName)){
                
                $Theme->updateElement('background',$imageName);
                
                $Alert->success('Background mis à jour','style.php');
                
               } else {

                 $Alert->error('Une erreur est survenue','style.php');

               }
             } else {

               $Alert->error('Format interdit','style.php');

             }

          }

        }
        
      }
      
    }
    
  }
  
}
  




