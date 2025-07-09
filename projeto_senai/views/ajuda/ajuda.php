<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Ajuda - Pessoas Desaparecidas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    :root {
      --verde-escuro: #2e7d32;
      --verde-medio: #43a047;
      --bg-claro: #f0fdf4;
      --bg-escuro: #1e1e1e;
      --caixa-clara: white;
      --caixa-escura: #2b2b2b;
      --texto-escuro: #f1f1f1;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-claro);
      color: var(--verde-escuro);
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode {
      background-color: var(--bg-escuro);
      color: var(--texto-escuro);
    }

    h1 {
      text-align: center;
      color: var(--verde-escuro);
      margin-bottom: 30px;
    }

    body.dark-mode h1 {
      color: #a5d6a7;
    }

    .faq-container {
      max-width: 800px;
      margin: 0 auto;
      background: var(--caixa-clara);
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      padding: 30px;
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .faq-container {
      background: var(--caixa-escura);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    }

    .faq-item {
      margin-bottom: 20px;
      border-bottom: 1px solid #e0e0e0;
      padding-bottom: 10px;
      cursor: pointer;
    }

    body.dark-mode .faq-item {
      border-color: #555;
    }

    .faq-item h2 {
      font-size: 1.2rem;
      color: var(--verde-medio);
      margin-bottom: 8px;
      transition: color 0.3s ease;
    }

    .faq-item h2:hover {
      color: var(--verde-escuro);
    }

    .faq-item p {
      font-size: 1rem;
      line-height: 1.6;
      display: none;
      margin-top: 5px;
      color: inherit;
    }

    .faq-item.active p {
      display: block;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 40px;
      text-decoration: none;
      background: var(--verde-medio);
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      max-width: 200px;
      margin-left: auto;
      margin-right: auto;
      transition: background-color 0.3s ease;
    }

    .back-link:hover {
      background: var(--verde-escuro);
    }

    /* WhatsApp botão flutuante */
    .whatsapp-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25d366;
      color: white;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      text-decoration: none;
      z-index: 999;
      transition: background-color 0.3s ease;
    }

    .whatsapp-button:hover {
      background-color: #128c7e;
    }

    @media (max-width: 480px) {
      .faq-item h2 {
        font-size: 1rem;
      }

      .faq-item p {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>

  <h1>Ajuda & Perguntas Frequentes (FAQ)</h1>

  <div class="faq-container">
    <div class="faq-item">
      <h2>🧭 Como faço para buscar uma pessoa desaparecida?</h2>
      <p>Você pode usar a barra de busca na página inicial digitando o nome da pessoa, a cidade ou o estado onde ela desapareceu.</p>
    </div>

    <div class="faq-item">
      <h2>📤 Como posso cadastrar um desaparecido?</h2>
      <p>Basta acessar a página de <strong>cadastro</strong> e preencher o formulário com as informações da pessoa desaparecida e do responsável.</p>
    </div>

    <div class="faq-item">
      <h2>📷 A foto não aparece, o que fazer?</h2>
      <p>Verifique se a imagem enviada está no formato permitido (JPG, PNG) e com tamanho adequado. Se o problema persistir, tente reenviar.</p>
    </div>

    <div class="faq-item">
      <h2>📱 Como posso entrar em contato com o responsável?</h2>
      <p>Na página de detalhes de cada desaparecido, você verá o nome do responsável e telefone para contato.</p>
    </div>

    <div class="faq-item">
      <h2>📝 Posso adicionar um relato?</h2>
      <p>Sim. Ao acessar os detalhes de uma pessoa desaparecida, você poderá escrever um relato com informações úteis para ajudar na busca.</p>
    </div>

    <div class="faq-item">
      <h2>🔐 Minhas informações estão seguras?</h2>
      <p>Sim, todas as informações são armazenadas com segurança e utilizadas exclusivamente para ajudar nas buscas.</p>
    </div>

    <div class="faq-item">
      <h2>📨 Preciso de ajuda! Como falar com a equipe do site?</h2>
      <p>Você pode entrar em contato com nossa equipe pelo e-mail: <a href="mailto:ajuda@desaparecidos.com.br">ajuda@desaparecidos.com.br</a></p>
    </div>
  </div>

  <!-- Botão do WhatsApp -->
  <a href="https://wa.me/5515991770288" target="_blank" class="whatsapp-button" title="Fale conosco no WhatsApp">
    💬
  </a>

  <script>
    // Toggle das respostas do FAQ
    document.querySelectorAll('.faq-item h2').forEach(item => {
      item.addEventListener('click', () => {
        const parent = item.parentElement;
        parent.classList.toggle('active');
      });
    });

    // Ativa modo escuro se estiver salvo no localStorage
    window.onload = () => {
      if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
      }
    };
  </script>

</body>
</html>
