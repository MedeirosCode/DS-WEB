<?php if(!defined('CADASTRO_RENDERIZADO')) { define('CADASTRO_RENDERIZADO', true); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Desaparecidos</title>
  <style>
    :root {
      --verde-escuro: #2e7d32;
      --verde-medio: #43a047;
      --verde-claro: #c8e6c9;
      --verde-fundo: #e8f5e9;
      --cinza-claro: #f1f1f1;
      --sombra: rgba(0, 0, 0, 0.05);
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--verde-fundo);
    }

    .titulo-cadastro {
      text-align: center;
      font-size: 2rem;
      color: var(--verde-escuro);
      margin-top: 30px;
    }

    .form-wrapper {
      max-width: 800px;
      margin: 40px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 24px var(--sombra);
    }

    .formulario-cadastro {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .campo-form {
      display: flex;
      flex-direction: column;
    }

    .campo-form label {
      margin-bottom: 6px;
      font-weight: bold;
      color: var(--verde-medio);
    }

    .campo-form input,
    .campo-form select {
      padding: 10px 12px;
      border: 2px solid var(--verde-claro);
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    .campo-form input:focus,
    .campo-form select:focus {
      border-color: var(--verde-medio);
      outline: none;
    }

    .btn-enviar {
      margin-top: 20px;
      padding: 12px;
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
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<h1 class="titulo-cadastro">Cadastro de Desaparecidos</h1>

<div class="form-wrapper">
  <form action="/projeto_senai/cliente/cadastro" method="POST" enctype="multipart/form-data" class="formulario-cadastro">

    <div class="campo-form">
      <label>Nome do Cliente:</label>
      <input type="text" name="nomeCliente" required>
    </div>

    <div class="campo-form">
      <label>Foto do Desaparecido:</label>
      <input type="file" name="fotoCliente" accept="image/*">
    </div>

    <div class="campo-form">
      <label>Email do Responsável:</label>
      <input type="email" name="emailCliente" required>
    </div>

    <div class="campo-form">
      <label>Altura (em metros):</label>
      <input type="text" name="altura">
    </div>

    <div class="campo-form">
      <label>Sexo:</label>
      <select name="sexo">
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
      </select>
    </div>

    <div class="campo-form">
      <label>Data de Nascimento:</label>
      <input type="date" name="dataNascimento">
    </div>

    <div class="campo-form">
      <label>Localização do Desaparecimento:</label>
      <input type="text" name="localizacao">
    </div>

    <div class="campo-form">
      <label>Características:</label>
      <input type="text" name="caracteristicas">
    </div>

    <div class="campo-form">
      <label>Raça:</label>
      <input type="text" name="raca">
    </div>

    <div class="campo-form">
      <label>Idade Aproximada:</label>
      <input type="text" name="idadeAproximada">
    </div>

    <div class="campo-form">
      <label>Data do Desaparecimento:</label>
      <input type="datetime-local" name="dataDesaparecimento">
    </div>

    <div class="campo-form">
      <label>Cidade:</label>
      <input type="text" name="cidade">
    </div>

    <div class="campo-form">
      <label>Estado:</label>
      <input type="text" name="estado">
    </div>

    <div class="campo-form">
      <label>País:</label>
      <input type="text" name="pais">
    </div>

    <div class="campo-form">
      <label>Última Roupa Vista:</label>
      <input type="text" name="ultimaRoupaVista">
    </div>

    <div class="campo-form">
      <label>Nome do Responsável:</label>
      <input type="text" name="nomeResponsavel">
    </div>

    <div class="campo-form">
      <label>Telefone do Responsável:</label>
      <input type="text" name="telefoneResponsavel">
    </div>

    <div class="campo-form">
      <label>Parentesco do Responsável:</label>
      <input type="text" name="parentescoResponsavel">
    </div>

    <div class="campo-form">
      <label>Observações:</label>
      <input type="text" name="observacao">
    </div>

    <input type="submit" value="Enviar" class="btn-enviar">
  </form>
</div>

</body>
</html>
<?php } ?>
