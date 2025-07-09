<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>ReAbraço - Pessoas Desaparecidas</title>
    <style>
    :root {
        --bg-light: #f0fdf4;
        --bg-dark: #121212;
        --text-light: #2e3d2f;
        --text-dark: #f1f1f1;
        --card-light: white;
        --card-dark: #1f1f1f;
        --accent-light: #2e7d32;
        --accent-dark: #a5d6a7;
        --border-dark: #388e3c;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: var(--bg-light);
        color: var(--text-light);
        line-height: 1.6;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    html.dark-mode body {
        background: var(--bg-dark);
        color: var(--text-dark);
    }

    header {
        background: linear-gradient(to right, #2e7d32, #388e3c);
        color: white;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    header h1 {
        margin-bottom: 5px;
        font-size: 2.8rem;
        letter-spacing: 1px;
    }

    header p {
        font-size: 1.1rem;
        font-style: italic;
        opacity: 0.95;
    }

    main {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .section {
        background: var(--card-light);
        border-radius: 12px;
        padding: 25px 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 40px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    html.dark-mode .section {
        background: var(--card-dark);
        color: var(--text-dark);
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    h2 {
        color: var(--accent-light);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
        border-bottom: 3px solid #66bb6a;
        display: inline-block;
        padding-bottom: 5px;
        transition: color 0.3s;
    }

    html.dark-mode h2 {
        color: var(--accent-dark);
        border-color: #81c784;
    }

    ul.instrucoes {
        list-style-type: disc;
        margin-left: 25px;
        font-size: 1.1rem;
        color: inherit;
    }

    ul.instrucoes li {
        margin-bottom: 12px;
    }

    .cards-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        background: var(--card-light);
        border-radius: 12px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        max-width: 300px;
        overflow: hidden;
        transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease;
        cursor: pointer;
    }

    html.dark-mode .card {
        background: var(--card-dark);
        color: var(--text-dark);
        box-shadow: 0 4px 14px rgba(0,0,0,0.4);
    }

    .card:hover {
        transform: translateY(-8px);
    }

    .card img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-bottom: 1px solid #e0e0e0;
    }

    .card-content {
        padding: 15px 20px;
        text-align: center;
    }

    .card-content h3 {
        margin: 10px 0 8px;
        color: var(--accent-light);
        font-size: 1.4rem;
    }

    html.dark-mode .card-content h3 {
        color: var(--accent-dark);
    }

    .card-content p {
        font-size: 1rem;
        color: #555;
        margin: 0 0 12px 0;
    }

    html.dark-mode .card-content p {
        color: #d0d0d0;
    }

    .card-content a {
        display: inline-block;
        background-color: #43a047;
        color: white;
        padding: 8px 18px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .card-content a:hover {
        background-color: #2e7d32;
    }

    .mensagem-conforto {
        background: #e8f5e9;
        border-left: 6px solid #4caf50;
        padding: 20px 25px;
        margin-top: 40px;
        font-style: italic;
        font-size: 1.2rem;
        color: #2e7d32;
        border-radius: 0 10px 10px 0;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        transition: background 0.3s, color 0.3s;
    }

    html.dark-mode .mensagem-conforto {
        background: #263a29;
        color: #c8e6c9;
        border-left-color: #66bb6a;
    }

    @media(max-width: 960px) {
        .cards-container {
            flex-direction: column;
            align-items: center;
        }
        .card {
            max-width: 90%;
            margin-bottom: 25px;
        }
        header h1 {
            font-size: 2.2rem;
        }
        h2 {
            font-size: 1.6rem;
        }
        .mensagem-conforto {
            font-size: 1.1rem;
            padding: 18px 20px;
        }
    }
    </style>
</head>
<body>

<header>
    <h1>ReAbraço</h1>
    <p>Conectando pessoas, reencontrando histórias.</p>
</header>

<main>
    <section class="section">
        <h2>Quando e como reportar um desaparecimento</h2>
        <ul class="instrucoes">
            <li><strong>Não espere mais que 24 horas</strong> para registrar o desaparecimento de alguém.</li>
            <li>Dirija-se à delegacia especializada ou à polícia mais próxima e faça o boletim de ocorrência.</li>
            <li>Forneça uma foto recente, descrição física, roupas, locais e contatos.</li>
            <li>Informe-se sobre os próximos passos e mantenha contato frequente com as autoridades.</li>
            <li>Divulgue o desaparecimento em redes sociais, sites e grupos da comunidade.</li>
        </ul>
    </section>

    <section class="section">
        <h2>Pessoas recentemente cadastradas</h2>
        <div class="cards-container">
            <div class="card" tabindex="0" role="button">
                <img src="/projeto_senai/photos/reencontro01.jpg" alt="Foto de Maria Silva">
                <div class="card-content">
                    <h3>Ana Clara</h3>
                    <p>Desaparecida desde 10/06/2025<br>Belo Horizonte - MG</p>
                    <a href="views/historias/historia1.php">Ver detalhes</a>
                </div>
            </div>

            <div class="card" tabindex="0" role="button">
                <img src="/projeto_senai/photos/reencontro02.jpg" alt="Foto de João Oliveira">
                <div class="card-content">
                    <h3>João Pedro</h3>
                    <p>Desaparecido desde 15/06/2025<br>São Paulo - SP</p>
                    <a href="views/historias/historia2.php">Ver detalhes</a>
                </div>
            </div>

            <div class="card" tabindex="0" role="button">
                <img src="/projeto_senai/photos/reencontro03.jpg" alt="Foto de Larissa Costa">
                <div class="card-content">
                    <h3>Maria Aparecida</h3>
                    <p>Desaparecida desde 02/07/2025<br>Recife - PE</p>
                    <a href="views/historias/historia3.php">Ver detalhes</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mensagem-conforto">
        <p>“A esperança é o que mantém o coração forte. Nunca perca a fé no reencontro e na justiça. Você não está sozinho nesta caminhada.”</p>
        <p>— Equipe ReAbraço</p>
    </section>
</main>

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
