<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="/projeto_senai/assets/css/style.css">
  <link rel="icon" href="../projeto_senai/photos/imagemdosite.png">
  <title>Desaparecidos Brasil - Perfil</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Botão de menu */
    #btn-toggle {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1001;
      background-color: #fff;
      color: #333;
      border: 1px solid #ccc;
      font-size: 24px;
      padding: 8px 12px;
      cursor: pointer;
      border-radius: 6px;
    }

    /* Sidebar */
    .sidebar-perfil {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100vh;
      background-color: #ffffff;
      color: #333;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
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
      font-weight: 600;
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
      color: #333;
      transition: background 0.2s, color 0.2s;
      font-size: 15px;
    }

    .sidebar-perfil a:hover {
      background-color: #f0f0f0;
    }

    .sidebar-perfil a.active {
      background-color: #e0e7ff;
      color: #1e40af;
      font-weight: bold;
    }

    .sidebar-footer {
      text-align: center;
      padding: 20px 0;
      font-size: 14px;
      color: #aaa;
    }

    .main-content {
      padding: 20px;
      transition: margin-left 0.3s ease;
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
    <div>
        <ul>
            <li><a href="/projeto_senai/home" class="<?= ($_GET['url'] == 'home') ? 'active' : '' ?>">Home</a></li>
            <li><a href="/projeto_senai/cliente" class="<?= ($_GET['url'] == 'cliente') ? 'active' : '' ?>">Clientes</a></li>
            <li class="link-usuario"><a href="/projeto_senai/desaparecido" class="<?= ($_GET['url'] == 'desaparecido') ? 'active' : '' ?>">Desaparecidos</a></li>
        </ul>
    </div>
  <!-- Botão -->
  <button id="btn-toggle">☰</button>

  <!-- Menu lateral -->
  <div class="sidebar-perfil" id="sidebar-perfil">
    <div>
      <h2>Meu Perfil</h2>
      <ul>
        <li><a href="/projeto_senai/perfil" class="<?= (isset($_GET['url']) && $_GET['url'] == 'perfil') ? 'active' : '' ?>">Editar Perfil</a></li>
        <li><a href="/projeto_senai/privacidade" class="<?= (isset($_GET['url']) && $_GET['url'] == 'privacidade') ? 'active' : '' ?>">Termos de Privacidade</a></li>
        <li><a href="/projeto_senai/desaparecido" class="<?= (isset($_GET['url']) && $_GET['url'] == 'desaparecido') ? 'active' : '' ?>">Adicionar Desaparecido</a></li>
        <li><a href="/projeto_senai/configuracoes" class="<?= (isset($_GET['url']) && $_GET['url'] == 'configuracoes') ? 'active' : '' ?>">Configurações</a></li>
        <li><a href="/projeto_senai/suporte" class="<?= (isset($_GET['url']) && $_GET['url'] == 'suporte') ? 'active' : '' ?>">Suporte</a></li>
        <li><a href="/projeto_senai/ajuda" class="<?= (isset($_GET['url']) && $_GET['url'] == 'ajuda') ? 'active' : '' ?>">Ajuda</a></li>
        <li><a href="/projeto_senai/feedback" class="<?= (isset($_GET['url']) && $_GET['url'] == 'feedback') ? 'active' : '' ?>">Deixar Feedback</a></li>
      </ul>
    </div>
    <div class="sidebar-footer">
      &copy; <?= date('Y') ?> ReAbraço Brasil
    </div>
  </div>

  <!-- Conteúdo -->
  <div class="main-content" id="main-content">
    <div class="container">
      <?php
        $url = $_GET['url'] ?? '/';
        require 'rotas.php';
      ?>
    </div>
  </div>

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
