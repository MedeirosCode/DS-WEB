<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fale Conosco via WhatsApp</title>
    <meta name="description" content="Converse com a nossa equipe diretamente pelo WhatsApp. Atendimento rápido e fácil." />
    <style>
        :root {
            --verde-escuro: #2e7d32;
            --verde-claro: #e8f5e9;
            --verde-botao: #25d366;
            --verde-hover: #1ebe5d;
            --verde-ativo: #159b3c;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--verde-claro);
            color: var(--verde-escuro);
            margin: 0;
            padding: 0;
        }

        .espaco-topo {
            height: 60px;
        }

        .conteudo {
            text-align: center;
            padding: 40px 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #388e3c;
            font-size: 2.4rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.15rem;
            margin-bottom: 30px;
            color: #2e7d32dd;
        }

        a.whatsapp-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--verde-botao);
            color: white;
            font-size: 1.2rem;
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            font-weight: bold;
        }

        a.whatsapp-link:hover,
        a.whatsapp-link:focus {
            background-color: var(--verde-hover);
            box-shadow: 0 6px 18px rgba(30, 190, 93, 0.6);
            outline: none;
        }

        a.whatsapp-link:active {
            background-color: var(--verde-ativo);
            box-shadow: 0 2px 6px rgba(21, 155, 60, 0.7);
        }

        .whatsapp-icon {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            fill: white;
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.9rem;
            }

            p {
                font-size: 1rem;
            }

            a.whatsapp-link {
                font-size: 1rem;
                padding: 12px 24px;
            }

            .whatsapp-icon {
                width: 20px;
                height: 20px;
                margin-right: 8px;
            }
        }
    </style>
</head>
<body>

    <div class="espaco-topo"></div>

    <div class="conteudo">
        <h1>Fale Conosco pelo WhatsApp</h1>
        <p>Clique no botão abaixo para iniciar uma conversa com a nossa equipe. Estamos aqui para ajudar a reunir famílias e trazer esperança.</p>

        <a
            class="whatsapp-link"
            href="https://wa.me/5515991770288?text=Olá,%20gostaria%20de%20mais%20informações!"
            target="_blank"
            rel="noopener noreferrer"
        >
            <svg class="whatsapp-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339-16.3 204.2-30.4 125.5 39.6c-50.1 43.6-69.6 112.6-50.5 176.7L0 480l137.4-73.4c29.6 16.2 62.8 24.6 96.7 24.6 117.4 0 213.5-96.1 213.5-213.5 0-39.9-10.9-78.4-31.3-111.6zM233.5 392c-27.9 0-55.3-7.6-79-21.8l-5.6-3.3-81.4 43.5 17.1-85.6-3.8-6c-17.4-27.6-26.6-59.6-26.6-92.2 0-94.1 76.6-170.7 170.7-170.7 45.6 0 88.5 17.8 120.8 50.1 32.3 32.3 50.1 75.2 50.1 120.8 0 94.1-76.6 170.7-170.7 170.7zm99.8-138.1c-5.5-2.8-32.6-16.1-37.7-17.9-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 17.9-17.5 21.6c-3.2 3.7-6.4 4.2-11.9 1.4-5.5-2.8-23.1-8.5-44.1-27-16.3-14.5-27.3-32.4-30.5-37.9-3.2-5.5-.3-8.4 2.4-11.1 2.5-2.5 5.5-6.4 8.3-9.6 2.8-3.2 3.7-5.5 5.5-9.2s.9-6.9-.5-9.6c-1.4-2.8-12.5-30-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.6 1.4-14.6 6.9-19.1 18.6-19.1 45.4c0 26.8 19.6 52.8 22.3 56.5s38.6 59.1 93.7 82.8c13.1 5.6 23.3 8.9 31.2 11.3 13.1 4.2 25.1 3.6 34.6 2.2 10.6-1.6 32.6-13.3 37.2-26.1s4.6-23.8 3.2-26.1c-1.3-2.3-5-3.6-10.5-6.3z"/></svg>
            Abrir no WhatsApp
        </a>
    </div>

</body>
</html>
