<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="icon" href="/projeto_senai/photos/imagemdosite.png">
  <title>Desaparecidos Brasil - Perfil</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #e8f5e9; /* fundo leve verde */
      color: #2e7d32; /* texto verde escuro */
    }

    #btn-toggle {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1001;
      background-color: #4caf50; /* verde vivo */
      color: white;
      border: none;
      font-size: 24px;
      padding: 8px 12px;
      cursor: pointer;
      border-radius: 6px;
      box-shadow: 0 2px 6px rgb(76 175 80 / 0.5);
      transition: background-color 0.3s ease;
    }

    #btn-toggle:hover {
      background-color: #388e3c; /* verde mais escuro no hover */
    }

    .sidebar-perfil {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100vh;
      background-color: #ffffff;
      color: #2e7d32; /* verde escuro */
      padding: 20px;
      box-shadow: 2px 0 10px rgb(46 125 50 / 0.15);
      transform: translateX(-100%);
      transition: transform 0.3s ease;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar-perfil.show {
      transform: translateX(0);
    }

    .sidebar-perfil h2 {
      margin-top: 60px;
      margin-bottom: 30px;
      font-size: 20px;
      font-weight: 700;
      color: #2e7d32;
    }

    .sidebar-perfil ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .sidebar-perfil li {
      display: block;
    }

    .sidebar-perfil a {
      display: block;
      padding: 12px 16px;
      border-radius: 8px;
      text-decoration: none;
      color: #2e7d32;
      transition: background 0.2s, color 0.2s;
      font-size: 15px;
      font-weight: 600;
    }

    .sidebar-perfil a:hover {
      background-color: #c8e6c9; /* verde claro */
      color: #1b5e20; /* verde escuro para contraste */
    }

    .sidebar-perfil a.active {
      background-color: #81c784; /* verde médio */
      color: #1b5e20;
      font-weight: 700;
      box-shadow: inset 3px 0 0 0 #388e3c;
    }

    .sidebar-footer {
      text-align: center;
      padding: 20px 0;
      font-size: 14px;
      color: #4caf50;
      font-weight: 600;
    }

    .main-content {
      padding: 20px;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
      background: #f1f8f1;
    }

    /* Menu topo centralizado */
    ul.menu-topo {
      display: flex;
      justify-content: center;  /* centraliza os itens */
      gap: 15px;
      list-style: none;
      padding: 10px;
      background: #d0f0d0; /* verde claro */
      margin: 0;
    }

    ul.menu-topo > li > a {
      color: #2e7d32; /* verde escuro */
      font-weight: 600;
      text-decoration: none;
      padding-bottom: 4px;
      transition: color 0.3s, border-bottom 0.3s;
    }

    ul.menu-topo > li > a:hover {
      color: #4caf50; /* verde mais vivo */
    }

    ul.menu-topo > li > a.active {
      color: #1b5e20; /* verde mais escuro */
      border-bottom: 3px solid #4caf50;
      font-weight: 700;
    }

    .main-content.shifted {
      margin-left: 260px;
    }

    @media (max-width: 768px) {
      .main-content.shifted {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Menu topo (exemplo) -->
  <div>
    <ul class="menu-topo">
      <li><a href="/projeto_senai/home" class="<?= ($_GET['url'] ?? '') === 'home' ? 'active' : '' ?>">Home</a></li>
      <li><a href="/projeto_senai/cliente" class="<?= ($_GET['url'] ?? '') === 'cliente' ? 'active' : '' ?>">Desaparecidos</a></li>
      <li><a href="/projeto_senai/videos" class="<?= ($_GET['url'] ?? '') === 'videos' ? 'active' : '' ?>">Vídeos</a></li>
    </ul>
  </div>

  <!-- Botão -->
  <button id="btn-toggle" aria-label="Abrir menu lateral">☰</button>

  <!-- Menu lateral -->
  <nav class="sidebar-perfil" id="sidebar-perfil" aria-label="Menu do perfil">
    <div>
      <h2>Meu Perfil</h2>
      <ul>
        <li><a href="/projeto_senai/desaparecido" class="<?= ($_GET['url'] ?? '') === 'desaparecidos' ? 'active' : '' ?>">Cadastrar Desaparecidos</a></li>
        <li><a href="/projeto_senai/termos" class="<?= ($_GET['url'] ?? '') === 'termos' ? 'active' : '' ?>">Termos de Privacidade</a></li>
        <li><a href="/projeto_senai/configuracoes" class="<?= ($_GET['url'] ?? '') === 'configuracoes' ? 'active' : '' ?>">Configurações</a></li>
        <li><a href="/projeto_senai/suporte" class="<?= ($_GET['url'] ?? '') === 'suporte' ? 'active' : '' ?>">Suporte</a></li>
        <li><a href="/projeto_senai/ajuda" class="<?= ($_GET['url'] ?? '') === 'ajuda' ? 'active' : '' ?>">Ajuda</a></li>
        <li><a href="/projeto_senai/feedback" class="<?= ($_GET['url'] ?? '') === 'feedback' ? 'active' : '' ?>">Deixar Feedback</a></li>
        <li><a href="/projeto_senai/nos" class="<?= ($_GET['url'] ?? '') === 'nos' ? 'active' : '' ?>">Quem somos nós</a></li>
      </ul>
    </div>
    <div class="sidebar-footer">
      &copy; <?= date('Y') ?> ReAbraço Brasil
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <main class="main-content" id="main-content">
    <div class="container">
      <?php
        $url = $_GET['url'] ?? '/';
        require_once 'rotas.php';
      ?>
    </div>
  </main>

  <!-- Script -->
  <script>
    const btnToggle = document.getElementById('btn-toggle');
    const sidebar = document.getElementById('sidebar-perfil');
    const mainContent = document.getElementById('main-content');

    btnToggle.addEventListener('click', () => {
      sidebar.classList.toggle('show');
      mainContent.classList.toggle('shifted');
    });
  </script>

</body>
</html>
