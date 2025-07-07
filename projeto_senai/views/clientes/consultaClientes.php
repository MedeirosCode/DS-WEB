<?php if (!defined('CONSULTA_RENDERIZADA')) { define('CONSULTA_RENDERIZADA', true); } ?>
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
            --text-dark: #333;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg);
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
            padding: 8px;
            border-radius: 6px;
            border: 1px solid black;
            font-size: 1rem;
            width: 60%;
        }

        form.filtro button {
            background-color: var(--verde-medio);
            color: white;
            cursor: pointer;
            border: none;
            width: 20%;
            border: 1px solid black;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        form.filtro button:hover {
            background-color: var(--verde-escuro);
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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
            color: var(--text-dark);
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

        .no-results {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 40px;
            color: red;
        }

        @media (max-width: 480px) {
            .card img {
                height: 180px;
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
    <input 
        type="text" 
        name="busca" 
        placeholder="Digite um nome, uma cidade ou estado..." 
        value="<?= htmlspecialchars($_GET['busca'] ?? '', ENT_QUOTES) ?>">
    
    <button type="submit">🔍 Buscar</button>
</form>

<div class="cards-container">
    <?php if (empty($dados)): ?>
        <div class="no-results">Usuário não encontrado.</div>
    <?php else: ?>
        <?php foreach ($dados as $cliente): ?>
            <div class="card">
                <img src="/projeto_senai/photos/<?= htmlspecialchars($cliente['fotoCliente'] ?? 'user.png', ENT_QUOTES) ?>" 
                     alt="Foto de <?= htmlspecialchars($cliente['nomeCliente'], ENT_QUOTES) ?>">
                <div class="card-content">
                    <h3><?= htmlspecialchars($cliente['nomeCliente'], ENT_QUOTES) ?></h3>
                    <p>
                        <?= !empty($cliente['dataDesaparecimento']) 
                            ? date('d/m/Y', strtotime($cliente['dataDesaparecimento'])) 
                            : 'Data desconhecida' ?>
                    </p>
                    <a href="/projeto_senai/cliente/detalhes/<?= (int)$cliente['idCliente'] ?>">Ver Detalhes</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php if (isset($_SESSION['toast'])): ?>
<script>
    Swal.fire({
        icon: '<?= $_SESSION['toast']['type'] ?>',
        title: '<?= $_SESSION['toast']['title'] ?>',
        text: '<?= $_SESSION['toast']['message'] ?>',
        confirmButtonColor: '#3085d6'
    });
</script>
<?php unset($_SESSION['toast']); endif; ?>

</body>
</html>
