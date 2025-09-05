// Definindo variáveis para comparação
let a = 10;
let b = 20;
let c = 10;

// Operadores relacionais
console.log("a =", a, "| b =", b, "| c =", c);
console.log("a == c:", a == c);  // Igual a
console.log("a != b:", a != b);  // Diferente de
console.log("a > b:", a > b);    // Maior que
console.log("b >= c:", b >= c);  // Maior ou igual a
console.log("a < b:", a < b);    // Menor que
console.log("c <= a:", c <= a);  // Menor ou igual a

// Comparação estrita (considera tipo)
let d = "10";
console.log("\nComparação estrita:");
console.log("a === d (valor e tipo):", a === d); // Falso, tipos diferentes
console.log("a !== d (valor e tipo):", a !== d); // Verdadeiro, tipos diferentes
