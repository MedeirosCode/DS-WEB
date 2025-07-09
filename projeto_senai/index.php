<?php
ob_start();
session_start();
require_once 'models/database.php';
$pdo = new Database();

if (!isset($_SESSION['usuario']) && isset($_COOKIE['usuario_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM login WHERE id = ?");
    $stmt->execute([$_COOKIE['usuario_id']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        $_SESSION['usuario'] = $usuario;
    } else {
        setcookie("usuario_id", "", time() - 3600, "/");
    }
}

$url = $_GET['url'] ?? '/';
define('CURRENT_URL', trim($url, '/'));

function isActive($route) {
    return CURRENT_URL === $route ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="/projeto_senai/photos/logo.jpeg">
  <title>Desaparecidos Brasil - Perfil</title>
  <script src="https://unpkg.com/lucide@latest"></script>
   <script>
    // Aplica dark-mode o mais cedo possível
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark-mode');
    }
  </script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
  :root {
    --bg-light: #e8f5e9;
    --bg-dark: #1e1e1e;
    --text-light: #2e7d32;
    --text-dark: #f1f1f1;
    --accent: #4caf50;
    --accent-dark: #388e3c;
    --input-dark: #2d2d2d;
    --card-dark: #2b2b2b;
    --border-dark: #444;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: var(--bg-light);
    color: var(--text-light);
    display: flex;
    flex-direction: column;
    transition: background 0.3s ease, color 0.3s ease;
  }

  html.dark-mode body {
    background: var(--bg-dark);
    color: var(--text-dark);
  }

  input, select, textarea {
    transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;
  }

  html.dark-mode input,
  html.dark-mode select,
  html.dark-mode textarea {
    background-color: var(--input-dark);
    color: var(--text-dark);
    border: 1px solid var(--border-dark);
  }

  html.dark-mode .form-wrapper,
  html.dark-mode .campo-form,
  html.dark-mode form,
  html.dark-mode .formulario-cadastro {
    background-color: var(--card-dark) !important;
    border-color: var(--border-dark) !important;
  }

  html.dark-mode .campo-form label {
    color: var(--text-dark);
  }

  html.dark-mode button,
  html.dark-mode .btn-enviar {
    background-color: var(--accent-dark);
    color: #fff;
  }

  html.dark-mode button:hover,
  html.dark-mode .btn-enviar:hover {
    background-color: #2e7d32;
  }

  .sidebar-perfil {
    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background-color: white;
    color: var(--text-light);
    padding: 20px;
    box-shadow: 2px 0 10px rgb(46 125 50 / 0.15);
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  html.dark-mode .sidebar-perfil {
    background-color: #2a2a2a;
    color: var(--text-dark);
  }

  .sidebar-perfil.show { transform: translateX(0); }

  .sidebar-perfil h2 { margin-top: 60px; margin-bottom: 30px; font-size: 20px; font-weight: 700; }

  .sidebar-perfil ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }

  .sidebar-perfil a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 16px;
    border-radius: 8px;
    text-decoration: none;
    color: inherit;
    transition: background 0.2s, color 0.2s;
    font-size: 15px;
    font-weight: 600;
  }

  .sidebar-perfil a:hover {
    background-color: #c8e6c9;
  }

  html.dark-mode .sidebar-perfil a:hover {
    background-color: #3a3a3a;
  }

  .sidebar-perfil a.active {
    background-color: #81c784;
    font-weight: 700;
    box-shadow: inset 3px 0 0 0 var(--accent-dark);
  }

  html.dark-mode .sidebar-perfil a.active {
    background-color: #4caf50;
  }

  .sidebar-footer {
    text-align: center;
    padding: 20px 0;
    font-size: 14px;
    font-weight: 600;
  }

  .main-content {
    padding: 20px;
    transition: margin-left 0.3s ease;
    min-height: 100vh;
  }

  .main-content.shifted { margin-left: 260px; }

  .menu-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgb(180, 238, 180);
    padding: 10px 30px 10px 60px;
    flex-wrap: wrap;
  }

  html.dark-mode .menu-container {
    background: #333;
  }

  .menu-centro {
    display: flex;
    justify-content: center;
    gap: 40px;
    list-style: none;
    margin: 0 auto;
    padding: 0;
    flex: 1;
  }

  .menu-centro li a {
    color: var(--text-light);
    font-weight: 600;
    text-decoration: none;
    padding-bottom: 4px;
    transition: color 0.3s, border-bottom 0.3s;
  }

  .menu-centro li a:hover {
    color: #4caf50;
  }

  .menu-centro li a.active {
    color: #1b5e20;
    border-bottom: 3px solid #4caf50;
    font-weight: 700;
  }

  html.dark-mode .menu-centro li a,
  html.dark-mode .menu-centro li a.active {
    color: var(--text-dark);
    border-bottom-color: #81c784;
  }

  .logo-menu img {
    height: 40px;
    width: 40px;
    border-radius: 8px;
  }

  #btn-toggle {
    position: fixed;
    top: 10px;
    left: 15px;
    z-index: 1001;
    background-color: var(--accent);
    color: white;
    border: none;
    font-size: 20px;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgb(76 175 80 / 0.5);
  }

  #btn-toggle:hover {
    background-color: var(--accent-dark);
  }

  .theme-switch {
    margin-top: 20px;
    padding: 10px;
    border-radius: 6px;
    background-color: var(--accent);
    color: white;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
  }

  .theme-switch:hover {
    background-color: var(--accent-dark);
  }

  @media (max-width: 768px) {
    .menu-container {
      flex-direction: column;
      align-items: center;
      padding: 10px 20px;
      gap: 10px;
    }

    .menu-centro {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      padding: 0;
      margin: 0;
      width: 100%;
    }

    .menu-centro li {
      list-style: none;
    }

    .menu-centro li a {
      display: inline-block;
      padding: 10px 14px;
      font-size: 0.95rem;
      border-radius: 6px;
      background-color: #ffffff;
      color: #2e7d32;
      font-weight: 600;
      border: 1px solid #c8e6c9;
      transition: background 0.3s ease, color 0.3s ease;
    }

    .menu-centro li a:hover {
      background-color: #c8e6c9;
      color: #1b5e20;
    }

    .logo-menu {
      order: -1;
      margin-bottom: 10px;
      display: flex;
      justify-content: center;
      width: 100%;
    }

    .logo-menu img {
      height: 36px;
      width: 36px;
      border-radius: 8px;
    }
  }
</style>

</head>
<body>
  <div class="menu-container">
    <ul class="menu-centro">
      <li><a href="/projeto_senai/home" class="<?= isActive('home') ?>">Home</a></li>
      <li><a href="/projeto_senai/cliente" class="<?= isActive('cliente') ?>">Desaparecidos</a></li>
      <li><a href="/projeto_senai/encontrados" class="<?= isActive('encontrados') ?>">Encontrados</a></li>

      <li><a href="/projeto_senai/videos" class="<?= isActive('videos') ?>">Vídeos</a></li>
      <?php if (!isset($_SESSION['usuario'])): ?>
        <li><a href="/projeto_senai/login">Entrar</a></li>
        <li><a href="/projeto_senai/cadastro">Cadastrar</a></li>
      <?php else: ?>
        <?php if ($_SESSION['usuario']['tipo'] === 'gerente'): ?>
          <li><a href="/projeto_senai/admin">Painel Gerente</a></li>
        <?php endif; ?>
      <?php endif; ?>
    </ul>
    <div class="logo-menu">
      <a href="/projeto_senai/home"><img src="/projeto_senai/photos/logo.jpeg" alt="Logo"></a>
    </div>
  </div>

  <button id="btn-toggle">☰</button>

  <nav class="sidebar-perfil" id="sidebar-perfil">
    <div>
      <?php if (isset($_SESSION['usuario'])): ?>
        <h2>Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></h2>
        <ul>
          <li><a href="/projeto_senai/desaparecidos" class="<?= isActive('desaparecidos') ?>">Cadastrar Desaparecidos</a></li>
          <li><a href="/projeto_senai/termos" class="<?= isActive('termos') ?>">Termos de Privacidade</a></li>
          <li><a href="/projeto_senai/configuracao" class="<?= isActive('configuracao') ?>">Configurações</a></li>
          <li><a href="/projeto_senai/suporte" class="<?= isActive('suporte') ?>">Suporte</a></li>
          <li><a href="/projeto_senai/ajuda" class="<?= isActive('ajuda') ?>">Ajuda</a></li>
          <li><a href="/projeto_senai/feedback" class="<?= isActive('feedback') ?>">Deixar Feedback</a></li>
          <li><a href="/projeto_senai/nos" class="<?= isActive('nos') ?>">Quem somos nós</a></li>
          <li><a href="/projeto_senai/logout">Sair</a></li>
        </ul>
      <?php else: ?>
        <h2>Bem-vindo!</h2>
        <div style="background-color: #fff3cd; color: #856404; padding: 15px; border-radius: 6px; font-size: 14px;">
          <strong>Você não está logado.</strong><br>
          Para acessar as funcionalidades completas do sistema, por favor faça login.
          <a href="/projeto_senai/login" style="display: inline-block; margin-top: 10px; padding: 8px 12px; background-color: #4caf50; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Fazer Login</a>
        </div>
      <?php endif; ?>
      <div class="theme-switch" id="btn-dark">🌙 Modo Escuro</div>
    </div>
    <div class="sidebar-footer">&copy; <?= date('Y') ?> ReAbraço Brasil</div>
  </nav>

  <main class="main-content" id="main-content">
    <div class="container">
      <?php require_once 'rotas.php'; ?>
    </div>
  </main>

  <script>
    const btnToggle = document.getElementById('btn-toggle');
    const sidebar = document.getElementById('sidebar-perfil');
    const mainContent = document.getElementById('main-content');
    const btnDark = document.getElementById('btn-dark');

    btnToggle.addEventListener('click', () => {
      const isOpen = sidebar.classList.toggle('show');
      mainContent.classList.toggle('shifted', isOpen);
      btnToggle.textContent = isOpen ? '✖' : '☰';
    });

    btnDark.addEventListener('click', () => {
  const html = document.documentElement;
  const isDark = html.classList.toggle('dark-mode');
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
  btnDark.textContent = isDark ? '☀️ Modo Claro' : '🌙 Modo Escuro';
});

window.onload = () => {
  lucide.createIcons();
  if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark-mode');
    if (btnDark) btnDark.textContent = '☀️ Modo Claro';
  }
};

    
  </script>
</body>
</html>
