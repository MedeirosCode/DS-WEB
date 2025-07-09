<?php if(!defined('CADASTRO_RENDERIZADO')) { define('CADASTRO_RENDERIZADO', true); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Pessoa Desaparecida</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
      --verde-escuro: #2e7d32;
      --verde-medio: #43a047;
      --verde-claro: #c8e6c9;
      --verde-fundo: #e8f5e9;
      --cinza-claro: #f1f1f1;
      --sombra: rgba(0, 0, 0, 0.05);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--verde-fundo);
      color: #333;
    }

    .titulo-cadastro {
      text-align: center;
      font-size: 2.4rem;
      color: var(--verde-escuro);
      margin-top: 30px;
      font-weight: 600;
    }

    .form-wrapper {
      max-width: 820px;
      margin: 40px auto;
      padding: 35px;
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 24px var(--sombra);
      border: 5px solid var(--verde-medio);
    }

    .formulario-cadastro {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .campo-form {
      display: flex;
      flex-direction: column;
    }

    .campo-form label {
      margin-bottom: 6px;
      font-weight: 600;
      color: var(--verde-medio);
    }

    .campo-form input,
    .campo-form select {
      padding: 10px 14px;
      border: 2px solid var(--verde-claro);
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .campo-form input:focus,
    .campo-form select:focus {
      border-color: var(--verde-medio);
      outline: none;
    }

    .preview-imagem {
      width: 200px;
      height: 200px;
      border-radius: 8px;
      object-fit: cover;
      border: 2px solid var(--verde-claro);
      margin-top: 10px;
    }

    .btn-enviar {
      margin-top: 24px;
      padding: 14px;
      background-color: var(--verde-medio);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-enviar:hover {
      background-color: var(--verde-escuro);
      transform: scale(1.02);
    }

    @media (max-width: 600px) {
      .form-wrapper {
        padding: 20px;
        margin: 20px;
      }

      .titulo-cadastro {
        font-size: 1.8rem;
      }

      .preview-imagem {
        width: 150px;
        height: 150px;
      }
    }
  </style>
</head>
<body>

  <h1 class="titulo-cadastro">Registrar Pessoa Desaparecida</h1>

  <div class="form-wrapper">
    <form id="formCadastro" action="/projeto_senai/cliente/cadastro" method="POST" enctype="multipart/form-data" class="formulario-cadastro">

      <div class="campo-form"><label>Nome completo da pessoa desaparecida:</label><input type="text" name="nomeCliente" ></div>
      
      <div class="campo-form">
        <label>Foto do Desaparecido:</label>
        <input type="file" name="fotoCliente" id="fotoCliente" accept="image/*" onchange="previewImagem(event)">
        <img id="imagemPreview" class="preview-imagem" style="display: none;">
      </div>

      <div class="campo-form"><label>Email de contato do responsável:</label><input type="email" name="emailCliente" ></div>
      <div class="campo-form"><label>Altura aproximada (em metros):</label><input type="text" name="altura" ></div>
      <div class="campo-form"><label>Sexo:</label>
        <select name="sexo" >
          <option value="">Selecione</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
          <option value="Outro">Outro</option>
        </select>
      </div>
      <div class="campo-form"><label>Data de nascimento:</label><input type="date" name="dataNascimento" ></div>
      <div class="campo-form"><label>Local onde desapareceu:</label><input type="text" name="localizacao" ></div>
      <div class="campo-form"><label>Características físicas ou marcas visíveis:</label><input type="text" name="caracteristicas" ></div>
      <div class="campo-form"><label>Raça/cor:</label><input type="text" name="raca" ></div>
      <div class="campo-form"><label>Idade aproximada:</label><input type="text" name="idadeAproximada" ></div>
      <div class="campo-form"><label>Data e hora do desaparecimento:</label><input type="datetime-local" name="dataDesaparecimento" ></div>
      <div class="campo-form"><label>Cidade:</label><input type="text" name="cidade" ></div>
      <div class="campo-form"><label>Estado:</label><input type="text" name="estado" ></div>
      <div class="campo-form"><label>País:</label><input type="text" name="pais" ></div>
      <div class="campo-form"><label>Última roupa vista:</label><input type="text" name="ultimaRoupaVista" ></div>
      <div class="campo-form"><label>Nome do responsável pelo cadastro:</label><input type="text" name="nomeResponsavel" ></div>
      <div class="campo-form"><label>Telefone de contato:</label><input type="text" name="telefoneResponsavel" ></div>
      <div class="campo-form"><label>Parentesco com a pessoa desaparecida:</label><input type="text" name="parentescoResponsavel" ></div>
      <div class="campo-form"><label>Informações adicionais (opcional):</label><input type="text" name="observacao"></div>

      <input type="submit" value="Cadastrar Pessoa" class="btn-enviar">
    </form>
  </div>

  <script>
  function previewImagem(event) {
    const imagem = event.target.files[0];
    const preview = document.getElementById('imagemPreview');

    if (imagem) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(imagem);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }

  document.getElementById('formCadastro').addEventListener('submit', function (e) {
    e.preventDefault(); // impede envio imediato
    const form = e.target;
    const email = form.emailCliente.value.trim();
    const altura = form.altura.value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regexAltura = /^\d+(\.\d{1,2})?$/;

    if (!regexEmail.test(email)) {
      Swal.fire('Erro!', 'E-mail inválido.', 'error');
      return;
    }

    if (!regexAltura.test(altura)) {
      Swal.fire('Erro!', 'Altura deve estar no formato correto (ex: 1.70).', 'error');
      return;
    }

    // Simula carregando e envia depois
    Swal.fire({
      title: 'Cadastrando...',
      text: 'Aguarde enquanto enviamos os dados.',
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      }
    });

    setTimeout(() => {
      Swal.close(); // fecha o "carregando"
      Swal.fire({
        icon: 'success',
        title: 'Cadastro realizado!',
        text: 'A pessoa foi cadastrada com sucesso.',
        confirmButtonText: 'OK'
      }).then(() => {
        form.submit(); // agora envia de fato
      });
    }, 2000);
  });
</script>

</body>
</html>
<?php } ?>
