<?php
// História 3: Maria Aparecida
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Reencontro de Maria Aparecida</title>
    <style>
        body {
            background: #e8f5e9;
            font-family: 'Segoe UI', sans-serif;
            color: #2e7d32;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #a5d6a7;
            border-left: 10px solid #1b5e20;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        h1 {
            color: #1b5e20;
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
    <a href="../../index.php" class="btn-encontrado">Retornar para Home</a>
</body>
</html>
