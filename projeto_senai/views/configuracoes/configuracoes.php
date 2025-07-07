<?php extract($dados); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Configurações do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0fdf4;
            margin: 0;
            padding: 0;
        }

        /* Espaço para compensar o menu fixo do topo */
        .espaco-topo {
            height: 60px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .formulario {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .div-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo-user {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #a5d6a7;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .div-photo p {
            margin-top: 10px;
            color: #555;
            font-size: 0.9rem;
        }

        label {
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"] {
            padding: 10px;
            border: 1px solid #c8e6c9;
            border-radius: 6px;
            width: 100%;
            background-color: #f9fff9;
        }

        input[type="submit"] {
            background-color: #43a047;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2e7d32;
        }

        .div-button-edit {
            margin-top: 20px;
            text-align: center;
        }

        .button-edit {
            background-color: #2e7d32;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
        }

        .button-edit:hover {
            background-color: #1b5e20;
        }

        @media(max-width: 600px) {
            .photo-user {
                width: 140px;
                height: 140px;
            }

            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="espaco-topo"></div>

<div class="container">
    <div class="formulario">
        <div class="div-photo">
            <img src="<?= !empty($fotoUsuario) ? "/projeto_senai/photos/" . $fotoUsuario : "/projeto_senai/photos/user.png"; ?>" class="photo-user" alt="Imagem de perfil" id="previewImagem">
            <p>Recomenda-se uma imagem de dimensão de 200x200</p>
        </div>

        <form action="/projeto_senai/configuracoes" method="POST" name="formulario" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" name="nomeUsuario" id="nome" value="<?= isset($nomeUsuario) ? $nomeUsuario : ""; ?>" disabled>

            <label for="email">E-mail:</label>
            <input type="text" name="emailUsuario" id="email" value="<?= isset($emailUsuario) ? $emailUsuario : ""; ?>" disabled>

            <label for="senha">Senha:</label>
            <input type="password" name="senhaUsuario" id="senha" value="<?= isset($senhaUsuario) ? $senhaUsuario : ""; ?>" disabled>

            <label for="fotoUsuario">Foto de Perfil:</label>
            <input type="file" name="fotoUsuario" id="fotoUsuario" onchange="alteraImagem(this)" disabled>

            <input type="submit" value="Enviar">
        </form>
    </div>
</div>

<div class="div-button-edit">
    <button class="button-edit" onclick="habilitarEdicao()">Habilitar Edição</button>
</div>

<script>
    var verificador = 1;
    var texto = "Desabilitar edição";

    function habilitarEdicao() {
        var campos = document.querySelectorAll("input");
        verificador = verificador === 1 ? 0 : 1;
        texto = verificador === 1 ? "Habilitar edição" : "Desabilitar edição";
        document.querySelector(".button-edit").innerHTML = texto;

        campos.forEach(campo => {
            if (campo.type !== "submit") campo.disabled = verificador;
        });
    }

    function alteraImagem(imagem) {
        const img = document.getElementById('previewImagem');
        const file = imagem.files[0];
        if (file) img.src = URL.createObjectURL(file);
    }
</script>

<?php if (isset($sucesso) && $sucesso): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'Sucesso!',
        text: 'Dados atualizados com sucesso.',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#2e7d32'
    });
</script>
<?php endif; ?>

</body>
</html>
