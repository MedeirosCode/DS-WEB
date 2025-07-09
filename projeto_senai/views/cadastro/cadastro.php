<?php
$erro = $_SESSION['cadastro_erro'] ?? '';
$sucesso = $_SESSION['cadastro_sucesso'] ?? false;
unset($_SESSION['cadastro_erro'], $_SESSION['cadastro_sucesso']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f8e9;
      font-family: 'Segoe UI', sans-serif;
      color: #2e7d32;
    }

    .cadastro-container {
      max-width: 420px;
      margin: 0px auto;
      padding: 40px 30px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
      border: 3px solid #81c784;
      text-align: center;
    }

    .cadastro-container h2 {
      margin-bottom: 24px;
      color: #1b5e20;
    }

    #fotoPreview {
      width: 120px;
      height: 120px;
      margin: 0 auto 24px auto;
      border-radius: 50%;
      background-image: url('/projeto_senai/photos/user.png'); /* <-- caminho corrigido */
      background-size: cover;
      background-position: center center;
      border: 3px solid #81c784;
      box-shadow: 0 2px 8px rgba(76,175,80,0.3);
      transition: background-image 0.3s ease;
    }

    .cadastro-container label {
      display: block;
      margin-bottom: 16px;
      font-weight: 600;
      text-align: left;
    }

    .cadastro-container input[type="text"],
    .cadastro-container input[type="email"],
    .cadastro-container input[type="password"],
    .cadastro-container input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-top: 4px;
      border: 1px solid #c8e6c9;
      border-radius: 6px;
      font-size: 15px;
      background-color: #f9fbe7;
      box-sizing: border-box;
    }

    .cadastro-container input:focus {
      border-color: #66bb6a;
      outline: none;
      box-shadow: 0 0 0 2px rgba(102, 187, 106, 0.2);
    }

    .cadastro-container button {
      width: 100%;
      padding: 12px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }

    .cadastro-container button:hover {
      background-color: #388e3c;
    }

    @media (max-width: 480px) {
      .cadastro-container {
        margin: 40px 16px;
        padding: 30px 20px;
      }

      .cadastro-container h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

  <div class="cadastro-container">
    <h2>Crie sua conta</h2>

    <div id="fotoPreview" aria-label="Pré-visualização da foto de perfil"></div>

    <form id="formCadastro" method="POST" action="/projeto_senai/cadastro" enctype="multipart/form-data" novalidate>
      <label for="nome">Nome:
        <input type="text" name="nome" id="nome" required placeholder="Seu nome completo" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
      </label>

      <label for="email">Email:
        <input type="email" name="email" id="email" required placeholder="seuemail@exemplo.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </label>

      <label for="senha">Senha:
        <input type="password" name="senha" id="senha" required placeholder="Digite uma senha segura">
      </label>

      <label for="foto">Foto de perfil (opcional):
        <input type="file" name="foto" id="foto" accept="image/*" aria-describedby="fotoHelp">
      </label>
      <small id="fotoHelp" style="display:block; margin-bottom: 16px; color:#4caf50; font-size: 12px;">JPG, PNG, GIF até 2MB.</small>

      <button type="submit">Cadastrar</button>
    </form>
  </div>

  <script>
    const fotoInput = document.getElementById('foto');
    const fotoPreview = document.getElementById('fotoPreview');
    const imgDefault = '/projeto_senai/photos/user.png'; // Caminho corrigido

    function setDefaultImage() {
      fotoPreview.style.backgroundImage = `url('${imgDefault}')`;
    }

    setDefaultImage();

    fotoInput.addEventListener('change', () => {
      const file = fotoInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => {
          fotoPreview.style.backgroundImage = `url('${e.target.result}')`;
        };
        reader.readAsDataURL(file);
      } else {
        setDefaultImage();
      }
    });

    document.getElementById('formCadastro').addEventListener('submit', function (e) {
      const nome = document.getElementById('nome').value.trim();
      const email = document.getElementById('email').value.trim();
      const senha = document.getElementById('senha').value.trim();
      const foto = fotoInput.files[0];

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const extensoesValidas = ['jpg', 'jpeg', 'png', 'gif'];

      if (nome.length < 3) {
        e.preventDefault();
        return Swal.fire({
          icon: 'warning',
          title: 'Nome muito curto',
          text: 'Digite ao menos 3 letras para o nome.'
        });
      }

      if (!emailRegex.test(email)) {
        e.preventDefault();
        return Swal.fire({
          icon: 'warning',
          title: 'Email inválido',
          text: 'Por favor, insira um email válido.'
        });
      }

      if (senha.length < 6) {
        e.preventDefault();
        return Swal.fire({
          icon: 'warning',
          title: 'Senha muito curta',
          text: 'A senha deve ter pelo menos 6 caracteres.'
        });
      }

      if (foto) {
        const tamanho = foto.size;
        const extensao = foto.name.split('.').pop().toLowerCase();

        if (!extensoesValidas.includes(extensao)) {
          e.preventDefault();
          return Swal.fire({
            icon: 'warning',
            title: 'Formato inválido',
            text: 'A imagem deve ser JPG, JPEG, PNG ou GIF.'
          });
        }

        if (tamanho > 2 * 1024 * 1024) {
          e.preventDefault();
          return Swal.fire({
            icon: 'warning',
            title: 'Imagem muito grande',
            text: 'Tamanho máximo permitido: 2MB.'
          });
        }
      }
    });

    <?php if ($erro): ?>
      Swal.fire({
        icon: 'error',
        title: 'Erro no cadastro',
        text: '<?= addslashes($erro) ?>',
        confirmButtonColor: '#d33'
      });
    <?php elseif ($sucesso): ?>
      Swal.fire({
        icon: 'success',
        title: 'Cadastro realizado!',
        text: 'Você já pode fazer login.',
        confirmButtonColor: '#4caf50'
      }).then(() => {
        window.location.href = '/projeto_senai/login';
      });
    <?php endif; ?>
  </script>
</body>
</html>
