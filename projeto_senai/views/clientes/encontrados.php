<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!defined('ENCONTRADOS_RENDERIZADO')) { define('ENCONTRADOS_RENDERIZADO', true); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Pessoas Encontradas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f1fdf3;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      color: #2e7d32;
      margin: 40px 0 10px;
    }

    form.filtro {
      max-width: 800px;
      margin: 0 auto 30px;
      display: flex;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      padding: 0 10px;
      gap: 10px;
    }

    form.filtro input {
      padding: 10px;
      border-radius: 6px;
      border: 1px solid black;
      font-size: 1rem;
      flex: 1;
      min-width: 0;
    }

    form.filtro button {
      background-color: #43a047;
      color: white;
      cursor: pointer;
      border: 1px solid black;
      border-radius: 6px;
      font-size: 1rem;
      padding: 10px 16px;
      white-space: nowrap;
      transition: background 0.3s ease;
    }

    form.filtro button:hover {
      background-color: #2e7d32;
    }

    .cards-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 10px 40px;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      width: 100%;
      max-width: 280px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      overflow: hidden;
      transition: 0.3s;
    }

    .card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .card-content {
      padding: 16px;
    }

    .card h3 {
      margin: 0;
      font-size: 1.25rem;
      color: #2e7d32;
    }

    .card p {
      font-size: 0.95rem;
      margin-top: 8px;
      color: #555;
    }

    .card a {
      display: inline-block;
      margin-top: 10px;
      background-color: #43a047;
      color: #fff;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .card a:hover {
      background-color: #2e7d32;
    }

    .no-results {
      text-align: center;
      font-size: 1.2rem;
      margin-top: 40px;
      color: red;
      width: 100%;
    }

    /* Responsivo para telas pequenas */
    @media (max-width: 768px) {
      form.filtro {
        flex-wrap: wrap;
      }
      form.filtro input,
      form.filtro button {
        width: 100%;
        flex: none;
      }
    }

    @media (max-width: 480px) {
      .card img {
        height: 350px;
      }
      h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

<h1>Pessoas Encontradas</h1>

<form method="GET" class="filtro">
  <input type="text" name="buscar_encontrado" placeholder="Digite nome, cidade ou estado..."
         value="<?= htmlspecialchars($_GET['buscar_encontrado'] ?? '') ?>">
  <button type="submit">🔍 Buscar</button>
</form>

<div class="cards-container">
  <?php if (empty($encontrados)): ?>
    <div class="no-results">Nenhuma pessoa encontrada com esse critério.</div>
  <?php else: ?>
    <?php foreach ($encontrados as $pessoa): ?>
      <div class="card">
        <img src="/projeto_senai/photos/<?= htmlspecialchars($pessoa['fotoCliente'] ?? 'user.png') ?>" alt="Pessoa Encontrada">
        <div class="card-content">
          <h3><?= htmlspecialchars($pessoa['nomeCliente']) ?></h3>
          <p><strong>Encontrado em:</strong> <?= date('d/m/Y H:i', strtotime($pessoa['encontrado_em'])) ?></p>
          <p><strong>Cidade:</strong> <?= htmlspecialchars($pessoa['cidade']) ?></p>
          <p><strong>Estado:</strong> <?= htmlspecialchars($pessoa['estado']) ?></p>
          <a href="/projeto_senai/cliente/detalhes/<?= (int)$pessoa['idCliente'] ?>">Ver Detalhes</a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php if (isset($_SESSION['toast_encontrado'])): ?>
<script>
Swal.fire({
    icon: '<?= $_SESSION['toast_encontrado']['type'] ?>',
    title: '<?= $_SESSION['toast_encontrado']['title'] ?>',
    text: '<?= $_SESSION['toast_encontrado']['message'] ?>',
    confirmButtonColor: '#43a047'
});
</script>
<?php unset($_SESSION['toast_encontrado']); endif; ?>

</body>
</html>
