<?php 
require_once 'includes/header.php'; 
if (isset($_SESSION['user_id'])) { header('Location: dashboard.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'includes/db.php';
    require_once 'includes/functions.php';

    if (!validate_csrf_token($_POST['csrf_token'])) {
        die('Invalid CSRF token');
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'All fields required.';
    } else {
        $stmt = $pdo->prepare("SELECT id, password, role, banned FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && ($user['password'] === $password || password_verify($password, $user['password']))) {  // Support both plain and hashed
            if ($user['banned']) {
                $error = 'Account banned.';
            } else {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                session_regenerate_id();
                header('Location: dashboard.php');
                exit;
            }
        } else {
            $error = 'Invalid credentials.';
        }
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h2>Login</h2></div>
            <div class="card-body">
                <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
                <form id="login-form" class="needs-validation" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>