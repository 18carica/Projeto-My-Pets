<?php
// /config/config.php

// Configurações do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_pets');      // Nome do seu banco de dados
define('DB_USER', 'root');         // Usuário do banco
define('DB_PASS', '');             // Senha do banco

// URL Base do Projeto
// Se o projeto estiver numa SUBPASTA (ex: http://localhost/my_pets/), coloque '/my_pets'
// Se estiver na raiz do servidor (ex: http://localhost/), deixe vazio ''
define('BASE_URL', '/my_pets'); 

// Configurações adicionais
// (Aqui você pode colocar configurações futuras como timezone, etc)
date_default_timezone_set('America/Sao_Paulo');
?>
