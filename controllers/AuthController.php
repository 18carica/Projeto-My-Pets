<?php
require_once '../config/config.php';
require_once '../includes/session.php';

// Faz logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . '/views/auth/login.php');
    exit;
}

// Faz login
if (isset($_POST['login'])) {
    require_once '../models/User.php';

    // Conecta ao banco
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die('Erro de conexão: ' . $conn->connect_error);
    }

    $userModel = new User($conn);
    $user = $userModel->authenticate($_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        
        header('Location: ' . BASE_URL . '/index.php');
        exit;
    } else {
        // Volta pro login com erro
        $_SESSION['error'] = 'E-mail ou senha inválidos.';
        header('Location: ' . BASE_URL . '/views/auth/login.php');
        exit;
    }
}
?>
