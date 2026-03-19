<?php
require_once 'config/db.php';
require_once 'includes/functions.php';
session_start();

// Session Timeout Check
$timeout_duration = 1800; // 30 minutes
if (isset($_SESSION['last_login']) && (time() - $_SESSION['last_login']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: auth/login.php?msg=Session expired");
    exit();
}
// Update "last activity" time to extend the session
$_SESSION['last_login'] = time();

// 2. Authentication Check 
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
// read operation
$stmt = $pdo->query("SELECT id, username, email, created_at FROM users");
$users = $stmt->fetchAll();

include 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>User Dashboard</h2>
    <div>
        <span class="me-3">Welcome, <strong><?= e($_SESSION['username']) ?></strong></span>
		<a href="create.php" class="btn btn-primary btn-sm me-2">+ Add New User</a>
        <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= e($_GET['msg']) ?></div>
<?php endif; ?>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= e($user['id']) ?></td>
                    <td><?= e($user['username']) ?></td>
                    <td><?= e($user['email']) ?></td>
                    <td><?= e($user['created_at']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="delete.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
							<input type="hidden" name="csrf_token" value="<?= generate_csrf_token(); ?>">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>