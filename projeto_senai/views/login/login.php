<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  .login-container {
    max-width: 400px;
    margin: 80px auto;
    background: #e8f5e9;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
    font-family: 'Segoe UI', sans-serif;
    color: #2e7d32;

    /* borda verde médio arredondada */
    border: 3px solid #81c784;
  }

  .login-container h2 {
    text-align: center;
    margin-bottom: 24px;
    color: #1b5e20;
  }

  .login-container label {
    display: block;
    margin-bottom: 15px;
    font-weight: 600;
  }

  .login-container input[type="email"],
  .login-container input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    border: 1px solidrgb(0, 255, 8);
    border-radius: 6px;
    font-size: 15px;
    margin-top: 4px;
    background-color: #ffffff;
  }

  .login-container input:focus {
    border-color: #4caf50;
    outline: none;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
  }

  .login-container button {
    width: 100%;
    padding: 12px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .login-container button:hover {
    background-color: #388e3c;
  }

  .login-container p {
    text-align: center;
    margin-top: 16px;
    font-size: 14px;
  }

  .login-container a {
    color: #2e7d32;
    text-decoration: none;
    font-weight: 600;
  }

  .login-container a:hover {
    text-decoration: underline;
  }

  @media (max-width: 480px) {
    .login-container {
      margin: 40px 16px;
      padding: 30px 20px;
    }

    .login-container h2 {
      font-size: 22px;
    }
  }
</style>

<div class="login-container">
  <h2>Entrar na sua conta</h2>

  <form method="POST" action="/projeto_senai/login">
    <label>
      Email:
      <input type="email" name="email" required placeholder="Digite seu email">
    </label>

    <label>
      Senha:
      <input type="password" name="senha" required placeholder="Digite sua senha">
    </label>

    <button type="submit">Entrar</button>
  </form>

  <p>Não tem conta? <a href="/projeto_senai/cadastro">Cadastre-se aqui</a></p>
  <div style="text-align:center; margin-top: 10px;">
    <a href="/projeto_senai/esqueci" style="color:#388e3c; font-size: 14px;">Esqueceu sua senha?</a>
  </div>
</div>

<!-- SweetAlert para erro -->
<?php if (!empty($erro)): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Erro ao entrar',
      text: '<?= addslashes($erro) ?>',
      confirmButtonColor: '#4caf50'
    });
  </script>
<?php endif; ?>

<!-- SweetAlert para sucesso -->
<?php if (!empty($sucesso)): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Login realizado',
      text: '<?= addslashes($sucesso) ?>',
      confirmButtonColor: '#4caf50'
    }).then(() => {
      window.location.href = '/projeto_senai/home';
    });
  </script>
<?php endif; ?>

<!-- SweetAlert para logout -->
<?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
  <script>
    Swal.fire({
      icon: 'info',
      title: 'Sessão encerrada',
      text: 'Você saiu da sua conta com sucesso.',
      confirmButtonColor: '#4caf50'
    });
  </script>
<?php endif; ?>
