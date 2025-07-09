<?php
if (!isset($cliente)) {
    header('Location: /projeto_senai/cliente');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($cliente['nomeCliente']) ?> - Detalhes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
       :root {
    --verde-escuro: #81c784;
    --verde-medio: #66bb6a;
    --verde-claro: #388e3c;
    --fundo-escuro: #121212;
    --texto-claro: #e0e0e0;
    --cinza-medio: #2a2a2a;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background-color: var(--fundo-escuro);
    color: var(--texto-claro);
}

.cliente-container {
    max-width: 1100px;
    margin: auto;
    background-color: var(--cinza-medio);
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.cliente-header {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: center;
    margin-bottom: 30px;
}

.cliente-foto {
    width: 220px;
    height: 220px;
    border-radius: 12px;
    object-fit: cover;
    border: 4px solid var(--verde-claro);
    background-color: #333;
}

.sem-foto {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 220px;
    height: 220px;
    border-radius: 12px;
    border: 4px solid var(--verde-claro);
    font-size: 1rem;
    background-color: #444;
    color: #bbb;
}

.cliente-info {
    flex: 1;
    display: flex;
    flex-wrap: wrap;
    gap: 12px 30px;
}

.cliente-info h2 {
    width: 100%;
    font-size: 2.2rem;
    color: var(--verde-escuro);
    margin-bottom: 10px;
}

.info-item {
    width: calc(50% - 15px);
    font-size: 1rem;
}

.info-label {
    font-weight: bold;
    color: var(--verde-medio);
}

.cliente-relatos {
    margin-top: 40px;
}

.cliente-relatos h3 {
    margin-bottom: 15px;
    font-size: 1.4rem;
    color: var(--verde-escuro);
}

textarea {
    width: 100%;
    min-height: 130px;
    padding: 14px;
    font-size: 1rem;
    border: 2px solid var(--verde-claro);
    border-radius: 10px;
    background-color: #1e1e1e;
    color: var(--texto-claro);
    resize: vertical;
}

button {
    margin-top: 16px;
    padding: 12px 24px;
    font-size: 1rem;
    color: white;
    background-color: var(--verde-medio);
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: var(--verde-claro);
}

@media (max-width: 768px) {
    .cliente-header {
        flex-direction: column;
        align-items: center;
    }

    .cliente-foto,
    .sem-foto {
        width: 180px;
        height: 180px;
    }

    .cliente-info {
        text-align: center;
    }

    .info-item {
        width: 100%;
    }

    .cliente-info h2 {
        font-size: 1.8rem;
    }
}
    </style>
</head>
<body>
    <div class="cliente-container">
        <div class="cliente-header">
            <?php 
                $foto = $cliente['fotoCliente'] ?? '';
                $caminhoCompleto = __DIR__ . "/../../photos/" . $foto;
                if (!empty($foto) && file_exists($caminhoCompleto)): 
            ?>
                <img src="/projeto_senai/photos/<?= htmlspecialchars($foto) ?>" alt="Foto do Cliente" class="cliente-foto">
            <?php else: ?>
                <div class="sem-foto">Sem foto</div>
            <?php endif; ?>

            <div class="cliente-info">
                <h2><?= htmlspecialchars($cliente['nomeCliente']) ?></h2>
                <?php
                $campos = [
                    'Email' => 'emailCliente', 'Altura' => 'altura', 'Sexo' => 'sexo',
                    'Localização' => 'localizacao', 'Características' => 'caracteristicas',
                    'Raça' => 'raca', 'Data de Nascimento' => 'dataNascimento',
                    'Idade Aproximada' => 'idadeAproximada', 'Data de Desaparecimento' => 'dataDesaparecimento',
                    'Cidade' => 'cidade', 'Estado' => 'estado', 'País' => 'pais',
                    'Última Roupa Vista' => 'ultimaRoupaVista', 'Nome do Responsável' => 'nomeResponsavel',
                    'Telefone do Responsável' => 'telefoneResponsavel', 'Parentesco' => 'parentescoResponsavel',
                    'Observação' => 'observacao'
                ];
                foreach ($campos as $label => $key) {
                    echo "<div class='info-item'><span class='info-label'>{$label}:</span> " . htmlspecialchars($cliente[$key] ?? '') . "</div>";
                }
                ?>
            </div>
        </div>

        <div class="cliente-relatos">
            <h3>Relato</h3>
            <form method="POST" id="formRelato">
                <textarea name="relato" id="relato" placeholder="Adicionar informações..."><?= htmlspecialchars($cliente['relatos'] ?? '') ?></textarea>
                <button type="submit" id="submitBtn">Salvar Relato</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.getElementById('formRelato');
        const textarea = document.getElementById('relato');
        const originalRelato = textarea.value.trim();

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const relato = textarea.value.trim();

            if (!relato) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'Campo vazio',
                    text: 'Por favor, escreva um relato antes de enviar.',
                    confirmButtonColor: '#2e7d32'
                });
            }

            if (relato === originalRelato) {
                return Swal.fire({
                    icon: 'info',
                    title: 'Nenhuma alteração',
                    text: 'Você não alterou o conteúdo do relato.',
                    confirmButtonColor: '#2e7d32'
                });
            }

            await Swal.fire({
                title: 'Salvando...',
                html: 'Seu relato está sendo enviado!',
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Envio real do form usando fetch
            const formData = new FormData(form);
            const response = await fetch(location.href, {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
    Swal.fire({
        icon: 'success',
        title: 'Relato salvo!',
        text: 'Obrigado por contribuir com a causa.',
        confirmButtonColor: '#2e7d32'
    }).then(() => {
        window.location.href = '/projeto_senai/cliente';
    });
}
else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao salvar',
                    text: 'Tente novamente mais tarde.',
                    confirmButtonColor: '#d33'
                });
            }
        });
    </script>
</body>
</html>
