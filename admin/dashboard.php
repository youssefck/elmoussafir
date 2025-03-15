<?php
session_start();
require_once '../config/database.php';

// Function to get contenu from database
function getContent($pdo, $page_name, $nom_section) {
    $table_name = $page_name . '_content';
    $stmt = $pdo->prepare("SELECT contenu FROM " . $table_name . " WHERE nom_section = ?");
    $stmt->execute([$nom_section]);
    $result = $stmt->fetch();
    return $result ? $result['contenu'] : '';
}

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Handle contenu update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_section = $_POST['nom_section'];
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : (isset($_POST['content']) ? $_POST['content'] : '');
    $table_name = $current_page . '_content';

    $stmt = $pdo->prepare("UPDATE {$table_name} SET contenu = ? WHERE nom_section = ?");
    $stmt->execute([$contenu, $nom_section]);

    $success = "Contenu mis à jour avec succès!";
}

// Fetch contenu for current page
$table_name = $current_page . '_content';
$stmt = $pdo->query("SELECT * FROM {$table_name} ORDER BY nom_section");
$contenus = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin - El Moussafir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">El Moussafir Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'index' ? 'active' : ''; ?>" href="?page=index">
                            <i class="fas fa-home"></i> Page d'Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'service' ? 'active' : ''; ?>" href="?page=service">
                            <i class="fas fa-cogs"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'about' ? 'active' : ''; ?>" href="?page=about">
                            <i class="fas fa-info-circle"></i> À Propos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'terms' ? 'active' : ''; ?>" href="?page=terms">
                            <i class="fas fa-file-contract"></i> Conditions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'contact' ? 'active' : ''; ?>" href="?page=contact">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="../<?php echo $current_page; ?>.php" target="_blank">
                        <i class="fas fa-eye"></i> Voir la Page
                    </a>
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo str_replace("Content updated successfully!", "Contenu mis à jour avec succès !", $success); ?>
            </div>
        <?php endif; ?>

        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fas fa-edit"></i> Modification du Contenu de la Page <?php echo ucfirst($current_page); ?></h4>
                        <p>Ici vous pouvez modifier le contenu de la page <?php echo $current_page; ?>.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if ($current_page === 'service'): ?>
                <!-- Service Content -->
                <?php foreach ($contenus as $contenu): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit"></i> 
                                    <?php echo ucfirst($contenu['nom_section']); ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" name="nom_section" value="<?php echo $contenu['nom_section']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu:</label>
                                        <?php if (strpos($contenu['nom_section'], 'lien') !== false || strpos($contenu['nom_section'], 'link') !== false): ?>
                                            <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars($contenu['contenu']); ?>" placeholder="Entrer URL">
                                        <?php else: ?>
                                            <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars($contenu['contenu']); ?></textarea>
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Mettre à jour
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php elseif ($current_page === 'contact'): ?>
                <!-- Contact Form Section -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-envelope"></i> Section Formulaire</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="nom_section" value="titre_formulaire">
                                <div class="mb-3">
                                    <label class="form-label">Titre du formulaire:</label>
                                    <input type="text" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'titre_formulaire')); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                            </form>
                            <form method="POST" class="mt-3">
                                <input type="hidden" name="nom_section" value="intro_contact">
                                <div class="mb-3">
                                    <label class="form-label">Texte d'introduction:</label>
                                    <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars(getContent($pdo, 'contact', 'intro_contact')); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-share-alt"></i> Réseaux Sociaux</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="nom_section" value="titre_reseaux_sociaux">
                                <div class="mb-3">
                                    <label class="form-label">Titre des réseaux sociaux:</label>
                                    <input type="text" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'titre_reseaux_sociaux')); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                            </form>

                            <!-- Social Media URLs -->
                            <div class="mt-4">
                                <h6 class="mb-3">Liens des réseaux sociaux</h6>
                                
                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="nom_section" value="lien_facebook">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'lien_facebook')); ?>" placeholder="URL Facebook">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="nom_section" value="lien_twitter">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'lien_twitter')); ?>" placeholder="URL Twitter">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="nom_section" value="lien_instagram">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'lien_instagram')); ?>" placeholder="URL Instagram">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="nom_section" value="lien_linkedin">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'lien_linkedin')); ?>" placeholder="URL LinkedIn">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="nom_section" value="lien_skype">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'lien_skype')); ?>" placeholder="URL Skype">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($current_page === 'about'): ?>
                <?php foreach ($contenus as $contenu): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit"></i> 
                                    <?php echo ucfirst($contenu['nom_section']); ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" name="nom_section" value="<?php echo $contenu['nom_section']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu:</label>
                                        <?php if (strpos($contenu['nom_section'], 'link') !== false): ?>
                                            <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars($contenu['contenu']); ?>" placeholder="Enter URL">
                                        <?php else: ?>
                                            <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars($contenu['contenu']); ?></textarea>
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Mettre à jour le contenu
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php elseif ($current_page === 'terms'): ?>
                <?php foreach ($contenus as $contenu): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit"></i> 
                                    <?php echo ucfirst($contenu['nom_section']); ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" name="nom_section" value="<?php echo $contenu['nom_section']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu:</label>
                                        <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars($contenu['contenu']); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Mettre à jour le contenu
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($contenus as $contenu): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit"></i> 
                                    <?php echo ucfirst($contenu['nom_section']); ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" name="nom_section" value="<?php echo $contenu['nom_section']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu:</label>
                                        <?php if (strpos($contenu['nom_section'], 'lien') !== false || strpos($contenu['nom_section'], 'link') !== false): ?>
                                            <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars($contenu['contenu']); ?>" placeholder="Entrer URL">
                                        <?php else: ?>
                                            <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars($contenu['contenu']); ?></textarea>
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Mettre à jour
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 