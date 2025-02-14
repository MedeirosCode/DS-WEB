// Definindo variáveis
let idade = 25;
let temCarteira = true;
let temMultas = false;

// Usando operador lógico AND (&&)
if (idade >= 18 && temCarteira) {
  console.log("Pode dirigir.");
} else {
  console.log("Não pode dirigir.");
}

// Usando operador lógico OR (||)
if (temCarteira || idade >= 18) {
  console.log("Pode iniciar o processo de habilitação.");
} else {
  console.log("Ainda não tem idade para a habilitação.");
}

// Usando operador lógico NOT (!)
if (!temMultas) {
  console.log("Condutor sem multas.");
} else {
  console.log("Condutor com multas.");
}

// Exemplo mais complexo combinando operadores
if ((idade >= 18 && temCarteira) && !temMultas) {
  console.log("Condutor habilitado e em situação regular.");
} else {
  console.log("Verifique se todos os requisitos estão atendidos.");
}
