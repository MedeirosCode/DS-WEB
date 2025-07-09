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
  --verde-claro: #c8e6c9;
  --bg: #f0fdf4;
  --white: #ffffff;
  --cinza-borda: #cccccc;
  --vermelho: #dc3545;
  --vermelho-hover: #b71c1c;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: var(--bg);
  color: #333;
}

h1 {
  text-align: center;
  margin: 40px 0 20px;
  color: var(--verde-escuro);
  font-size: 2.5rem;
}

form.filtro {
  max-width: 800px;
  margin: 0 auto 30px;
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  justify-content: center;
}

form.filtro input {
  padding: 10px;
  border-radius: 8px;
  border: 1px solid var(--cinza-borda);
  font-size: 1rem;
  width: 60%;
  background-color: var(--white);
  color: #333;
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  transition: border 0.3s, box-shadow 0.3s;
}

form.filtro input:focus {
  outline: none;
  border-color: var(--verde-medio);
  box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

form.filtro button {
  background-color: var(--verde-medio);
  color: white;
  cursor: pointer;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  width: 20%;
  font-size: 1rem;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

form.filtro button:hover {
  background-color: var(--verde-escuro);
  transform: scale(1.03);
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
  background-color: var(--white);
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  width: 100%;
  max-width: 280px;
  position: relative;
}

.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.card img {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.card-content {
  padding: 16px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card h3 {
  font-size: 1.25rem;
  color: var(--verde-escuro);
  margin-bottom: 6px;
}

.card p {
  color: #555;
  margin-bottom: 12px;
  font-size: 0.95rem;
}

.card a {
  align-self: flex-start;
  padding: 8px 16px;
  background: var(--verde-medio);
  color: white;
  text-decoration: none;
  border-radius: 6px;
  font-size: 0.9rem;
  transition: background-color 0.3s ease;
}

.card a:hover {
  background: var(--verde-escuro);
}

.card form {
  margin-top: 8px;
}

.card button {
  padding: 8px 16px;
  font-size: 0.9rem;
  border: none;
  background-color: var(--vermelho);
  color: #fff;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.card button:hover {
  background-color: var(--vermelho-hover);
  transform: scale(1.02);
}

.no-results {
  text-align: center;
  font-size: 1.2rem;
  margin-top: 40px;
  color: red;
}

@media (max-width: 768px) {
  form.filtro input,
  form.filtro button {
    width: 100%;
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
  <button type="submit">🔍 Buscar</button>
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
                            <button type="submit">Pessoa Encontrada</button>
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
