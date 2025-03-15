<?php
require_once __DIR__ . '/../config/database.php';

function getFooterContent($pdo, $nom_section) {
    $stmt = $pdo->prepare("SELECT contenu FROM index_content WHERE nom_section = ?");
    $stmt->execute([$nom_section]);
    $result = $stmt->fetch();
    return $result ? $result['contenu'] : '';
}
?>
<div class="footer-area section-padding" style="background-image: url(assets/img/bg/footer-bg.jpg); background-size:cover; background-position:center; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-xs-12">
                <div class="office_address">
                    <h4>Adresse de Nos Bureaux</h4>
                    <div class="single_address">
                        <h5>Maroc</h5>
                        <p><?php echo getFooterContent($pdo, 'adresse_maroc'); ?></p>
                        <p><?php echo getFooterContent($pdo, 'telephone_maroc'); ?></p>
                        <p><?php echo getFooterContent($pdo, 'email'); ?></p>
                    </div>
                    <div class="single_address">
                        <h5>France</h5>
                        <p><?php echo getFooterContent($pdo, 'adresse_france'); ?></p>
                        <p><?php echo getFooterContent($pdo, 'telephone_france'); ?></p>
                        <p><?php echo getFooterContent($pdo, 'email'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="map">
                    <h4>Position sur Google Maps</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13295.927930268164!2d-7.629346842768778!3d33.57311021533624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd8087dba555%3A0xf2f7a9f2e8d5673b!2sCasablanca%2C%20Morocco!5e0!3m2!1sen!2sma!4v1700000000000" height="450" style="border:0" allowfullscreen></iframe>
                </div>
                <p class="copyright"><?php echo getFooterContent($pdo, 'copyright'); ?></p>
            </div>
        </div>
    </div>
</div> 