<?php
require_once 'config/database.php';

// Function to get content from database
function getContent($pdo, $page_name, $nom_section) {
    // Set a timeout for script execution
    set_time_limit(10); // 10 seconds maximum execution time
    
    if (!$pdo) {
        error_log("Database connection not available in {$page_name}.php");
        return 'Database connection error';
    }
    
    try {
        $table_name = $page_name . '_content';
        
        // Add timeout to the query
        $pdo->setAttribute(PDO::ATTR_TIMEOUT, 5);
        
        $stmt = $pdo->prepare("SELECT contenu FROM " . $table_name . " WHERE nom_section = ? LIMIT 1");
        if (!$stmt) {
            error_log("Failed to prepare statement in {$page_name}.php: " . print_r($pdo->errorInfo(), true));
            return 'Query preparation error';
        }
        
        $success = $stmt->execute([$nom_section]);
        if (!$success) {
            error_log("Failed to execute statement in {$page_name}.php: " . print_r($stmt->errorInfo(), true));
            return 'Query execution error';
        }
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Clear the statement to free resources
        $stmt->closeCursor();
        
        return $result ? $result['contenu'] : 'Content not found';
    } catch (PDOException $e) {
        error_log("Database error in {$page_name}.php: " . $e->getMessage());
        return 'Database error occurred';
    }
}

// Add error reporting at the top of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- SITE TITLE -->
		<title><?php echo getContent($pdo, 'terms', 'titre_page'); ?></title>
		<!-- Favicon -->
		<link rel="icon" href="assets/img/logo.png" type="image/png">
		<link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
		<link rel="apple-touch-icon" href="assets/img/logo.png">
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

		<script>
		// Force hide preloader after 5 seconds maximum
		setTimeout(function() {
			document.querySelector('.spinner').style.display = 'none';
			document.querySelector('.preloader').style.display = 'none';
		}, 5000);
		</script>

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
						<h1><?php echo getContent($pdo, 'terms', 'titre_page'); ?></h1>
					</div>
				</div>
			</div>
		</section>	
		<!-- END SECTION TOP -->		
		
		<!-- START CASE STUDIES -->
		<div class="case_studies_area section-padding">
			<div class="container">														
				<div class="row case_studies_bg">
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies_img">
							<img src="assets/img/term/case_single_one.jpg" class="img-fluid" alt="" />
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies">
							<h1><?php echo getContent($pdo, 'terms', 'titre_transport'); ?></h1>
							<p><?php echo getContent($pdo, 'terms', 'texte_transport'); ?></p>
						</div>
					</div>
				</div>											
				<div class="row case_studies_bg">
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies">
							<h1><?php echo getContent($pdo, 'terms', 'titre_partenaire'); ?></h1>
							<p><?php echo getContent($pdo, 'terms', 'texte_partenaire1'); ?></p>
							<p><?php echo getContent($pdo, 'terms', 'texte_partenaire2'); ?></p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies_img">
							<img src="assets/img/term/case_single_tho.jpg" class="img-fluid" alt="" />
						</div>
					</div>					
				</div>											
				<div class="row case_studies_bg">
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies_img">
							<img src="assets/img/term/case_single_three.jpg" class="img-fluid" alt="" />
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies">
							<h1><?php echo getContent($pdo, 'terms', 'titre_pourquoi'); ?></h1>
							<p><?php echo getContent($pdo, 'terms', 'texte_pourquoi1'); ?></p>
							<p><?php echo getContent($pdo, 'terms', 'texte_pourquoi2'); ?></p>
						</div>
					</div>
				</div>
				<div class="row case_studies_bg">
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies">
							<h1><?php echo getContent($pdo, 'terms', 'titre_douane'); ?></h1>
							<p><?php echo getContent($pdo, 'terms', 'texte_douane1'); ?></p>
							<p><?php echo getContent($pdo, 'terms', 'texte_douane2'); ?></p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single_case_studies_img">
							<img src="assets/img/term/case_single_foor.jpg" class="img-fluid" alt="" />
						</div>
					</div>					
				</div>		
			</div>
		</div>
		<!-- END CASE STUDIES -->

		<!-- START WHATSSAP --> 
		<div class="WA_Chat_Widget" data-position="bottom-right">
			<div class="WA_ChatBox">
				<div class="WA_ChatBox_Header">
					<div class="avatarBox">
						<img src="assets/img/chairman.png" alt="Chat Avatar">
					</div>
					<div class="infoBox">
						<h4 class="name"><?php echo getContent($pdo, 'terms', 'nom_entreprise'); ?></h4>
						<span class="answer_time"><?php echo getContent($pdo, 'terms', 'temps_reponse'); ?></span>
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
							<p><?php echo getContent($pdo, 'terms', 'message_whatsapp'); ?></p>
						</div>
					</div>
				</div>
				<div class="WA_ChatBox_Footer">
					<a class="btn btn-whatsapp" href="http://wa.me/<?php echo getContent($pdo, 'terms', 'numero_whatsapp'); ?>" target="_blank">Commencer le chat</a>
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
    </body>
</html> 