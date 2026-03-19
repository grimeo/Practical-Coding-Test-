<?php
require_once 'config/db.php';
require_once 'includes/functions.php';
session_start();

// Auth Check
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$id = $_GET['id'] ?? null;
$errors = [];

// Fetch current user data
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if (!$user) {
        header("Location: index.php?msg=User not found");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

//Handle the Update (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
    die("CSRF token validation failed.");
}
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (empty($username) || empty($email)) {
        $errors[] = "Username and Email are required.";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $stmt->execute([$username, $email, $id]);
            
            // Update session if editing self
            if ($id == $_SESSION['user_id']) {
                $_SESSION['username'] = $username;
            }

            header("Location: index.php?msg=User updated successfully");
            exit();
        } catch (PDOException $e) {
            $errors[] = "Update failed: Username or Email might already be taken.";
        }
    }
}

include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit User Information</h4>
            </div>
            <div class="card-body">
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endforeach; ?>

                <form method="POST">
                    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token(); ?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= e($user['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?= e($user['email']) ?>" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>