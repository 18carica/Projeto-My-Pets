<?php
// Carrega as configurações básicas
require_once 'config/config.php';

// Garante que o usuário esteja logado
require_once 'includes/session.php';

// Se não estiver logado, manda para a tela de login
if (!isset($_SESSION['user_id'])) {
    header('Location: views/auth/login.php');
    exit;
}

// Define o título da página
$pageTitle = 'Dashboard - My Pets';

// Inclui o cabeçalho padrão (HTML head, CSS etc.)
require_once 'includes/header.php';

// Inclui a barra lateral (menu), que se adapta ao tipo de usuário
require_once 'includes/sidebar.php';
?>

<!-- Área principal da página -->
<div style="margin-left: 250px; padding: 20px;">
    <h2>Bem-vindo(a) à Dashboard, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h2>
    <p>Você está logado como: <strong><?= htmlspecialchars($_SESSION['user_role']) ?></strong></p>

    <!-- Conteúdo específico para cada tipo de usuário -->
    <div class="dashboard-content">
        <?php if ($_SESSION['user_role'] === 'admin'): ?>
            <p>🔧 Área de Administração: Aqui você pode gerenciar usuários e pets.</p>
        <?php elseif ($_SESSION['user_role'] === 'tutor'): ?>
            <p>🐾 Área do Tutor: Veja seus pets e agende consultas.</p>
        <?php elseif ($_SESSION['user_role'] === 'veterinario'): ?>
            <p>🩺 Área do Veterinário: Visualize consultas e histórico médico.</p>
        <?php else: ?>
            <p>⚠️ Tipo de usuário desconhecido.</p>
        <?php endif; ?>
    </div>
</div>

<?php
// Inclui o rodapé padrão
require_once 'includes/footer.php';
?>
