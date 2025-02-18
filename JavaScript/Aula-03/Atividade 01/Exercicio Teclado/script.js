
const texto = document.getElementById('texto');
const resultado = document.getElementById('resultado');

texto.addEventListener('keypress', function(event) {
    resultado.innerHTML += `<p><strong>keypress:</strong> ${event.key}</p>`;
  });
