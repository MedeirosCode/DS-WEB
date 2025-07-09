<?php
// História 3: Maria Aparecida
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Reencontro de Maria Aparecida</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark-mode');
    }
  </script>
  <style>
    :root {
      --bg-light: #e8f5e9;
      --bg-dark: #1e1e1e;
      --text-light: #2e7d32;
      --text-dark: #f1f1f1;
      --card-light: #a5d6a7;
      --card-dark: #2a2a2a;
      --border-light: #1b5e20;
      --border-dark: #66bb6a;
      --quote-color: #33691e;
      --quote-dark: #a5d6a7;
    }

    body {
      background: var(--bg-light);
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-light);
      padding: 20px;
      margin: 0;
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
      border-left: 10px solid var(--border-light);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      transition: background 0.3s ease, border-color 0.3s ease;
    }

    html.dark-mode .container {
      background: var(--card-dark);
      border-left: 10px solid var(--border-dark);
    }

    h1 {
      color: var(--border-light);
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
      border-left: 5px solid var(--border-dark);
      font-style: italic;
      color: var(--quote-color);
    }

    html.dark-mode .quote {
      color: var(--quote-dark);
      border-left-color: var(--quote-dark);
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
    <h1>O Abraço Que Voltou Para Casa</h1>
    <p>
      Maria Aparecida, 68 anos, diagnosticada com Alzheimer, saiu de casa para uma simples caminhada em Recife e não conseguiu retornar. O desaparecimento abalou toda a vizinhança, que se mobilizou para ajudar.
    </p>
    <p>
      O neto de Dona Maria publicou seu caso no ReAbraço, que rapidamente viralizou. Após quatro dias sem paradeiro, um motorista de aplicativo viu a senhora caminhando sozinha, desorientada, no centro da cidade. Ele reconheceu o rosto da postagem e prontamente ligou para a polícia.
    </p>
    <p>
      Dona Maria foi acolhida e, com muito cuidado, levada até o hospital para avaliação. Em poucas horas, estava de volta ao calor do lar, cercada por lágrimas de felicidade.
    </p>
    <p class="quote">
      "Ela é a alma da nossa família. Ter ela de volta é como renascer." – disse a neta com os olhos marejados.
    </p>
  </div>

</body>
</html>
