function alertaDeClique() {
    var n1 = document.getElementById("primeiro").value;
    var n2 = document.getElementById("segundo").value;
    var operacao = document.getElementById("operacao").value;
    var resultado = document.getElementById("resultado");
    var resultadoo;

    n1 = Number.parseFloat(n1);
    n2 = Number.parseFloat(n2);

    if (operacao === "1") {
        resultadoo = n1 + n2;
    } else if (operacao === "2") {
        resultadoo = n1 - n2;
    } else if (operacao === "3") {
        resultadoo = n1 * n2;
    } else if (operacao === "4") {
        if (n2 !== 0) {
            resultadoo = n1 / n2;
        } else {
            resultadoo = "Divisão por zero!";
        }
    } else {
        resultadoo = "Operação inválida";
    }

    resultado.innerHTML = `Resultado: ${resultadoo}`;
}
