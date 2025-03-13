<?php
require_once 'config/database.php';

// Function to get content from database
function getContent($pdo, $page_name, $section_name) {
    $table_name = $page_name . '_content';
    $stmt = $pdo->prepare("SELECT content FROM " . $table_name . " WHERE section_name = ?");
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
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- SITE TITLE -->
		<title>Bienvenue sur morchid el moussafir</title>			
		<!-- Latest Bootstrap min CSS -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">				
		<!-- Google Font -->	
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet"> 
		<!-- fonts CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/themify-icons.css">
		<!--- owl carousel Css-->
		<link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.css">		
		<!-- MAGNIFIC CSS -->
		<link rel="stylesheet" href="assets/css/magnific-popup.css">	
		<!-- flexslider CSS -->
		<link rel="stylesheet" href="assets/css/flexslider.css">			
		<!-- Style CSS -->				
		<link rel="stylesheet" href="assets/css/style.css">					
		<link rel="stylesheet" href="assets/css/responsive.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">				
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
		
		<!-- START HOME -->
		<section id="home" class="home-area">	
			<div id="home-slider" class="flexslider text-center loading">
			  <ul class="slides">
				<li style="background: url('assets/img/bg/slide1.jpg') no-repeat center center;">
					<div class="hero-text">
						 <h1><?php echo getContent($pdo, 'index', 'main_title_line1'); ?> <br /> <?php echo getContent($pdo, 'index', 'main_title_line2'); ?></h1>
						 <p class="read_p">
							<i class="fas fa-truck"></i> <?php echo getContent($pdo, 'index', 'hero_text'); ?>
						  </p>
					 </div> 
				</li>			
				<li style="background: url('assets/img/bg/slide2.jpg') no-repeat center center;">
					<div class="hero-text">
						<h1><?php echo getContent($pdo, 'index', 'main_title_line1'); ?> <br /> <?php echo getContent($pdo, 'index', 'main_title_line2'); ?></h1>
						<p class="read_p">
						   <i class="fas fa-truck"></i> <?php echo getContent($pdo, 'index', 'hero_text'); ?>
						 </p>
					</div>  
				</li>			
				<li style="background: url('assets/img/bg/slide3.jpg') no-repeat center center;">
					<div class="hero-text">
						<h1><?php echo getContent($pdo, 'index', 'main_title_line1'); ?> <br /> <?php echo getContent($pdo, 'index', 'main_title_line2'); ?></h1>
						<p class="read_p">
						   <i class="fas fa-truck"></i> <?php echo getContent($pdo, 'index', 'hero_text'); ?>
						 </p>
					</div>  
				</li>
			  </ul>
			</div>			
		</section>
		<!-- END HOME -->						
		
		<!-- START ABOUT -->
		<section class="about-content section-padding">
			<div class="container">									
				<div class="row">								
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single-about">
							<h1>Meilleure Agence de Transporteurs</h1>
							<p><?php echo getContent($pdo, 'index', 'about_text'); ?></p>
							<a class="read_btn" href="about.php">En savoir plus</a>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="single-about-img">
							<img src="assets/img/about-01.png" class="img-fluid" alt="" />
						</div>
					</div>		  
				</div>
			</div>
		</section>
		<!-- END ABOUT -->
		
		<!-- START SERVICE -->
		<section class="service-area section-padding">
			<div class="container">									
				<div class="row service-bg">								
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="single-service-info">
							<h2>Service que nous offrons</h2>
							<p><?php echo getContent($pdo, 'index', 'service_intro'); ?></p>
						</div>
					</div>
					<div class="col-lg-8 col-sm-6 col-xs-12">
						<div id="service-slider" class="owl-carousel">
							<div class="single-service">
								<i class="fa fa-cubes"></i>
								<h4>Stockage des colis</h4>
								<p><?php echo getContent($pdo, 'index', 'service_storage'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>
							<div class="single-service">
								<i class="fa fa-shipping-fast"></i>
								<h4>Livraison des colis</h4>
								<p><?php echo getContent($pdo, 'index', 'service_delivery'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>
							<div class="single-service">
								<i class="fa fa-box-open"></i>
								<h4>Packaging des colis</h4>
								<p><?php echo getContent($pdo, 'index', 'service_packaging'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>
							<div class="single-service">
								<i class="fa fa-dolly"></i>
								<h4>Ramassage</h4>
								<p><?php echo getContent($pdo, 'index', 'service_pickup'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>
							<div class="single-service">
								<i class="fa-solid fa-file-contract"></i>
								<h4>Contract Logistique</h4>
								<p><?php echo getContent($pdo, 'index', 'service_contract'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>
							<div class="single-service">
								<i class="fa-solid fa-display"></i>
								<h4>Consultation</h4>
								<p><?php echo getContent($pdo, 'index', 'service_consultation'); ?></p>
								<a class="read_btn" href="service.php">En savoir plus</a>
							</div>							
						</div>
					</div>		  
				</div>
			</div>
		</section>
		<!-- END SERVICE -->
		
		<!-- START CASE STUDIES -->
		<section class="term-area section-padding">
			<div class="container">									
				<div class="section-title text-center">
					<h1>Nos Engagements <br /> Conditions et Services</h1>
					<p><?php echo getContent($pdo, 'index', 'engagement_intro'); ?></p>
				</div>				
				<div class="row text-center">								
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="case_feature" style="background-image: url(assets/img/term/case1.jpg);  background-size:cover; background-position: center center;">
							<h2>Transport <br />France Maroc</h2>
							<p><?php echo getContent($pdo, 'index', 'transport_text'); ?></p>
							<a class="read_btn" href="terms.php">En savoir plus</a>
						</div>
					</div>					
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="case_feature" style="background-image: url(assets/img/term/case2.jpg);  background-size:cover; background-position: center center;">
							<h2>Partenaire <br />Logistique</h2>
							<p><?php echo getContent($pdo, 'index', 'partner_text'); ?></p>
							<a class="read_btn" href="terms.php">En savoir plus</a>
						</div>
					</div>					
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="case_feature" style="background-image: url(assets/img/term/case3.jpg);  background-size:cover; background-position: center center;">
							<h2>Pourquoi<br />El Moussafir</h2>
							<p><?php echo getContent($pdo, 'index', 'why_us_text'); ?></p>
							<a class="read_btn" href="terms.php">En savoir plus</a>
						</div>
					</div>					
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="case_feature" style="background-image: url(assets/img/term/case4.jpg);  background-size:cover; background-position: center center;">
							<h2>Contrôle <br />Douanier </h2>
							<p><?php echo getContent($pdo, 'index', 'customs_text'); ?></p>
							<a class="read_btn" href="terms.php">En savoir plus</a>
						</div>
					</div>		  
				</div>
			</div>
		</section>
		<!-- END CASE STUDIES -->

		<!-- START ADVISOR -->
		<section class="advisor-area section-padding">
			<div class="container">									
				<div class="row">								
					<div class="col-lg-8 col-sm-6 col-xs-12">
						<div id="team-slider" class="owl-carousel">
							<div class="single-advisor">
								<img src="assets/img/Depart.jpg" class="img-fluid" alt="" />
								<h5>Départ</h5>
								<h3>MAROC-FRANCE</h3>
								<p><?php echo getContent($pdo, 'index', 'departure_date'); ?></p>
							</div>
							<div class="single-advisor">
								<img src="assets/img/Arrive.jpg" class="img-fluid" alt="" />
								<h5>Arrive</h5>
								<h3>FRANCE-MAROC</h3>
								<p><?php echo getContent($pdo, 'index', 'arrival_date'); ?></p>
							</div>
						</div>		  
					</div>
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="single-advisor-info">
							<h2>Détails des <br/>Départs</h2>
							<p><?php echo getContent($pdo, 'index', 'departure_info'); ?></p>
						</div>
					</div>					
				</div>
			</div>
		</section>
		<!-- END ADVISOR -->

		<!-- START TESTIMONIAL -->
		<section class="testimonial-area section-padding">
			<div class="container">									
				<div class="section-title text-center">
					<h1>Avis des Clients</h1>
					<p><?php echo getContent($pdo, 'index', 'testimonial_intro'); ?></p>
				</div>				
				<div class="row">								
					<div class="col-lg-12 col-sm-12 col-xs-12">
					<div id="testimonial-slider" class="owl-carousel">
						<div class="single_testimonial">
							<div class="testi_img">
								<img src="assets/img/testimonial/1.jpg" class="img-fluid" alt="" />
								<h3>Hassan</h3> 
								<h5>2024-02-11</h5>
							</div>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i> 
							<p><?php echo getContent($pdo, 'index', 'testimonial_1'); ?></p>
						</div>
						<div class="single_testimonial">
							<div class="testi_img">
								<img src="assets/img/testimonial/2.jpg" class="img-fluid" alt="" />
								<h3>Lionel</h3>
								<h5>2024-03-19</h5>
							</div>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<p><?php echo getContent($pdo, 'index', 'testimonial_2'); ?></p>
						</div>
						<div class="single_testimonial">
							<div class="testi_img">
								<img src="assets/img/testimonial/3.jpg" class="img-fluid" alt="" />
								<h3>Francoise</h3>
								<h5>2024-05-28</h5>
							</div>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<p><?php echo getContent($pdo, 'index', 'testimonial_3'); ?></p>
						</div>
						<div class="single_testimonial">
							<div class="testi_img">
								<img src="assets/img/testimonial/4.jpg" class="img-fluid" alt="" />
								<h3>Latifa</h3>
								<h5>2024-09-18</h5>
							</div>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<p><?php echo getContent($pdo, 'index', 'testimonial_4'); ?></p>
						</div>
					</div>
					</div>		  
				</div>
			</div>
		</section>
		<!-- END TESTIMONIAL -->
		
		<!-- START COUNTER -->
		<section class="counter-area counter_feature section-padding">
			<div class="container">									
				<div class="section-title text-center">
					<h1>Chiffres Clés</h1>
					<p><?php echo getContent($pdo, 'index', 'counter_intro'); ?></p>
				</div>				
				<div class="row text-center">								
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="single-counter">
							<span class="ti-check-box"></span>
							<h2 class="counter-num"><?php echo getContent($pdo, 'index', 'stats_clients'); ?></h2>
							<h4>Clients Satisfaits</h4>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="single-counter counter-br">
							<span class="ti-crown"></span>
							<h2 class="counter-num"><?php echo getContent($pdo, 'index', 'stats_deliveries'); ?></h2>
							<h4>Livraisons Réussies</h4>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="single-counter">
							<span class="ti-user"></span>
							<h2 class="counter-num"><?php echo getContent($pdo, 'index', 'stats_experts'); ?></h2>
							<h4>Experts en Transport et Douane</h4>
						</div>
					</div>		  
				</div>
			</div>
		</section>
		<!-- END COUNTER -->
		 
		<!-- START WHATSSAP --> 
		<div class="WA_Chat_Widget" data-position="bottom-right">
			<div class="WA_ChatBox">
				<div class="WA_ChatBox_Header">
					<div class="avatarBox">
						<img src="assets/img/chairman.png" alt="Chat Avatar">
					</div>
					<div class="infoBox">
						<h4 class="name"><?php echo getContent($pdo, 'index', 'company_name'); ?></h4>
						<span class="answer_time"><?php echo getContent($pdo, 'index', 'response_time'); ?></span>
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
							<p><?php echo getContent($pdo, 'index', 'whatsapp_message'); ?></p>
						</div>
					</div>
				</div>
				<div class="WA_ChatBox_Footer">
					<a class="btn btn-whatsapp" href="http://wa.me/<?php echo getContent($pdo, 'index', 'whatsapp_number'); ?>" target="_blank">Commencer le chat</a>
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
		<div class="footer-area section-padding" style="background-image: url(assets/img/bg/footer-bg.jpg);  background-size:cover;background-position:center;background-attachment: fixed;">
			<div class="container">		
				<div class="row">
					<div class="col-lg-8 col-sm-8 col-xs-12">
						<div class="office_address">
							<h4>Adresse de Nos Bureaux</h4>
							<div class="single_address">
								<h5>Maroc</h5>
								<p><?php echo getContent($pdo, 'index', 'address_morocco'); ?></p>
								<p><?php echo getContent($pdo, 'index', 'phone_morocco'); ?></p>
								<p><?php echo getContent($pdo, 'index', 'email'); ?></p>
							</div>
							<div class="single_address">
								<h5>France</h5>
								<p><?php echo getContent($pdo, 'index', 'address_france'); ?></p>
								<p><?php echo getContent($pdo, 'index', 'phone_france'); ?></p>
								<p><?php echo getContent($pdo, 'index', 'email'); ?></p>
							</div>
						</div>
					</div>			
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="map">
							<h4>Position sur Google Maps</h4>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13295.927930268164!2d-7.629346842768778!3d33.57311021533624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd8087dba555%3A0xf2f7a9f2e8d5673b!2sCasablanca%2C%20Morocco!5e0!3m2!1sen!2sma!4v1700000000000" height="450" style="border:0" allowfullscreen></iframe>
						</div>
						<p class="copyright"><?php echo getContent($pdo, 'index', 'copyright'); ?></p>
					</div>					
				</div>					
			</div>
		</div>
		<!-- END FOOTER -->	
		 
		<!-- Latest jQuery -->
			<script src="assets/js/jquery-1.12.4.min.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
			<script src="assets/bootstrap/js/bootstrap.js"></script>
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
		<!-- sendtowhatssap js -->
			<script src="assets/js/sendtowhatssap.js"></script>	
		<!-- flexslider js -->
			<script src="assets/js/jquery.flexslider-min.js"></script>	
		<!-- countTo js -->
			<script src="assets/js/jquery.inview.min.js"></script>				
		<!-- MAGNIFICANT JS -->
			<script src="assets/js/jquery.magnific-popup.min.js"></script>		
		<!-- stellar js -->
			<script src="assets/js/jquery.stellar.min.js"></script>				
		<!-- scripts js -->
			<script src="assets/js/scripts.js"></script>
    </body>
</html> 