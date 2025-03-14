-- Create the database
CREATE DATABASE IF NOT EXISTS elmoussafir;
USE elmoussafir;

-- Create admin users table
CREATE TABLE admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Create index content table
CREATE TABLE index_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    section_name VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

-- Create service content table
CREATE TABLE service_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    section_name VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

-- Create about content table
CREATE TABLE about_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

-- Create terms content table
CREATE TABLE terms_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    section_name VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

-- Create contact content table
CREATE TABLE contact_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    section_name VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password) VALUES ('admin', 'admin123');

-- Insert index page content
INSERT INTO index_content (section_name, content) VALUES
('main_title_line1', 'Bienvenue sur morchid'),
('main_title_line2', 'El moussafir'),
('hero_text', 'Avec plus de 25 ans d''expérience dans le domaine du transport, nous sommes fiers d''être le N°1 en matière de ramassage et de livraison à domicile entre La France Et le Maroc.'),
('stats_clients', '521'),
('stats_deliveries', '754'),
('stats_experts', '128'),
('about_text', 'Il existe de nombreuses variations de services de transport, mais la majorité ont subi des modifications pour s''adapter aux besoins modernes. Notre mission est d''offrir des solutions qui vont au-delà de la simple logistique, en apportant un service personnalisé et des délais respectés, vous assurant une expérience de transport sans faille.'),
('service_intro', 'Des solutions logistiques personnalisées pour renforcer votre compétitivité.'),
('service_storage', 'Vos colis seront stockés dans un warehouse en sécurité et dans les meilleures conditions.'),
('service_delivery', 'Vous vendez, et nous prenons en charge la livraison, comme si c''était livré par vous.'),
('service_packaging', 'Pour garantir la sécurité de vos colis nous vous proposons un service d''emballage sur mesure.'),
('service_pickup', 'Nous nous occupons du ramassage de vos colis depuis vos locaux afin de faciliter vos livraisons'),
('service_contract', 'Service logistique personnalisé, rapide et sécurisé, partout en Côte d''Azur et au Maroc.'),
('service_consultation', 'Besoin d''une gestion complète de votre chaîne d''approvisionnement? Contactez notre équipe!'),
('engagement_intro', 'Découvrez nos engagements pour un transport sécurisé et fiable. Transparence et qualité sont au cœur de chaque livraison.'),
('transport_text', 'Nous assurons des livraisons rapides et sûres entre la France et le Maroc, avec un service personnalisé.'),
('partner_text', 'Votre partenaire de confiance pour des solutions logistiques adaptées à vos besoins professionnels.'),
('why_us_text', 'Choisissez-nous pour notre expertise et notre fiabilité, garantissant une satisfaction client maximale.'),
('customs_text', 'Nous facilitons vos démarches douanières pour assurer un transport fluide et sans complications.'),
('departure_date', '18/09/2024'),
('arrival_date', '25/02/2024'),
('departure_info', 'Nous proposons des départs réguliers entre le Maroc et la France pour répondre aux besoins de nos clients en matière de transport international.'),
('testimonial_intro', 'Nous sommes fiers de la satisfaction de nos clients. Chaque retour nous permet de continuer à améliorer nos services et de répondre aux attentes.'),
('testimonial_1', 'Salam khoya, je tenais à te remercier pour ton professionnalisme tous mes cartons sont arrivés sans emcombre à Agadir même les cartons qui était fragile sont arrivés en très bon état merci beaucoup de ta gentillesse et de ta confiance c''est avec grand plaisir que je renouvellerai l''expérience car c''était une première avec toi barakalaofik allah i3aownek'),
('testimonial_2', 'Merci Morchid pour ton sérieux, mes 2 vélos livrés sans encombre à l adresse indiquée. Bonne continuation et au plaisir d''une prochaine livraison.'),
('testimonial_3', 'Merci, Mr elmoussafir, Colis bien reçu comme d''habitude. Personne très gentil, agréable et Professionnelle. Bon Ramadan et bon courage'),
('testimonial_4', 'Salam, je tiens à vous remercier sincèrement pour la qualité de votre service. Toutes mes affaires sont arrivées en parfait état, y compris les objets fragiles, et ce, dans les délais. Votre professionnalisme et votre sérieux m''ont vraiment impressionnée.'),
('counter_intro', 'Notre mission est d''assurer le transport sécurisé et fiable de vos colis, qu''il s''agisse de biens personnels ou commerciaux. Nous mettons notre expertise et notre engagement à votre service pour garantir des livraisons réussies et une satisfaction client optimale.'),
('whatsapp_message', 'Salut, comment puis-je vous aider?'),
('address_morocco', 'Casablanca, Hay Mohammadi'),
('address_france', '2, Place deis amouriers Sophia Antipolis'),
('phone_morocco', '+212 6 65 92 21 54'),
('phone_france', '+33 6 10 77 12 62'),
('email', 'contact@elmoussafir.com'),
('whatsapp_number', '212665922154'),
('company_name', 'Morchid Elmoussafir'),
('response_time', 'Répond généralement dans la journée'),
('copyright', 'Copyright © 2024 elmoussafir');

-- Insert service page content
INSERT INTO service_content (section_name, content) VALUES
('page_title', 'Service'),
('whatsapp_message', 'Salut, comment puis-je vous aider?'),
('company_name', 'Morchid Elmoussafir'),
('response_time', 'Répond généralement dans la journée'),
('whatsapp_number', '212665922154'),

-- Service 1 (Stockage)
('service1_title', 'Stockage des colis'),
('service1_details', 'Morchid Elmoussafir offre des solutions de stockage sécurisé pour vos colis, adaptées à vos besoins. Que ce soit pour une courte ou une longue durée, vos biens sont conservés dans des espaces surveillés pour garantir leur sécurité.'),
('service1_point1', 'Espaces sécurisés et surveillés.'),
('service1_point2', 'Flexibilité pour différents types de colis.'),
('service1_point3', 'Proximité des zones de transit stratégique.'),

-- Service 2 (Livraison)
('service2_title', 'Livraison des colis'),
('service2_details', 'Notre service de livraison des colis assure une expédition rapide et fiable entre le Maroc et la France. Nous respectons vos délais tout en vous offrant un suivi complet pour une tranquillité d''esprit totale.'),
('service2_point1', 'Respect strict des délais.'),
('service2_point2', 'Suivi en temps réel de vos envois.'),
('service2_point3', 'Couverture étendue entre le Maroc et la France.'),

-- Service 3 (Packaging)
('service3_title', 'Packaging des colis'),
('service3_details', 'Protégez vos envois avec notre service de packaging personnalisé, conçu pour garantir l''intégrité de vos biens durant le transport. Nous utilisons des matériaux adaptés et robustes pour chaque type de colis.'),
('service3_point1', 'Emballages solides et sécurisés.'),
('service3_point2', 'Options personnalisées selon vos besoins.'),
('service3_point3', 'Réduction significative des risques de dommages.'),

-- Service 4 (Ramassage)
('service4_title', 'Ramassage'),
('service4_details', 'Profitez d''un service de ramassage de colis pratique et rapide. Nous venons directement à votre domicile ou entreprise pour collecter vos envois, vous faisant gagner du temps et de l''énergie.'),
('service4_point1', 'Collecte à domicile ou en entreprise.'),
('service4_point2', 'Planification flexible selon votre emploi du temps.'),
('service4_point3', 'Équipe professionnelle et ponctuelle.'),

-- Service 5 (Contrat logistique)
('service5_title', 'Contrat logistique'),
('service5_details', 'Pour une gestion optimale de vos envois, nous proposons des contrats logistiques sur mesure. Nos solutions sont conçues pour répondre à vos besoins tout en optimisant vos coûts.'),
('service5_point1', 'Adapté à vos exigences spécifiques.'),
('service5_point2', 'Optimisation des coûts logistiques.'),
('service5_point3', 'Engagement de qualité et transparence.'),

-- Service 6 (Consultation)
('service6_title', 'Consultation'),
('service6_details', 'Obtenez des conseils personnalisés grâce à notre service de consultation expert. Nous vous assistons dans toutes vos démarches liées au transport et à la logistique entre le Maroc et la France.'),
('service6_point1', 'Conseils adaptés à vos besoins spécifiques.'),
('service6_point2', 'Assistance dans vos démarches administratives.'),
('service6_point3', 'Disponibilité et réactivité de notre équipe.');

-- Insert terms page content
INSERT INTO terms_content (section_name, content) VALUES
('page_title', 'Terms & services'),
('transport_title', 'Transport France Maroc'),
('transport_text', 'Chez Morchid Moussafir, nous facilitons vos échanges entre la France et le Maroc grâce à nos solutions de transport optimisées. De la gestion des marchandises à leur livraison, nous assurons un service rapide, sécurisé et fiable.'),

('partner_title', 'Partenaire Logistiques'),
('partner_text1', 'Avec Morchid Moussafir, vous bénéficiez d''un partenaire logistique engagé à simplifier vos opérations commerciales. Nous proposons des solutions sur mesure adaptées à vos besoins.'),
('partner_text2', 'Notre expertise garantit une coordination parfaite entre transport, stockage et distribution, pour une expérience fluide et efficace.'),

('why_us_title', 'Pourquoi El Moussafir'),
('why_us_text1', 'Morchid Moussafir est votre allié de confiance, grâce à notre savoir-faire et notre réseau étendu. Nous mettons un point d''honneur à offrir un service client exemplaire, pour un accompagnement sans failles.'),
('why_us_text2', 'Choisir Morchid Moussafir, c''est opter pour une expertise reconnue et des solutions innovantes qui répondent à vos défis logistiques.'),

('customs_title', 'Contrôle Douanier'),
('customs_text1', 'Nos services incluent une gestion rigoureuse des formalités douanières pour garantir la conformité de vos envois. Avec Morchid Moussafir, vos marchandises traversent les frontières en toute tranquillité.'),
('customs_text2', 'Nous veillons à simplifier vos démarches administratives et à accélérer le traitement douanier, pour un transport fluide et sans retard.'),

('whatsapp_message', 'Salut, comment puis-je vous aider?'),
('company_name', 'Morchid Elmoussafir'),
('response_time', 'Répond généralement dans la journée'),
('whatsapp_number', '212665922154');

-- Insert about page content
INSERT INTO about_content (section_name, content) VALUES
('page_title', 'A propos de nous'),
('why_title', 'Pourquoi Morchid El moussafir ?'),
('why_text', 'Morchid-El-moussafir vous propose un service de livraison de bagage à domicile entre la France et le Maroc. Le transporteur vient prendre en charge la valise, le colis ou le carton chez vous, effectue le Transport de bagage et fret entre la France et le Maroc, et livre à l''adresse indiquée.'),
('chairman_name', 'Morchid El moussafir'),
('chairman_title', 'Transporteur - Votre réussite est ma priorité.'),
('chairman_text1', 'Faites confiance à Morchid El Moussafir, votre allié pour un transport fluide, sécurisé et sans souci.'),
('chairman_text2', 'Tracabilité & suivi des envois en temps réel.'),
('chairman_text3', 'Respect des délais de livraison annoncés.'),
('video_title', 'Transport Fiable et Efficace pour Vos Colis'),
('video_text', 'Notre approche stratégique garantit un transport fiable et efficace pour votre entreprise. Nous mettons tout en œuvre pour optimiser chaque étape de la chaîne logistique, afin de vous offrir des solutions adaptées à vos besoins et des livraisons toujours ponctuelles.'),
('video_link', 'https://www.youtube.com/watch?v=your_video_id'),
('company_name', 'Morchid Elmoussafir'),
('response_time', 'Répond généralement dans la journée'),
('whatsapp_message', 'Salut, comment puis-je vous aider?'),
('whatsapp_number', '212665922154');

-- Insert contact page content
INSERT INTO contact_content (section_name, content) VALUES
('page_title', 'Contactez-nous'),
('form_title', 'Envoyez-nous un message'),
('contact_intro', 'Besoin de plus d''informations ou d''assistance ? Notre équipe est à votre écoute pour répondre à toutes vos questions.'),
('social_title', 'Suivez nous sur les réseaux'),
('facebook_url', '#'),
('twitter_url', '#'),
('instagram_url', '#'),
('linkedin_url', '#'),
('skype_url', '#'),
('whatsapp_message', 'Salut, comment puis-je vous aider?'),
('company_name', 'Morchid Elmoussafir'),
('response_time', 'Répond généralement dans la journée'),
('whatsapp_number', '212665922154'),
('address_title', 'Adresse de Nos Bureaux'),
('address_morocco_title', 'Maroc'),
('address_morocco', 'Casablanca, Hay Mohammadi'),
('phone_morocco', '+212 6 65 92 21 54'),
('email_morocco', 'contact@elmoussafir.com'),
('address_france_title', 'France'),
('address_france', '2, Place deis amouriers Sophia Antipolis'),
('phone_france', '+33 6 10 77 12 62'),
('email_france', 'contact@elmoussafir.com'),
('map_title', 'Position sur Google Maps'),
('copyright', 'Copyright © 2024 elmoussafir.'); 