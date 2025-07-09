<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Quem Somos Nós</title>
  <style>
    :root {
      --verde-principal: #2e7d32;
      --verde-claro: #e8f5e9;
      --verde-medio: #81c784;
      --verde-escuro: #1b5e20;
      --sombra: rgba(33, 128, 57, 0.15);

      --bg-dark: #121212;
      --caixa-dark: #1f1f1f;
      --texto-dark: #f1f1f1;
      --borda-dark: #388e3c;
    }

    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--verde-claro);
      color: var(--verde-principal);
      line-height: 1.7;
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode {
      background-color: var(--bg-dark);
      color: var(--texto-dark);
    }

    .container {
      max-width: 900px;
      background: #fff;
      padding: 40px 50px;
      border-radius: 40px;
      border: 6px solid var(--verde-medio);
      box-shadow: 0 12px 30px var(--sombra);
      color: var(--verde-escuro);
      text-align: justify;
      font-size: 1.18rem;
      margin: 10px auto 40px auto;
      position: relative;
      z-index: 1;
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .container {
      background: var(--caixa-dark);
      color: var(--texto-dark);
      border-color: var(--borda-dark);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
    }

    h1 {
      color: var(--verde-medio);
      text-align: center;
      margin-bottom: 35px;
      font-size: 2.8rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-shadow: 1px 1px 3px rgba(129, 199, 132, 0.4);
      transition: color 0.3s ease;
    }

    body.dark-mode h1 {
      color: #a5d6a7;
      text-shadow: none;
    }

    p {
      margin-bottom: 22px;
      font-weight: 500;
      color: inherit;
    }

    strong {
      display: block;
      margin-top: 25px;
      font-weight: 700;
      color: var(--verde-escuro);
      font-size: 1.35rem;
      text-align: center;
    }

    body.dark-mode strong {
      color: #c8e6c9;
    }

    @media (max-width: 800px) {
      .container {
        padding: 30px 25px;
        font-size: 1.05rem;
        border-radius: 28px;
        border-width: 5px;
      }

      h1 {
        font-size: 2.2rem;
        margin-bottom: 28px;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px 20px;
        font-size: 1rem;
        border-radius: 20px;
        border-width: 4px;
      }

      h1 {
        font-size: 1.8rem;
        margin-bottom: 22px;
      }
    }
  </style>
</head>
<body>

  <!-- Coloque seu menu aqui, fora da div container -->

  <div class="container" role="main" aria-labelledby="quemSomosTitulo">
    <h1 id="quemSomosTitulo">Quem Somos Nós</h1>
    <p>Somos um grupo de estudantes movidos pela empatia e pelo desejo de fazer a diferença. Criamos este site com o propósito de auxiliar na localização de pessoas desaparecidas, oferecendo uma plataforma acessível, segura e colaborativa.</p>
    <p>Acreditamos que a tecnologia pode e deve ser usada para o bem. Nosso projeto nasceu da vontade de unir nossos conhecimentos com uma causa nobre: dar visibilidade a histórias, apoiar famílias e promover reencontros.</p>
    <p>Trabalhamos com responsabilidade, respeito e dedicação. Sabemos que por trás de cada nome há uma vida, uma história e uma família esperando por respostas. Por isso, cada caso aqui publicado recebe a nossa atenção e cuidado.</p>
    <p>Nosso compromisso é com a verdade, a solidariedade e a esperança.</p>
    <strong>Juntos, acreditamos que podemos reabraçar quem está longe.</strong>
  </div>

  <script>
    // Aplica automaticamente o modo escuro se salvo no localStorage
    window.onload = () => {
      if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
      }
    };
  </script>

</body>
</html>
