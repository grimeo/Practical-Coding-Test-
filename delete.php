<?php
require_once 'config/db.php';
require_once 'includes/functions.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    exit('Unauthorized');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    $id = $_POST['id'];
    
    // Prevent deleting the user currently logged in
    if ($id == $_SESSION['user_id']) {
        header("Location: index.php?msg=You cannot delete yourself!");
        exit();
    }

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php?msg=User deleted successfully");
    exit();
}