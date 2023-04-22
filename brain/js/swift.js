(function ($) {
  
  console.log('ok');
  
  $(document).ready(function(){
    
    setTimeout(function() {
      $(".alert").fadeOut(500);
    }, 2000);
    
      
    
  });

  
  // Installation
  $('#installation').submit(function(e) {
    
    var install = {
      title: $('#siteTitle').val(),
      description: $('#siteDescription').val(),
      pseudo: $('#creatorPseudo').val(),
      email: $('#creatorEmail').val(),
      password: $('#creatorPassword').val(),
      passwordCf: $('#creatorPasswordCf').val()
    };
    
    e.preventDefault();
    
    if(install.title == '' || install.description == '' || install.pseudo == '' || install.email == '' || install.password == '' || install.passwordCf == '') {
      
      warning('Veuillez remplir tous les champs');
      
    } else {
      
      var installData = $("#installation").serialize();
    
      $.ajax({

        type : 'POST',
        url  : 'includes/installation.php',
        data : installData,
        beforeSend: function() {
          
          $('.warning').fadeOut(200);
          
        },
        success: function (data) {
          
          console.log(data);
          
          if(data == 'errorFields') {
            
            warning('Veuillez remplir tous les champs vides');
            
          }
          
          if(data == 'pseudo') {
            
            warning('Votre pseudonyme ne contient pas de bon caractères');
            
          }
          
          if(data == 'pseudoLength') {
            
            warning('Votre pseudonyme est trop court');
            
          }
          
          if(data == 'passwordLength') {
            
            warning('Votre mot de passe est trop court');
            
          }
          
          if(data == 'passwordCf') {
            
            warning('Les mots de passe entrés ne correspondent pas');
            
          }
          
          if(data == 'finish') {
            
            window.location.reload();
            
          }
          
        },
        error: function (e) {
          alert(e);
        }
        
      });
      
    }
    
  });
  
  $('.openModal').each(function() {
    
    var modalToOpen = $(this).data('open-modal');
    
    $(this).click(function() {
      
      $('[id='+ modalToOpen +']').fadeIn(200);
      
    });
    
  });
  
  
  $('.modalClose').each(function() {
    
    var modalToClose = $(this).data('close-modal');
    
    $(this).click(function(){
      
      $('[id='+ modalToClose +']').fadeOut(200);
      
    }); 
    
  });
  
  $('.closeModal').each(function() {
    
    var modalToClose = $(this).data('close-modal');
    
    $(this).click(function(){
      
      $('[id='+ modalToClose +']').fadeOut(200);
      
    }); 
    
  });
  
  $('.headerToggleMenu').click(function() {
    
    $('.subnav').toggleClass('visible');
    
  });
  
  
  
  
  
  
  
  
  warning = function(msg) {
    
    $('.warningContent').append('<div class="warning">'+ msg +'</div>');
    
    $('.warning').each(function() {
      $(this).click(function() {
        $(this).fadeOut(200);
      });
    });
    
  }
  
})(jQuery);