<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Termos de Uso e Responsabilidade - ReAbraço</title>
  <style>
    :root {
      --bg-light: #e8f5e9;
      --bg-dark: #1e1e1e;
      --card-light: white;
      --card-dark: #2b2b2b;
      --text-light: #2e7d32;
      --text-dark: #f1f1f1;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      line-height: 1.6;
      min-height: 100vh;
      margin: 0;
      transition: background-color 0.3s, color 0.3s;
    }

    html.dark-mode body {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    .content {
      padding: 70px 20px 40px;
      max-width: 900px;
      margin: 0 auto;
      transition: background-color 0.3s;
    }

    section {
      background: var(--card-light);
      padding: 20px 25px;
      margin-bottom: 25px;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgb(46 125 50 / 0.15);
      transition: background-color 0.3s, color 0.3s;
    }

    html.dark-mode section {
      background: var(--card-dark);
      color: var(--text-dark);
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    }

    h1, h2 {
      color: #388e3c;
      margin-bottom: 12px;
    }

    html.dark-mode h1,
    html.dark-mode h2 {
      color: #a5d6a7;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 40px;
      font-weight: 700;
    }

    ul {
      padding-left: 20px;
      color: #2e7d32dd;
    }

    html.dark-mode ul {
      color: #dcedc8;
    }

    ul li {
      margin-bottom: 10px;
      font-weight: 600;
    }

    p {
      margin-bottom: 15px;
      color: #2e7d32cc;
    }

    html.dark-mode p {
      color: #c8e6c9;
    }

    strong {
      color: #1b5e20;
    }

    html.dark-mode strong {
      color: #81c784;
    }

    @media (max-width: 600px) {
      .content {
        padding: 60px 15px 30px;
      }

      h1 {
        font-size: 2rem;
        margin-bottom: 30px;
      }

      section {
        padding: 15px 20px;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

<div class="content">
  <h1>Termos de Uso e Responsabilidade</h1>

  <section>
    <h2>1. Finalidade do Site</h2>
    <p>
      Este site tem como objetivo auxiliar na divulgação de informações sobre pessoas desaparecidas,
      permitindo que familiares, amigos e cidadãos colaborem com informações e relatos que possam contribuir
      para sua localização.
    </p>
  </section>

  <section>
    <h2>2. Responsabilidade dos Usuários</h2>
    <ul>
      <li>O usuário é responsável pela veracidade das informações fornecidas.</li>
      <li>É proibido cadastrar informações falsas, ofensivas ou que possam causar danos a terceiros.</li>
      <li>O envio de relatos deve ser feito com responsabilidade e boa fé.</li>
      <li>É proibido o uso do site para fins ilegais ou que contrariem a legislação brasileira.</li>
    </ul>
  </section>

  <section>
    <h2>3. Verificação de Informações</h2>
    <p>
      As informações publicadas neste site são de responsabilidade dos usuários. A equipe do ReAbraço
      poderá revisar conteúdos, mas não se responsabiliza pela veracidade absoluta de cada relato ou
      cadastro. Recomendamos que todas as informações sejam sempre verificadas com as autoridades competentes.
    </p>
  </section>

  <section>
    <h2>4. Privacidade e Uso de Dados</h2>
    <ul>
      <li>Os dados coletados são utilizados apenas para fins de busca e localização de pessoas desaparecidas.</li>
      <li>As informações fornecidas podem ser exibidas publicamente, exceto dados de contato privado que o usuário opte por manter confidenciais.</li>
      <li>O site não compartilha dados com terceiros sem autorização prévia, exceto quando exigido por lei.</li>
    </ul>
  </section>

  <section>
    <h2>5. Colaboração com Autoridades</h2>
    <p>
      O ReAbraço poderá colaborar com órgãos oficiais de segurança e assistência social, fornecendo
      informações úteis em casos de investigações ou solicitações legais, sempre respeitando os direitos
      dos envolvidos.
    </p>
  </section>

  <section>
    <h2>6. Modificações nos Termos</h2>
    <p>
      Estes termos poderão ser alterados a qualquer momento, sendo de responsabilidade do usuário
      verificar periodicamente esta página para se manter atualizado.
    </p>
  </section>

  <section>
    <h2>7. Aceite dos Termos</h2>
    <p>
      Ao utilizar o site, o usuário declara estar ciente e de acordo com os presentes termos de uso
      e responsabilidade.
    </p>
  </section>

  <p style="text-align:center; color:#1b5e20; font-weight: 600;">
    <strong>Última atualização:</strong> 05 de julho de 2025
  </p>
</div>

<script>
  // Ativar modo escuro automático se salvo no localStorage
  window.onload = () => {
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark-mode');
    }
  };
</script>

</body>
</html>
