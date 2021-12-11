<?php
  require "vendor/autoload.php";
  
  use App\Auth;

  //session_start();

  $host= "localhost";
  $userdb= "root";
  $pass = "";
  $db_name = "csfmht32542";
  $pdo = new PDO('mysql:host=localhost;dbname=csfmht32542', $userdb, $pass, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);
  $auth = new Auth($pdo);

  $error = 0;
  //if ($auth -> user() !== null){
  //  header('Location: index.php');
  //  exit();  
  //}

  if (!empty($_POST))
    {
        $user = $auth -> login($_POST['email'], $_POST['password']);
        if ($user)
            { if($user-> role === "App" or $user-> role === "Admin")
              {
                header('Location: Apprenant.php?login=1');
                exit();
              }
              else
              {
                $error = 1; 
                /*echo "<script language=javascript> alert(\"Désolé, vous n'êtes pas apprenant نتأسف أنت ليس بمتكون\")</script>";*/
              }
            }
            else{$error = 2;}
        
    }
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <meta property="og:title" content="Apprenants_المتكونون">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:url" content="index.php">
    <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
    
    <title>Apprenants_المتكونون</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
   
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/administraifs.css" media="screen">
    <link rel="stylesheet" href="css/styles_Modal.css">

    <link rel="icon" href="/images/favicon3.ico">
    <link id="u-theme-google-font" rel="stylesheet" href="css/fonts.css">
    <link id="u-page-google-font" rel="stylesheet" href="css/administraifs-fonts.css">
    <link rel="canonical" href="index.php">
  

    <script src="js/scripts_Modal.js" defer></script>
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <script type="application/ld+json">
      {
		    "@context": "http://schema.org",
		    "@type": "Organization",
		    "name": "CSFMH Tabarka",
		    "url": "index.php",
		    "logo": "/images/ATFPFlags.gif",
		    "sameAs": []
      }
    </script>
    <script>
      function gdprConfirmed()
      {
        return document.cookie.split(';').filter(
          function(item)
          {
            return item.trim().indexOf('u-gdpr-cookie=true') >= 0
          }
        ).length;
      }
      if (gdprConfirmed())
      {
        document.write("\
        \
        <!-- Google Analytics -->\
        <gascript async src=\"https://www.googletagmanager.com/gtag/js?id=AIzaSyAv7h2waVN7fI349svwE-0jiHxLxUnD6Tg\"></gascript>\
        <gascript>\
        window.dataLayer = window.dataLayer || [];\
        function gtag(){dataLayer.push(arguments);}\
        gtag('js', new Date());\
        gtag('config', 'AIzaSyAv7h2waVN7fI349svwE-0jiHxLxUnD6Tg');\
        </gascript>\
        <!-- End Google Analytics -->\
        ".replace(/gascript/g, 'script'));
      }
    </script>
  </head>
  <body class="u-body">
      <!----------------------##############--------------------- entet du page ----------------------##############--------------------->
    <?php include("entetdepages.php");?>
      <!----------------------##############--------------------- corps du page ----------------------##############--------------------->
      <section class="u-align-left u-clearfix u-image u-shading u-section-1" id="carousel_ebec" data-image-width="900" data-image-height="400">
        <div class="u-clearfix u-sheet u-valign-top-sm u-valign-top-xs u-sheet-1">
          <div class="u-align-center u-container-style u-group u-opacity u-opacity-50 u-palette-1-light-2 u-group-1">
            <div class="u-container-layout u-container-layout-1">
              <h2 class="u-custom-font u-font-oswald u-text u-text-1" id="titreconnect">Connexion<br>الدخول</h2>
              <div class="u-form u-form-1">
                <form id="FormConnexion" name="FormConnexion" method="POST" action="">
                  <div class="p-2 u-form-email u-form-group u-form-group-1">
                    <input type="email" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" placeholder="Email-البريد الإلكتروني" required="" maxlength="50">
                  </div>
                  <div class="p-2 u-form-group u-form-name u-form-partition-factor-2 u-form-group-2">
                    <input type="password" name="password" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" placeholder="Mot de passe-كلمة العبور" required="" maxlength="30">
                  </div>
                  <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                    <input type="submit" name="validconnectApp" id="validconnectApp" class="btn btn-success" value="se connecter" />
                  </div>
                </form>
                <?php if($error===1): ?>
                  <div class="alert alert-danger u-align-center u-form-group u-form-submit u-form-group-4">
                    <h3 class="u-custom-font u-font-oswald u-text u-text-1" id="titreconnect">
                      <FONT size="2">Désolé, vous n'êtes pas un apprenant</FONT><br>
                      <FONT size="3">نتأسف أنت ليس بمتكون</FONT>
                    </h3>
                  </div>
                <?php endif ?>
                <?php if($error===2): ?>
                  <div class="alert alert-danger u-align-center u-form-group u-form-submit u-form-group-4">
                    <h3 class="u-custom-font u-font-oswald u-text u-text-1" id="titreconnect">
                      <FONT size="2">Erreur de connexion</FONT><br>
                      <FONT size="3">خطأ في الدخول</FONT>
                    </h3>
                  </div>
                  <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                    <a data-toggle="modal" data-target="#MpOublier" href="#" class="btn btn-warning btn-lg">
                      <i class="fa fa-clipboard"></i>Mot de passe oublié !
                    </a>
                  </div>
                  <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                    <a href="#" role="button" data-target="#modal2" data-toggle="modal" class="btn btn-succes" >Inscription... </a>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>


          <div class="modal fade" id="MpOublier">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </form>
                    <script type="text/javascript">
                      $('#myForm').submit(function(event)
                      {
                        event.preventDefault();
                        $('#resultajax').append('<img src="/images/loader.gif" alt="attendez ..." />');
                        $('#myForm input.btn').hide();
                        $.ajax(
                        {
                          type: 'POST',
                          url: 'Apprenants',
                          data: $(this).serialize(),
                          success: function(data)
                          {
                            if(data == 'true')
                            {   
                              $('#resultajax').html("<br><div class='alert alert-success center'><strong>ajouter avec succès</strong></div>");
                              $('#myForm input.btn').show();
                            }
                            if(data == 'false')
                            {
                              $('#resultajax').html("<br><div class='alert alert-danger center'><strong>Une erreur est survenue .. réessayer</strong></div>");
                              $('#myForm input.btn').show();
                            }
                          }
                        });
                      });
                      function refresh()
                      {
                      // to current URL
                        window.location='Apprenants.php';
                      }
                    </script>
                </div>
                <div class="modal-footer d-block">
                  <p class="float-start">Not yet account <a href="#">Sign Up</a></p>
                  <button type="submit" class="btn btn-warning float-end">Submit</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          









          <!-----------##############-------------- Modal MP Oublier ---------------##############------------- 
          <div class="popup" id="modal" role="dialog">
            <div class="popup-content">
              <div class="popup-close" data-dismiss="dialog">X</div>
              <div class="popup-header">
                <p>Titre de la modale 1</p>
              </div>
              <div class="popup-body">
                Lorem ipsum dolor sit amet consectetur adipisicing 
                elit. Quisquam voluptates excepturi sint, veritatis officia laborum temporibus. 
                Beatae neque reprehenderit ipsum numquam facilis repudiandae iste explicabo voluptatum 
                corrupti harum. Sunt, asperiores.
              </div>
              <div class="popup-footer">
                <a href="#" class="btn1 btn1-close" role="button" data-dismiss="dialog">Fermer</a>
                <a href="#" class="btn1" role="button">Valider</a>
              </div>
            </div>
          </div>
          ------------##############-------------- Fin Modal MP Oublier ------------##############----------------> 
        </div>
      </section>

      <!----------------------##############--------------------- entet du page ----------------------##############--------------------->
    <?php include("pieddepage.php");?>
  </body>
</html>