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
    nom_section VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL
);

-- Create service content table
CREATE TABLE service_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_section VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL
);

-- Create about content table
CREATE TABLE about_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_section VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL
);

-- Create terms content table
CREATE TABLE terms_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_section VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL
);

-- Create contact content table
CREATE TABLE contact_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_section VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL
);

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password) VALUES ('admin', 'admin123');

-- Insert index page content
INSERT INTO index_content (nom_section, contenu) VALUES
('titre_principal_ligne1', 'Bienvenue sur morchid'),
('titre_principal_ligne2', 'El moussafir'),
('texte_hero', 'Avec plus de 25 ans d''expérience dans le domaine du transport, nous sommes fiers d''être le N°1 en matière de ramassage et de livraison à domicile entre La France Et le Maroc.'),
('stats_clients', '521'),
('stats_livraisons', '754'),
('stats_experts', '128'),
('texte_apropos', 'Il existe de nombreuses variations de services de transport, mais la majorité ont subi des modifications pour s''adapter aux besoins modernes. Notre mission est d''offrir des solutions qui vont au-delà de la simple logistique, en apportant un service personnalisé et des délais respectés, vous assurant une expérience de transport sans faille.'),
('intro_service', 'Des solutions logistiques personnalisées pour renforcer votre compétitivité.'),
('service_stockage', 'Vos colis seront stockés dans un warehouse en sécurité et dans les meilleures conditions.'),
('service_livraison', 'Vous vendez, et nous prenons en charge la livraison, comme si c''était livré par vous.'),
('service_emballage', 'Pour garantir la sécurité de vos colis nous vous proposons un service d''emballage sur mesure.'),
('service_ramassage', 'Nous nous occupons du ramassage de vos colis depuis vos locaux afin de faciliter vos livraisons'),
('service_contrat', 'Service logistique personnalisé, rapide et sécurisé, partout en Côte d''Azur et au Maroc.'),
('service_consultation', 'Besoin d''une gestion complète de votre chaîne d''approvisionnement? Contactez notre équipe!'),
('intro_engagement', 'Découvrez nos engagements pour un transport sécurisé et fiable. Transparence et qualité sont au cœur de chaque livraison.'),
('texte_transport', 'Nous assurons des livraisons rapides et sûres entre la France et le Maroc, avec un service personnalisé.'),
('texte_partenaire', 'Votre partenaire de confiance pour des solutions logistiques adaptées à vos besoins professionnels.'),
('texte_pourquoi', 'Choisissez-nous pour notre expertise et notre fiabilité, garantissant une satisfaction client maximale.'),
('texte_douane', 'Nous facilitons vos démarches douanières pour assurer un transport fluide et sans complications.'),
('date_depart', '18/09/2024'),
('date_arrivee', '25/02/2024'),
('info_depart', 'Nous proposons des départs réguliers entre le Maroc et la France pour répondre aux besoins de nos clients en matière de transport international.'),
('intro_temoignages', 'Nous sommes fiers de la satisfaction de nos clients. Chaque retour nous permet de continuer à améliorer nos services et de répondre aux attentes.'),
('temoignage1', 'Salam khoya, je tenais à te remercier pour ton professionnalisme tous mes cartons sont arrivés sans emcombre à Agadir même les cartons qui était fragile sont arrivés en très bon état merci beaucoup de ta gentillesse et de ta confiance c''est avec grand plaisir que je renouvellerai l''expérience car c''était une première avec toi barakalaofik allah i3aownek'),
('temoignage2', 'Merci Morchid pour ton sérieux, mes 2 vélos livrés sans encombre à l adresse indiquée. Bonne continuation et au plaisir d''une prochaine livraison.'),
('temoignage3', 'Merci, Mr elmoussafir, Colis bien reçu comme d''habitude. Personne très gentil, agréable et Professionnelle. Bon Ramadan et bon courage'),
('temoignage4', 'Salam, je tiens à vous remercier sincèrement pour la qualité de votre service. Toutes mes affaires sont arrivées en parfait état, y compris les objets fragiles, et ce, dans les délais. Votre professionnalisme et votre sérieux m''ont vraiment impressionnée.'),
('intro_compteur', 'Notre mission est d''assurer le transport sécurisé et fiable de vos colis, qu''il s''agisse de biens personnels ou commerciaux. Nous mettons notre expertise et notre engagement à votre service pour garantir des livraisons réussies et une satisfaction client optimale.'),
('message_whatsapp', 'Salut, comment puis-je vous aider?'),
('adresse_maroc', 'Casablanca, Hay Mohammadi'),
('adresse_france', '2, Place deis amouriers Sophia Antipolis'),
('telephone_maroc', '+212 6 65 92 21 54'),
('telephone_france', '+33 6 10 77 12 62'),
('email', 'contact@elmoussafir.com'),
('numero_whatsapp', '212665922154'),
('nom_entreprise', 'Morchid Elmoussafir'),
('temps_reponse', 'Répond généralement dans la journée'),
('copyright', 'Copyright © 2024 elmoussafir');

-- Insert service page content
INSERT INTO service_content (nom_section, contenu) VALUES
('titre_page', 'Service'),
('message_whatsapp', 'Salut, comment puis-je vous aider?'),
('nom_entreprise', 'Morchid Elmoussafir'),
('temps_reponse', 'Répond généralement dans la journée'),
('numero_whatsapp', '212665922154'),

-- Service 1 (Stockage)
('titre_service1', 'Stockage des colis'),
('details_service1', 'Morchid Elmoussafir offre des solutions de stockage sécurisé pour vos colis, adaptées à vos besoins. Que ce soit pour une courte ou une longue durée, vos biens sont conservés dans des espaces surveillés pour garantir leur sécurité.'),
('point1_service1', 'Espaces sécurisés et surveillés.'),
('point2_service1', 'Flexibilité pour différents types de colis.'),
('point3_service1', 'Proximité des zones de transit stratégique.'),

-- Service 2 (Livraison)
('titre_service2', 'Livraison des colis'),
('details_service2', 'Notre service de livraison des colis assure une expédition rapide et fiable entre le Maroc et la France. Nous respectons vos délais tout en vous offrant un suivi complet pour une tranquillité d''esprit totale.'),
('point1_service2', 'Respect strict des délais.'),
('point2_service2', 'Suivi en temps réel de vos envois.'),
('point3_service2', 'Couverture étendue entre le Maroc et la France.'),

-- Service 3 (Packaging)
('titre_service3', 'Packaging des colis'),
('details_service3', 'Protégez vos envois avec notre service de packaging personnalisé, conçu pour garantir l''intégrité de vos biens durant le transport. Nous utilisons des matériaux adaptés et robustes pour chaque type de colis.'),
('point1_service3', 'Emballages solides et sécurisés.'),
('point2_service3', 'Options personnalisées selon vos besoins.'),
('point3_service3', 'Réduction significative des risques de dommages.'),

-- Service 4 (Ramassage)
('titre_service4', 'Ramassage'),
('details_service4', 'Profitez d''un service de ramassage de colis pratique et rapide. Nous venons directement à votre domicile ou entreprise pour collecter vos envois, vous faisant gagner du temps et de l''énergie.'),
('point1_service4', 'Collecte à domicile ou en entreprise.'),
('point2_service4', 'Planification flexible selon votre emploi du temps.'),
('point3_service4', 'Équipe professionnelle et ponctuelle.'),

-- Service 5 (Contrat logistique)
('titre_service5', 'Contrat logistique'),
('details_service5', 'Pour une gestion optimale de vos envois, nous proposons des contrats logistiques sur mesure. Nos solutions sont conçues pour répondre à vos besoins tout en optimisant vos coûts.'),
('point1_service5', 'Adapté à vos exigences spécifiques.'),
('point2_service5', 'Optimisation des coûts logistiques.'),
('point3_service5', 'Engagement de qualité et transparence.'),

-- Service 6 (Consultation)
('titre_service6', 'Consultation'),
('details_service6', 'Obtenez des conseils personnalisés grâce à notre service de consultation expert. Nous vous assistons dans toutes vos démarches liées au transport et à la logistique entre le Maroc et la France.'),
('point1_service6', 'Conseils adaptés à vos besoins spécifiques.'),
('point2_service6', 'Assistance dans vos démarches administratives.'),
('point3_service6', 'Disponibilité et réactivité de notre équipe.');

-- Insert terms page content
INSERT INTO terms_content (nom_section, contenu) VALUES
('titre_page', 'Terms & services'),
('titre_transport', 'Transport France Maroc'),
('texte_transport', 'Chez Morchid Moussafir, nous facilitons vos échanges entre la France et le Maroc grâce à nos solutions de transport optimisées. De la gestion des marchandises à leur livraison, nous assurons un service rapide, sécurisé et fiable.'),

('titre_partenaire', 'Partenaire Logistiques'),
('texte_partenaire1', 'Avec Morchid Moussafir, vous bénéficiez d''un partenaire logistique engagé à simplifier vos opérations commerciales. Nous proposons des solutions sur mesure adaptées à vos besoins.'),
('texte_partenaire2', 'Notre expertise garantit une coordination parfaite entre transport, stockage et distribution, pour une expérience fluide et efficace.'),

('titre_pourquoi', 'Pourquoi El Moussafir'),
('texte_pourquoi1', 'Morchid Moussafir est votre allié de confiance, grâce à notre savoir-faire et notre réseau étendu. Nous mettons un point d''honneur à offrir un service client exemplaire, pour un accompagnement sans failles.'),
('texte_pourquoi2', 'Choisir Morchid Moussafir, c''est opter pour une expertise reconnue et des solutions innovantes qui répondent à vos défis logistiques.'),

('titre_douane', 'Contrôle Douanier'),
('texte_douane1', 'Nos services incluent une gestion rigoureuse des formalités douanières pour garantir la conformité de vos envois. Avec Morchid Moussafir, vos marchandises traversent les frontières en toute tranquillité.'),
('texte_douane2', 'Nous veillons à simplifier vos démarches administratives et à accélérer le traitement douanier, pour un transport fluide et sans retard.'),

('message_whatsapp', 'Salut, comment puis-je vous aider?'),
('nom_entreprise', 'Morchid Elmoussafir'),
('temps_reponse', 'Répond généralement dans la journée'),
('numero_whatsapp', '212665922154');

-- Insert about page content
INSERT INTO about_content (nom_section, contenu) VALUES
('titre_page', 'A propos de nous'),
('titre_pourquoi', 'Pourquoi Morchid El moussafir ?'),
('texte_pourquoi', 'Morchid-El-moussafir vous propose un service de livraison de bagage à domicile entre la France et le Maroc. Le transporteur vient prendre en charge la valise, le colis ou le carton chez vous, effectue le Transport de bagage et fret entre la France et le Maroc, et livre à l''adresse indiquée.'),
('nom_president', 'Morchid El moussafir'),
('titre_president', 'Transporteur - Votre réussite est ma priorité.'),
('texte_president1', 'Faites confiance à Morchid El Moussafir, votre allié pour un transport fluide, sécurisé et sans souci.'),
('texte_president2', 'Tracabilité & suivi des envois en temps réel.'),
('texte_president3', 'Respect des délais de livraison annoncés.'),
('titre_video', 'Transport Fiable et Efficace pour Vos Colis'),
('texte_video', 'Notre approche stratégique garantit un transport fiable et efficace pour votre entreprise. Nous mettons tout en œuvre pour optimiser chaque étape de la chaîne logistique, afin de vous offrir des solutions adaptées à vos besoins et des livraisons toujours ponctuelles.'),
('lien_video', 'https://www.youtube.com/watch?v=your_video_id'),
('nom_entreprise', 'Morchid Elmoussafir'),
('temps_reponse', 'Répond généralement dans la journée'),
('message_whatsapp', 'Salut, comment puis-je vous aider?'),
('numero_whatsapp', '212665922154');

-- Insert contact page content
INSERT INTO contact_content (nom_section, contenu) VALUES
('titre_page', 'Contactez-nous'),
('titre_formulaire', 'Envoyez-nous un message'),
('intro_contact', 'Besoin de plus d''informations ou d''assistance ? Notre équipe est à votre écoute pour répondre à toutes vos questions.'),
('titre_reseaux_sociaux', 'Suivez nous sur les réseaux'),
('lien_facebook', '#'),
('lien_twitter', '#'),
('lien_instagram', '#'),
('lien_linkedin', '#'),
('lien_skype', '#'),
('message_whatsapp', 'Salut, comment puis-je vous aider?'),
('nom_entreprise', 'Morchid Elmoussafir'),
('temps_reponse', 'Répond généralement dans la journée'),
('numero_whatsapp', '212665922154'),
('titre_adresse', 'Adresse de Nos Bureaux'),
('titre_adresse_maroc', 'Maroc'),
('adresse_maroc', 'Casablanca, Hay Mohammadi'),
('telephone_maroc', '+212 6 65 92 21 54'),
('email_maroc', 'contact@elmoussafir.com'),
('titre_adresse_france', 'France'),
('adresse_france', '2, Place deis amouriers Sophia Antipolis'),
('telephone_france', '+33 6 10 77 12 62'),
('email_france', 'contact@elmoussafir.com'),
('titre_carte', 'Position sur Google Maps'),
('copyright', 'Copyright © 2024 elmoussafir.'); 