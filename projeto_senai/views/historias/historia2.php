<?php
// História 2: João Pedro
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Reencontro de João Pedro</title>
    <style>
        body {
            background: #f0fdf4;
            font-family: 'Segoe UI', sans-serif;
            color: #1a3e34;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #c8e6c9;
            border-left: 10px solid #43a047;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            color: #2e7d32;
        }

        p {
            font-size: 18px;
            line-height: 1.8;
        }

        .quote {
            margin-top: 25px;
            padding-left: 15px;
            border-left: 5px solid #66bb6a;
            font-style: italic;
            color: #33691e;
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
    <a href="../../index.php" class="btn-encontrado">Retornar para Home</a>
</body>
</html>
