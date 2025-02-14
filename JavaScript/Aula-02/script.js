// Primeiro exemplo: pega o terceiro parágrafo e exibe no quarto parágrafo
var p1 = window.document.getElementsByTagName('p')[2];
document.getElementById("quarto-paragrafo").innerHTML = p1.innerText;

// Atualiza o conteúdo do elemento com ID "teste"
document.getElementById("teste").innerHTML = "Hello World";

// Terceiro exemplo: altera os textos das classes "exemplo"
var classes = document.getElementsByClassName("exemplo");
classes[0].innerHTML = "Hello World!";

// Quarto exemplo: muda a cor de fundo de um parágrafo específico
document.querySelector("p#paragrafo").style.backgroundColor = "lightgreen";

// Muda a cor de fundo do primeiro parágrafo
var paragrafo = document.querySelector("p").style;
paragrafo.backgroundColor = "red";

// Função para exibir alerta ao clicar no botão
function alertaDeClique() {
    alert("Você clicou no botão");
}

// Função para realizar o cálculo
function calcular() {
    // Obtém os valores dos inputs
    var n1 = document.getElementById("numero1").value;
    var n2 = document.getElementById("numero2").value;

    // Converte para número
    n1 = Number.parseInt(n1);
    n2 = Number.parseInt(n2);

    // Valida se os números são válidos
    if (isNaN(n1) || isNaN(n2)) {
        document.getElementById("resultado").innerHTML = "Por favor, insira números válidos!";
        return;
    }

    // Realiza o cálculo e exibe o resultado
    var resultado = n1 + n2;
    document.getElementById("resultado").innerHTML = "Resultado: " + resultado;
}
