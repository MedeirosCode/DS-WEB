<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!defined('CONSULTA_RENDERIZADA')) { define('CONSULTA_RENDERIZADA', true); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Desaparecidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
:root {
  --verde-escuro: #2e7d32;
  --verde-medio: #43a047;
  --white: #fff;
  --bg: #f1fdf3;
  --text: #333;
  --input-border: #ccc;
  --bg-dark: #1e1e1e;
  --text-dark: #f1f1f1;
  --input-dark: #2d2d2d;
  --card-dark: #2b2b2b;
  --border-dark: #444;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: var(--bg);
  color: var(--text);
  margin: 0;
  padding: 0;
  transition: background 0.3s ease, color 0.3s ease;
}

html.dark-mode body {
  background: var(--bg-dark);
  color: var(--text-dark);
}

h1 {
  text-align: center;
  color: var(--verde-escuro);
  margin: 30px 0 15px;
}

html.dark-mode h1 {
  color: var(--text-dark);
}

form.filtro {
  max-width: 600px;
  margin: 0 auto 30px;
  padding: 6px 10px;
  display: flex;
  gap: 8px;
  align-items: center;
  background: var(--white);
  border-radius: 8px;
}

html.dark-mode form.filtro {
  background: var(--card-dark);
}

form.filtro input {
  flex: 1;
  padding: 8px;
  font-size: 1rem;
  border-radius: 6px;
  border: 1px solid var(--input-border);
  background: var(--white);
  color: var(--text);
}

html.dark-mode form.filtro input {
  background: var(--input-dark);
  color: var(--text-dark);
  border: 1px solid var(--border-dark);
}

.btn-verde {
  padding: 6px 14px;
  font-size: 0.9rem;
  border: none;
  border-radius: 6px;
  background: var(--verde-medio);
  color: var(--white);
  cursor: pointer;
  transition: background 0.3s ease;
  white-space: nowrap;
}

.btn-verde:hover {
  background: var(--verde-escuro);
}

form.filtro > .btn-verde {
  margin-left: 6px;
}

.formEncontrado {
  margin-top: 8px;
}

.cards-container {
  max-width: 1200px;
  margin: 0 auto 40px;
  padding: 0 10px;
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
}

.card {
  background: var(--white);
  width: 100%;
  max-width: 280px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: background 0.3s ease;
}

html.dark-mode .card {
  background: var(--card-dark);
}

.card img {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.card-content {
  padding: 16px;
  background: var(--white);
  transition: background-color 0.3s ease;
}

html.dark-mode .card-content {
  background: var(--card-dark);
  color: var(--text-dark);
}

.card h3 {
  margin: 0;
  font-size: 1.25rem;
  color: var(--verde-escuro);
}

html.dark-mode .card h3 {
  color: var(--text-dark);
}

.card p {
  font-size: 0.95rem;
  margin: 8px 0 0;
  color: #555;
}

html.dark-mode .card p {
  color: #ccc;
}

.card a {
  display: inline-block;
  margin-top: 10px;
  padding: 6px 12px;
  font-size: 0.9rem;
  text-decoration: none;
  background: var(--verde-medio);
  color: var(--white);
  border-radius: 6px;
}

.card a:hover {
  background: var(--verde-escuro);
}

.no-results {
  width: 100%;
  text-align: center;
  margin-top: 40px;
  font-size: 1.2rem;
  color: red;
}

@media (max-width: 768px) {
  form.filtro {
    flex-wrap: wrap;
  }
  form.filtro input,
  form.filtro button,
  .formEncontrado button {
    width: 100%;
    margin-left: 0 !important;
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

<h1>Pessoas Desaparecidas</h1>

<form method="GET" class="filtro">
  <input type="text" name="busca_desaparecido" placeholder="Digite um nome, cidade ou estado..."
         value="<?= htmlspecialchars($_GET['busca_desaparecido'] ?? '', ENT_QUOTES) ?>">
  <button type="submit" class="btn-verde">🔍 Buscar</button>
</form>

<div class="cards-container">
    <?php if (empty($dados)): ?>
        <div class="no-results">Usuário não encontrado.</div>
    <?php else: ?>
        <?php foreach ($dados as $cliente): ?>
            <?php
                $imagem = $cliente['fotoCliente'] ?? 'user.png';
                $mostrar = empty($cliente['encontrado_em']);
            ?>
            <?php if ($mostrar): ?>
            <div class="card">
                <img src="/projeto_senai/photos/<?= htmlspecialchars($imagem, ENT_QUOTES) ?>" 
                     alt="Foto de <?= htmlspecialchars($cliente['nomeCliente'], ENT_QUOTES) ?>">

                <div class="card-content">
                    <h3><?= htmlspecialchars($cliente['nomeCliente'], ENT_QUOTES) ?></h3>
                    <p><?= !empty($cliente['dataDesaparecimento']) 
                            ? date('d/m/Y', strtotime($cliente['dataDesaparecimento'])) 
                            : 'Data desconhecida' ?></p>
                    <a href="/projeto_senai/cliente/detalhes/<?= (int)$cliente['idCliente'] ?>">Ver Detalhes</a>

                    <?php if (isset($_SESSION['usuario']['id']) && $_SESSION['usuario']['id'] == $cliente['usuario_id']): ?>
                        <form method="POST" action="/projeto_senai/cliente/encontrado/<?= (int)$cliente['idCliente'] ?>" class="formEncontrado">
                            <button type="submit" class="btn-verde">Pessoa Encontrada</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
document.querySelectorAll('.formEncontrado').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você quer marcar essa pessoa como encontrada?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, confirmar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#43a047',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>

<?php if (isset($_SESSION['toast'])): ?>
<script>
Swal.fire({
    icon: '<?= $_SESSION['toast']['type'] ?>',
    title: '<?= $_SESSION['toast']['title'] ?>',
    text: '<?= $_SESSION['toast']['message'] ?>',
    confirmButtonColor: '#43a047'
});
</script>
<?php unset($_SESSION['toast']); endif; ?>

</body>
</html>
