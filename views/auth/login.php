<?php
require_once '../../includes/session.php';
$pageTitle = 'Login - My Pets';
require_once '../../includes/header.php';
?>

<h2>Login - Acesse sua conta</h2>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color:red;"><?= $_SESSION['error']; ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="../../controllers/AuthController.php" method="POST" class="login-form">
    <label>E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Entrar</button>
</form>

<?php require_once '../../includes/footer.php'; ?>
