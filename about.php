<?php
require_once 'config/database.php';

// Function to get content from database
function getContent($pdo, $section_name) {
    $stmt = $pdo->prepare("SELECT content FROM about_content WHERE section_name = ?");
    $stmt->execute([$section_name]);
    $result = $stmt->fetch();
    return $result ? $result['content'] : '';
}
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- SITE TITLE -->
        <title><?php echo getContent($pdo, 'page_title'); ?></title>            
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">             
        <!-- Google Font -->    
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet"> 
        <!-- fonts CSS -->
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/themify-icons.css">
        <!--- owl carousel Css-->
        <link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.css">     
        <!-- MAGNIFIC CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">    
        <!-- Style CSS -->             
        <link rel="stylesheet" href="assets/css/style.css">                    
        <link rel="stylesheet" href="assets/css/responsive.css">                    
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body data-spy="scroll" data-offset="80">
        <!-- START PRELOADER -->
        <div class="preloader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!-- END PRELOADER -->        

        <!-- START NAVBAR -->
        <nav class="navbar navbar-toggleable-sm fixed-top navbar-light bg-faded site-navigation">
            <div class="container">
               <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>       
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Nos services</a></li>                    
                    <li class="nav-item"><a class="nav-link" href="terms.php">Terms & services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">A propos de nous</a></li>                      
                    <li class="nav-item"><a class="nav-link block-menu" href="contact.php">Contactez-nous</a></li>
                </ul>
              </div>
            </div>
        </nav>      
        <!-- END NAVBAR -->        
    
        <!-- START SECTION TOP -->
        <section class="section-top">
            <div class="container">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="section-top-title">
                        <h1><?php echo getContent($pdo, 'page_title'); ?></h1>
                    </div>
                </div>
            </div>
        </section>    
        <!-- END SECTION TOP -->        
    
        <!-- START HISTORY -->
        <section class="history-area section-padding">
            <div class="container">                                                
                <div class="row">                                
                    <div class="col-lg-7 col-sm-4 col-xs-12">
                        <div class="content-history">
                            <h1><?php echo getContent($pdo, 'why_title'); ?></h1>
                            <p><?php echo getContent($pdo, 'why_text'); ?></p>                    
                        </div>                            
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="content-history-img">
                            <img src="assets/img/about-one.jpg" class="img-fluid" alt="" />
                        </div>                
                    </div>      
                </div>
            </div>
        </section>
        <!-- END HISTORY -->
        
        <!-- START ABOUT PAGE -->
        <section class="about-page-content section-padding">
            <div class="container">                                                
                <div class="row">                                
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="content-about-img">
                            <img src="assets/img/chairman.png" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="content-about">
                            <h4><?php echo getContent($pdo, 'chairman_name'); ?></h4>
                            <h5><?php echo getContent($pdo, 'chairman_title'); ?></h5>
                            <p><?php echo getContent($pdo, 'chairman_text1'); ?></p>                            
                            <p><?php echo getContent($pdo, 'chairman_text2'); ?></p>
                            <p><?php echo getContent($pdo, 'chairman_text3'); ?></p>
                            
                            <img src="assets/img/signature.png" class="img-fluid" alt="" />
                        </div>                    
                    </div>     
                </div>
            </div>
        </section>
        <!-- END ABOUT PAGE -->

        <!-- START VIDEO -->    
        <section data-stellar-background-ratio="0.3" class="view_our_video" style="background-image: url(assets/img/bg/video-bg.jpg);  background-size:cover;background-position:center;">            
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="our_video">
                            <h1><?php echo getContent($pdo, 'video_title'); ?></h1>
                            <p><?php echo getContent($pdo, 'video_text'); ?></p>
                            <?php 
                            $video_link = getContent($pdo, 'video_link');
                            // Extract video ID from URL
                            $video_id = '';
                            if (preg_match('/[?&]v=([^&]+)/', $video_link, $matches)) {
                                $video_id = $matches[1];
                            } elseif (preg_match('/embed\/([^\/\?]+)/', $video_link, $matches)) {
                                $video_id = $matches[1];
                            } elseif (preg_match('/youtu\.be\/([^\/\?]+)/', $video_link, $matches)) {
                                $video_id = $matches[1];
                            }
                            ?>
                            <a class="video-play popup-youtube" href="https://www.youtube.com/watch?v=<?php echo $video_id; ?>">
                                <i class="ti-video-clapper"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>            
        </section>
        <!-- END VIDEO -->    
        
        <!-- START WHATSSAP --> 
        <div class="WA_Chat_Widget" data-position="bottom-right">
            <div class="WA_ChatBox">
                <div class="WA_ChatBox_Header">
                    <div class="avatarBox">
                        <img src="assets/img/chairman.png" alt="Chat Avatar">
                    </div>
                    <div class="infoBox">
                        <h4 class="name"><?php echo getContent($pdo, 'company_name'); ?></h4>
                        <span class="answer_time"><?php echo getContent($pdo, 'response_time'); ?></span>
                    </div>
                    <button class="WA_Close" onclick="hideChatbox()"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                        </svg></button>
                </div>
                <div class="WA_ChatBox_Body">
                    <div class="message">
                        <div class="message_content">
                            <p><?php echo getContent($pdo, 'whatsapp_message'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="WA_ChatBox_Footer">
                    <a class="btn btn-whatsapp" href="http://wa.me/<?php echo getContent($pdo, 'whatsapp_number'); ?>" target="_blank">Commencer le chat</a>
                </div>
            </div>
            <div class="WA_FloatingButton" onclick="toggleChatbox()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#4FCE5D" viewBox="0 0 90 90">
                    <path
                        d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 01-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 01-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0045.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z">
                    </path>
                </svg>
            </div>
        </div>
        <!-- END WHATSSAP -->  

        <!-- START FOOTER -->
        <?php require_once 'includes/footer.php'; ?>
        <!-- END FOOTER -->    
         
        <!-- Latest jQuery -->
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <!-- Latest compiled and minified Bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <!-- modernizer JS -->        
        <script src="assets/js/modernizr-2.8.3.min.js"></script>                                                                
        <!-- jquery nav JS -->        
        <script src="assets/js/jquery.nav.js"></script>                
        <!-- owl-carousel min js  -->
        <script src="assets/owlcarousel/js/owl.carousel.min.js"></script>                    
        <!-- scrolltopcontrol js -->
        <script src="assets/js/scrolltopcontrol.js"></script>
        <!-- whatssapscroll js -->
        <script src="assets/js/whatssapscroll.js"></script>        
        <!-- countTo js -->
        <script src="assets/js/jquery.inview.min.js"></script>        
        <!-- flexslider js -->
        <script src="assets/js/jquery.flexslider-min.js"></script>                
        <!-- MAGNIFICANT JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>        
        <!-- stellar js -->
        <script src="assets/js/jquery.stellar.min.js"></script>                
        <!-- scripts js -->
        <script src="assets/js/scripts.js"></script>

        <!-- Add this script before </body> tag -->
        <script>
            $(document).ready(function() {
                $('.popup-youtube').magnificPopup({
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });
        </script>
    </body>
</html> 