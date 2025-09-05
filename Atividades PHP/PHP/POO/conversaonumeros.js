// Variável numérica
let numero = 12345.6789;

// Usando typeof para verificar o tipo da variável
console.log("Tipo da variável 'numero':", typeof numero);

// Formatando o número para o formato monetário brasileiro
let formatoMonetario = numero.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
console.log("Formato monetário (Brasil):", formatoMonetario);

// Formatando com número fixo de casas decimais
let comDuasCasas = numero.toFixed(2);
console.log("Número com duas casas decimais:", comDuasCasas);

// Manipulando strings
let texto = "JavaScript é incrível!";
console.log("Texto original:", texto);

// Usando length
console.log("Tamanho do texto:", texto.length);

// Usando toUpperCase() e toLowerCase()
console.log("Texto em maiúsculas:", texto.toUpperCase());
console.log("Texto em minúsculas:", texto.toLowerCase());

// Usando replace para trocar uma palavra
let novoTexto = texto.replace("incrível", "poderoso");
console.log("Texto após substituição:", novoTexto);
