function calcular(){
    var n1 = document.getElementById("numero1").value;
    var n2 = document.getElementById("numero2").value;

    n1 = Number.parseInt(n1);
    n2 = Number.parseInt(n2);

    var resultado = (n1/100) * n2;
    document.getElementById("resultado").innerHTML = "Resultado: " + resultado;
}