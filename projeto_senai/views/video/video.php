<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vídeos de Reencontros e Conscientização</title>
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
      --card-light: #ffffff;
      --card-dark: #2b2b2b;
      --shadow-light: rgba(46, 125, 50, 0.15);
      --shadow-dark: rgba(0, 0, 0, 0.3);
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: var(--bg-light);
      color: var(--text-light);
      margin: 0;
      padding: 0;
      min-height: 100vh;
      transition: background 0.3s ease, color 0.3s ease;
    }

    html.dark-mode body {
      background: var(--bg-dark);
      color: var(--text-dark);
    }

    h1 {
      text-align: center;
      color: #388e3c;
      margin: 20px 0 30px;
      font-weight: 700;
      font-size: 2.5rem;
    }

    html.dark-mode h1 {
      color: var(--text-dark);
    }

    .video-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      max-width: 700px;
      margin: 0 auto;
      padding: 0 20px 40px;
    }

    .video-card {
      background: var(--card-light);
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 3px 10px var(--shadow-light);
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    html.dark-mode .video-card {
      background: var(--card-dark);
      box-shadow: 0 3px 10px var(--shadow-dark);
    }

    .video-card:hover {
      box-shadow: 0 6px 20px rgba(46, 125, 50, 0.3);
    }

    html.dark-mode .video-card:hover {
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
    }

    .video-card iframe {
      width: 100%;
      height: 200px;
      border: 0;
      border-radius: 8px;
    }

    .caption {
      margin-top: 12px;
      font-weight: 600;
      color: #2e7d32dd;
      text-align: center;
      transition: color 0.3s ease;
    }

    html.dark-mode .caption {
      color: var(--text-dark);
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 2rem;
        margin-bottom: 25px;
      }
      .video-card iframe {
        height: 180px;
      }
      .video-grid {
        grid-template-columns: 1fr;
        max-width: 90vw;
      }
    }
  </style>
</head>
<body>
  <h1>Vídeos de Reencontros e Conscientização</h1>
  <div class="video-grid">
    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/zwh0sj6E4Q8" title="Reencontro emocionante Adriana" allowfullscreen></iframe>
      <div class="caption">Reencontro de Adriana com a família após 25 anos</div>
    </div>
    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/mhXUt5vydsA" title="Reencontro na mata" allowfullscreen></iframe>
      <div class="caption">Pais reencontram filho desaparecido na mata</div>
    </div>
    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/8qsXmPvXZQk" title="Campanha educativa desaparecimento" allowfullscreen></iframe>
      <div class="caption">Campanha educativa sobre desaparecimento de crianças</div>
    </div>
    <div class="video-card">
      <iframe src="https://www.youtube.com/embed/0Usy4X7MjhU" title="Campanha Rede Câmara SP" allowfullscreen></iframe>
      <div class="caption">Campanha de conscientização — Rede Câmara SP</div>
    </div>
  </div>
</body>
</html>
