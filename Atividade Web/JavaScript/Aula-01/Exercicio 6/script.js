var C = parseFloat(prompt("Capital inicial (R$):"));
var i = parseFloat(prompt("Taxa de juros mensal (%):")) / 100;
var t = parseInt(prompt("Tempo do investimento (meses):"), 10);

var M = C * (1 + i) ** t;

alert("Montante acumulado: R$ " + M.toFixed(2));
