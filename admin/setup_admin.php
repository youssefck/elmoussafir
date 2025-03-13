<?php
require_once '../config/database.php';

// First, clear any existing admin users
$pdo->query("DELETE FROM admin_users");

// Create new admin user with proper password hash
$username = 'admin';
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $hash]);

echo "Admin user created successfully!<br>";
echo "Username: admin<br>";
echo "Password: admin123<br>";
echo "You can now delete this setup file for security.";
?> 