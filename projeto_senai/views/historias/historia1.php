<?php
// História 1: Ana Clara
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Reencontro de Ana Clara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark-mode');
    }
  </script>
  <style>
    :root {
      --bg-light: #e9f7ef;
      --bg-dark: #1e1e1e;
      --text-light: #1b4d3e;
      --text-dark: #f1f1f1;
      --card-light: #d4edda;
      --card-dark: #2b2b2b;
      --border-color: #2e7d32;
      --highlight-light: #81c784;
      --highlight-dark: #66bb6a;
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
      border-left: 8px solid var(--border-color);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: background 0.3s ease, border-color 0.3s ease;
    }

    html.dark-mode .container {
      background: var(--card-dark);
      border-left: 6px solid var(--highlight-dark);
    }

    h1 {
      color: #256029;
    }

    html.dark-mode h1 {
      color: var(--text-dark);
    }

    p {
      font-size: 18px;
      line-height: 1.7;
    }

    .quote {
      margin-top: 20px;
      font-style: italic;
      color: var(--border-color);
      border-left: 4px solid var(--highlight-light);
      padding-left: 15px;
    }

    html.dark-mode .quote {
      color: var(--highlight-dark);
      border-left: 4px solid var(--highlight-dark);
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

  <div class="container">
    <h1>A Esperança que Nunca Morreu</h1>
    <p>
      Ana Clara, uma menina de apenas 12 anos, desapareceu em uma tarde comum após sair da escola em Belo Horizonte. O relógio passava das 18h e nada dela retornar. A família entrou em desespero e iniciou imediatamente buscas pela cidade.
    </p>
    <p>
      Com o passar dos dias, cartazes foram espalhados, boletins de ocorrência foram registrados e a fé da família parecia ser a única coisa intacta. Foi quando a mãe, desesperada, descobriu o ReAbraço. Em poucos minutos, a ficha de Ana estava publicada no site e compartilhada em grupos locais e redes sociais.
    </p>
    <p>
      Quatorze dias depois, uma senhora avistou a menina sentada sozinha em uma praça da zona norte. Ao reconhecer o rosto de Ana pela postagem, ligou imediatamente para a polícia. Ela havia se perdido após descer do ônibus errado e acabou abrigada em uma ocupação. Com medo, não sabia como pedir ajuda.
    </p>
    <p class="quote">
      "A esperança nunca pode morrer. O ReAbraço foi um anjo em nossas vidas." – relatou a mãe, emocionada.
    </p>
  </div>

  <!-- Botão fixo no canto superior esquerdo -->
  <a href="../../index.php" class="btn-encontrado">Retornar para Home</a>

</body>
</html>
