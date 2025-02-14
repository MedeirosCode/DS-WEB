// Exemplo 1: Verificação de maioridade
let idade = 20;
let statusMaioridade = idade >= 18 ? "Maior de idade" : "Menor de idade";
console.log(statusMaioridade);

// Exemplo 2: Verificação de desconto
let clienteVip = true;
let desconto = clienteVip ? 20 : 5;
console.log(`Desconto aplicado: ${desconto}%`);

// Exemplo 3: Verificação se o número é par ou ímpar
let numero = 7;
let tipoNumero = numero % 2 === 0 ? "Par" : "Ímpar";
console.log(`O número ${numero} é ${tipoNumero}.`);

// Exemplo 4: Mensagem baseada em saldo
let saldo = 50;
let mensagemSaldo = saldo > 0 ? "Saldo positivo" : "Saldo negativo ou zerado";
console.log(mensagemSaldo);

// Exemplo 5: Ternário encadeado
let nota = 7.5;
let resultado = nota >= 7 ? "Aprovado" : nota >= 5 ? "Recuperação" : "Reprovado";
console.log(`Resultado: ${resultado}`);
