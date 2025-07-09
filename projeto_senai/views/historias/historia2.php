<?php
// História 2: João Pedro
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Reencontro de João Pedro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark-mode');
    }
  </script>
  <style>
    :root {
      --bg-light: #f0fdf4;
      --bg-dark: #1e1e1e;
      --text-light: #1a3e34;
      --text-dark: #f1f1f1;
      --card-light: #c8e6c9;
      --card-dark: #2a2a2a;
      --border-color: #43a047;
      --highlight-light: #66bb6a;
      --highlight-dark: #81c784;
      --quote-text: #33691e;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--bg-light);
      color: var(--text-light);
      padding: 20px;
      transition: background 0.3s ease, color 0.3s ease;
    }

    html.dark-mode body {
      background: var(--bg-dark);
      color: var(--text-dark);
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: var(--card-light);
      border-left: 10px solid var(--border-color);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: background 0.3s ease, border-color 0.3s ease;
    }

    html.dark-mode .container {
      background: var(--card-dark);
      border-left: 8px solid var(--highlight-dark);
    }

    h1 {
      color: #2e7d32;
    }

    html.dark-mode h1 {
      color: var(--text-dark);
    }

    p {
      font-size: 18px;
      line-height: 1.8;
    }

    .quote {
      margin-top: 25px;
      padding-left: 15px;
      border-left: 5px solid var(--highlight-light);
      font-style: italic;
      color: var(--quote-text);
    }

    html.dark-mode .quote {
      border-left-color: var(--highlight-dark);
      color: var(--highlight-dark);
    }

    .btn-encontrado {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: #388e3c;
      color: white;
      padding: 12px 18px;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
      transition: background-color 0.3s ease, transform 0.2s;
      z-index: 999;
    }

    .btn-encontrado:hover {
      background-color: #2e7d32;
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .btn-encontrado {
        padding: 10px 14px;
        font-size: 14px;
        top: 15px;
        left: 15px;
      }

      .container {
        padding: 20px;
      }

      p {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>

  <a href="../../index.php" class="btn-encontrado">Retornar para Home</a>

  <div class="container">
    <h1>Uma Identificação que Salvou Vidas</h1>
    <p>
      João Pedro, de 26 anos, saiu para trabalhar em sua moto em São Paulo e nunca mais retornou. Após dias sem notícias, a família registrou o desaparecimento e começou a busca desesperada. O tempo passou, mas nada de João. 
    </p>
    <p>
      O caso ganhou visibilidade no ReAbraço, com fotos, boletim e compartilhamentos intensos. O que ninguém sabia era que João havia sofrido um acidente grave e estava internado sem documentos, como paciente desconhecido, em um hospital público.
    </p>
    <p>
      Um enfermeiro navegava pelo site em um plantão e reconheceu o rosto familiar. Alertou a assistente social, e imediatamente a família foi acionada. O reencontro aconteceu no 92º dia desde o desaparecimento.
    </p>
    <p class="quote">
      "Graças ao ReAbraço, reencontramos nosso filho. Não temos palavras." – disse o pai, emocionado.
    </p>
  </div>

</body>
</html>
