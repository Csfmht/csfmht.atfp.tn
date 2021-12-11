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
            { if($user-> role === "For" or $user-> role === "Admin")
              {
                header('Location: formateur.php?login=1');
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
        <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
        <meta property="og:title" content="Formateurs_المكونون">
        <meta property="og:type" content="website">
        <meta name="theme-color" content="#478ac9">
        <meta property="og:url" content="index.php">
   
        <title>Formateurs_المكونون</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <link rel="stylesheet" href="css/nicepage.css" media="screen">
        <link rel="stylesheet" href="css/formateurs.css" media="screen">
        <link rel="icon" href="images/favicon3.ico">
        <link id="u-theme-google-font" rel="stylesheet" href="css/fonts.css">
        <link id="u-page-google-font" rel="stylesheet" href="css/formateurs-fonts.css">
        <link rel="canonical" href="index.php">
    
        <script type="text/javascript">
            document.getElementById("carousel_5996").style.display="none";
        </script>
    
        <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    
        <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    
        <script type="application/ld+json">
            {
    	    "@context": "http://schema.org",
    	    "@type": "Organization",
 	  	    "name": "CSFMH Tabarka",
    	    "url": "index.php",
    	    "logo": "images/ATFPFlags.gif",
    	    "sameAs": []
            }
        </script>
    
        <script>
            function gdprConfirmed()
            {
                return document.cookie.split(';').filter(function(item) {
                return item.trim().indexOf('u-gdpr-cookie=true') >= 0
                }).length;
            }
            if (gdprConfirmed())
            {
                document.write
                ("\
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
                    ".replace(/gascript/g, 'script')
                );
            }
        </script>
    </head>

    <body class="u-body">
      <!----------------------##############--------------------- entet du page ----------------------##############--------------------->
      <?php include("entetdepages.php");?>
      <!----------------------##############--------------------- corps du page ----------------------##############--------------------->
        <section class="u-clearfix u-image u-shading u-section-1" id="carousel_5996" data-image-width="628" data-image-height="430">
            <div class="u-clearfix u-sheet u-valign-top-md u-valign-top-sm u-valign-top-xs u-sheet-1">
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
                                    <input type="submit" name="validconnectFor" id="validconnectFor" class="btn btn-success" value="se connecter" />
                                </div>
                            </form>
                            <?php if($error===1): ?>
                <div class="alert alert-danger u-align-center u-form-group u-form-submit u-form-group-4">
                <h3 class="u-custom-font u-font-oswald u-text u-text-1" id="titreconnect">
                  <FONT size="2">Désolé, vous n'êtes pas un formateur</FONT><br>
                  <FONT size="3">نتأسف أنت ليس بمكون</FONT>
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
                <input type="submit" name="mpoublie" id="mpoublie" class="btn btn-success" value="Mot de passe oublié !" />
              </div>
              <div class="p-2 u-align-center u-form-group u-form-submit u-form-group-3">
                <input type="submit" name="inscription" id="inscription" class="btn btn-success" value="Inscription..." />
              </div>
              <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
      <!----------------------##############--------------------- entet du page ----------------------##############--------------------->
        <?php include("pieddepage.php");?>
    </body>
</html>