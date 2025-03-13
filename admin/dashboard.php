<?php
session_start();
require_once '../config/database.php';

// Function to get content from database
function getContent($pdo, $page_name, $section_name) {
    $table_name = $page_name . '_content';
    $stmt = $pdo->prepare("SELECT content FROM " . $table_name . " WHERE section_name = ?");
    $stmt->execute([$section_name]);
    $result = $stmt->fetch();
    return $result ? $result['content'] : '';
}

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Handle content update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section_name = $_POST['section_name'];
    $content = $_POST['content'];
    $table_name = $current_page . '_content';

    $stmt = $pdo->prepare("UPDATE {$table_name} SET content = ? WHERE section_name = ?");
    $stmt->execute([$content, $section_name]);

    $success = "Content updated successfully!";
}

// Fetch content for current page
$table_name = $current_page . '_content';
$stmt = $pdo->query("SELECT * FROM {$table_name} ORDER BY section_name");
$contents = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - El Moussafir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">El Moussafir Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'index' ? 'active' : ''; ?>" href="?page=index">
                            <i class="fas fa-home"></i> Home Page
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'service' ? 'active' : ''; ?>" href="?page=service">
                            <i class="fas fa-cogs"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'about' ? 'active' : ''; ?>" href="?page=about">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'terms' ? 'active' : ''; ?>" href="?page=terms">
                            <i class="fas fa-file-contract"></i> Terms
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
                        <i class="fas fa-eye"></i> View Page
                    </a>
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fas fa-edit"></i> Editing <?php echo ucfirst($current_page); ?> Page Content</h4>
                        <p>Here you can edit the content of the <?php echo $current_page; ?> page.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if ($current_page === 'contact'): ?>
                <!-- Contact Form Section -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-envelope"></i> Section Formulaire</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="section_name" value="form_title">
                                <div class="mb-3">
                                    <label class="form-label">Titre du formulaire:</label>
                                    <input type="text" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'form_title')); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                            </form>
                            <form method="POST" class="mt-3">
                                <input type="hidden" name="section_name" value="contact_intro">
                                <div class="mb-3">
                                    <label class="form-label">Texte d'introduction:</label>
                                    <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars(getContent($pdo, 'contact', 'contact_intro')); ?></textarea>
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
                                <input type="hidden" name="section_name" value="social_title">
                                <div class="mb-3">
                                    <label class="form-label">Titre des réseaux sociaux:</label>
                                    <input type="text" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'social_title')); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                            </form>

                            <!-- Social Media URLs -->
                            <div class="mt-4">
                                <h6 class="mb-3">Liens des réseaux sociaux</h6>
                                
                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="section_name" value="facebook_url">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'facebook_url')); ?>" placeholder="URL Facebook">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="section_name" value="twitter_url">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'twitter_url')); ?>" placeholder="URL Twitter">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="section_name" value="instagram_url">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'instagram_url')); ?>" placeholder="URL Instagram">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="section_name" value="linkedin_url">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'linkedin_url')); ?>" placeholder="URL LinkedIn">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>

                                <form method="POST" class="mb-3">
                                    <input type="hidden" name="section_name" value="skype_url">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                        <input type="url" class="form-control" name="content" value="<?php echo htmlspecialchars(getContent($pdo, 'contact', 'skype_url')); ?>" placeholder="URL Skype">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($contents as $content): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit"></i> 
                                    <?php echo ucfirst($content['section_name']); ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" name="section_name" value="<?php echo $content['section_name']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Content:</label>
                                        <textarea class="form-control" name="content" rows="4"><?php echo htmlspecialchars($content['content']); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Content
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