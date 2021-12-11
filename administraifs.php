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

  $error = false;
  //if ($auth -> user() !== null){
  //  header('Location: index.php');
  //  exit();  
  //}

  if (!empty($_POST))
    {
        $user = $auth -> login($_POST['email'], $_POST['password']);
        if ($user)
            {
                header('Location: Administratif.php?login=1');
                exit();
            }
        $error = true;
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
    <meta property="og:title" content="Administraifs_الإداريون">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:url" content="index.php">
    <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
    
    <title>Administraifs_الإداريون</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/administraifs.css" media="screen">
    <link rel="icon" href="/images/favicon3.ico">
    <link id="u-theme-google-font" rel="stylesheet" href="css/fonts.css">
    <link id="u-page-google-font" rel="stylesheet" href="css/administraifs-fonts.css">
    <link rel="canonical" href="index.php">
    
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
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" id="carousel_6283" data-image-width="626" data-image-height="391">
      <div class="u-clearfix u-sheet u-sheet-1">
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
                  <input type="submit" name="validconnectAdm" id="validconnectAdm" class="btn btn-success" value="se connecter" />
                </div>
              </form>
              <?php if($error): ?>
              <div class="alert alert-danger u-align-center u-form-group u-form-submit u-form-group-4">
                <h3 class="u-custom-font u-font-oswald u-text u-text-1" id="titreconnect">
                  <FONT size="2">Erreur de connexion</FONT><br>
                  <FONT size="2">خطأ في الدخول</FONT>
                </h3>
              </div>
              <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                <input type="submit" name="mpoublie" id="mpoublie" class="btn btn-success" value="Mot de passe oublié !" />
              </div>
              <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                <input type="submit" name="inscription" id="inscription" class="btn btn-success" value="Inscription..." />
              </div>
              <?php endif ?>
            </div>
          </div>
        </div>
        <div class="u-align-left u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-opacity u-opacity-50 u-palette-1-base u-radius-30 u-shape-round u-group-2">
          <div class="u-container-layout u-valign-bottom-xl u-valign-top-sm u-container-layout-2">
            <div class="u-carousel u-carousel-duration-10000 u-expanded-width u-gallery u-layout-carousel u-lightbox u-no-transition u-show-text-none u-gallery-1" id="carousel-a1f7" data-interval="10000" data-u-ride="carousel">
              <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
                <li data-u-target="#carousel-a1f7" data-u-slide-to="0" class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
                <li data-u-target="#carousel-a1f7" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
              </ol>
              <div class="u-carousel-inner u-gallery-inner" role="listbox">
                <div class="u-active u-carousel-item u-gallery-item">
                  <div class="u-back-slide" data-image-width="853" data-image-height="480">
                    <img class="u-back-image u-expanded u-image-contain" src="/images/organisationCSFMHT.gif">
                  </div>
                  <div class="u-over-slide u-over-slide-1">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div>
                <div class="u-carousel-item u-gallery-item">
                  <div class="u-back-slide" data-image-width="853" data-image-height="480">
                    <img class="u-back-image u-expanded u-image-contain" src="/images/visonCSFMHT2.gif">
                  </div>
                  <div class="u-over-slide u-over-slide-2">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div>
              </div>
              <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-a1f7" role="button" data-u-slide="prev">
                <span aria-hidden="true">
                  <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                </span>
                <span class="sr-only">
                  <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                </span>
              </a>
              <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-a1f7" role="button" data-u-slide="next">
                <span aria-hidden="true">
                  <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                </span>
                <span class="sr-only">
                  <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
      <!----------------------##############--------------------- Pied du page ----------------------##############--------------------->
      <?php include("pieddepage.php");?>


</body></html>