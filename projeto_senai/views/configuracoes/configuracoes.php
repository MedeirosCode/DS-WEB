<?php extract($dados); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Configurações do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    :root {
  --bg-light: #f0fdf4;
  --bg-dark: #1e1e1e;
  --card-light: #ffffff;
  --card-dark: #2c2c2c;
  --input-dark: #3a3a3a;
  --text-dark: #f1f1f1;
  --text-light: #2e7d32;
  --accent: #4caf50;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: var(--bg-light);
  margin: 0;
  padding: 0;
  transition: background 0.3s ease;
}

html.dark-mode {
  background-color: var(--bg-dark);
  color: var(--text-dark);
}

.container {
  max-width: 700px;
  margin: 0 auto;
  background-color: var(--card-light);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: background 0.3s ease;
}

html.dark-mode .container {
  background-color: var(--card-dark);
  color: var(--text-dark);
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
  color: var(--text-light);
}

html.dark-mode label {
  color: var(--text-dark);
}

input[type="text"],
input[type="password"],
input[type="file"] {
  padding: 10px;
  border: 1px solid #c8e6c9;
  border-radius: 6px;
  width: 100%;
  background-color: #f9fff9;
  transition: background 0.3s ease, color 0.3s ease;
}

html.dark-mode input[type="text"],
html.dark-mode input[type="password"],
html.dark-mode input[type="file"] {
  background-color: var(--input-dark);
  color: var(--text-dark);
  border: 1px solid #555;
}

input[type="submit"]:disabled {
  background: #d0ecd3;
  cursor: not-allowed;
  opacity: 1;
  color: #2e7d32;
  border: 2px solid #66bb6a;
  border-radius: 8px;
}

input[type="submit"] {
  background: linear-gradient(135deg, #43a047, #66bb6a);
  color: white;
  padding: 12px 20px;
  border: 2px solid #66bb6a;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

input[type="submit"]:hover:enabled {
  background: linear-gradient(135deg, #2e7d32, #4caf50);
  transform: scale(1.02);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}

.button-edit {
  background: linear-gradient(135deg, #1b5e20, #2e7d32);
  color: white;
  padding: 12px 24px;
  border: 2px solid #66bb6a;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.button-edit:hover {
  background: linear-gradient(135deg, #004d20, #1b5e20);
  transform: scale(1.03);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}

.botoes-flex {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 20px;
  flex-wrap: wrap;
}

.botoes-flex input[type="submit"],
.botoes-flex .button-edit {
  flex: 1 1 45%;
  min-width: 140px;
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
            <img src="/projeto_senai/photos/<?= !empty($foto) ? htmlspecialchars($foto) : 'user.png' ?>" class="photo-user" alt="Imagem de perfil" id="previewImagem">
            <p>Foto de Perfil</p>
            <p>Recomenda-se uma imagem de dimensão de 200x200</p>
        </div>

        <form action="/projeto_senai/configuracoes" method="POST" name="formulario" enctype="multipart/form-data" onsubmit="return validarFormulario()">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome) ?>" readonly>

            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>" readonly>

            <label for="senha">Nova Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite nova senha (opcional)" readonly>

            <label for="foto">Foto de Perfil:</label>
            <input type="file" name="foto" id="foto" onchange="alteraImagem(this)" disabled>

            <div class="botoes-flex">
                <input type="submit" id="btnSalvar" value="Salvar Alterações" disabled>
                <button type="button" class="button-edit" onclick="habilitarEdicao()">Habilitar Edição</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let editavel = false;

    function habilitarEdicao() {
        const camposTexto = document.querySelectorAll("input[type='text'], input[type='password']");
        const campoFoto = document.getElementById("foto");
        const botaoEditar = document.querySelector(".button-edit");
        const botaoSalvar = document.getElementById("btnSalvar");

        editavel = !editavel;

        camposTexto.forEach(campo => campo.readOnly = !editavel);
        campoFoto.disabled = !editavel;
        botaoEditar.textContent = editavel ? "Desabilitar Edição" : "Habilitar Edição";
        botaoSalvar.disabled = !editavel;
    }

    function alteraImagem(input) {
        const img = document.getElementById('previewImagem');
        const file = input.files[0];
        if (file) {
            img.src = URL.createObjectURL(file);
        }
    }

    function validarFormulario() {
        if (!editavel) return false;

        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();
        const arquivo = document.getElementById("foto").files[0];

        const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        if (!emailValido) {
            Swal.fire("Erro!", "Informe um e-mail válido.", "error");
            return false;
        }

        if (senha.length > 0 && senha.length < 6) {
            Swal.fire("Erro!", "A senha deve ter pelo menos 6 caracteres.", "error");
            return false;
        }

        if (arquivo) {
            const tipoPermitido = ['image/jpeg', 'image/png', 'image/webp'];
            if (!tipoPermitido.includes(arquivo.type)) {
                Swal.fire("Erro!", "A imagem deve ser JPG, PNG ou WEBP.", "error");
                return false;
            }
            if (arquivo.size > 2 * 1024 * 1024) {
                Swal.fire("Erro!", "A imagem deve ter no máximo 2MB.", "error");
                return false;
            }
        }

        return true;
    }
</script>

<?php if (isset($_SESSION['toast']) && $_SESSION['toast']) {
    unset($_SESSION['toast']); ?>
    <script>
        Swal.fire({
            title: 'Sucesso!',
            text: 'Dados atualizados com sucesso.',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2e7d32'
        });
    </script>
<?php } ?>

</body>
</html>
