<?php
// Garante que a sessão foi iniciada
require_once __DIR__ . '/../includes/session.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
    header('Location: /my_pets/views/auth/login.php');
    exit;
}

// Captura o papel do usuário (admin, tutor, veterinario)
$role = $_SESSION['user_role'];
?>

<!-- Sidebar fixa à esquerda -->
<div style="width: 250px; height: 100vh; background-color: #2c3e50; color: white; position: fixed; top: 0; left: 0; padding: 20px;">
    <h2>My Pets 🐾</h2>
    <hr>

    <ul style="list-style: none; padding: 0; margin-top: 30px;">
        <?php if ($role === 'admin'): ?>
            <li><a href="/my_pets/views/admin/gerenciar_usuarios.php" style="color:white; text-decoration:none;">👤 Gerenciar Usuários</a></li><br>
            <li><a href="/my_pets/views/admin/gerenciar_pets.php" style="color:white; text-decoration:none;">🐶 Gerenciar Pets</a></li><br>
            <li><a href="/my_pets/views/admin/relatorios.php" style="color:white; text-decoration:none;">📊 Relatórios</a></li><br>
        <?php elseif ($role === 'tutor'): ?>
            <li><a href="/my_pets/views/tutor/meus_pets.php" style="color:white; text-decoration:none;">🐾 Meus Pets</a></li><br>
            <li><a href="/my_pets/views/tutor/agendar_consulta.php" style="color:white; text-decoration:none;">📅 Agendar Consultas</a></li><br>
            <li><a href="/my_pets/views/tutor/perfil.php" style="color:white; text-decoration:none;">👤 Perfil</a></li><br>
        <?php elseif ($role === 'vet'): ?>
            <li><a href="/my_pets/views/veterinario/consultas_agendadas.php" style="color:white; text-decoration:none;">🩺 Consultas Agendadas</a></li><br>
            <li><a href="/my_pets/views/veterinario/historico_medico.php" style="color:white; text-decoration:none;">📋 Histórico Médico</a></li><br>
            <li><a href="/my_pets/views/veterinario/perfil.php" style="color:white; text-decoration:none;">👤 Perfil</a></li><br>
        <?php endif; ?>
    </ul>

    <hr style="margin-top: 30px;">
    <a href="/my_pets/controllers/AuthController.php?logout=true" style="color:white; text-decoration:none;">🚪 Sair</a>
</div>
