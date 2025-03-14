// Função para validação dos dados do Cliente
function validarDadosCliente() {
    let formulario = document.forms["formulario"];
    let mensagemErro = "";
    let valor = formulario.valor.value.trim();

    if (formulario.nome.value.trim().length < 3) {
        mensagemErro = "Verifique se o nome possui mais do que 3 caracteres.";
    } else if (valor === "" || (!valor.includes(",") && !valor.includes(".")) || (valor.includes(",") && valor.includes("."))) {
        mensagemErro = "Preencha o campo valor corretamente! O valor deve conter apenas uma vírgula ou um ponto.";
    } else if (formulario.codigo.value.trim().length !== 12) {
        mensagemErro = "O código deve conter exatamente 12 caracteres! Atualmente possui " + formulario.codigo.value.trim().length + ".";
    }

    if (mensagemErro !== "") {
        Swal.fire({
            icon: "error",
            title: "Erro na validação",
            text: mensagemErro,
            confirmButtonColor: "#ff5722"
        });
        console.log("Erro encontrado:", mensagemErro);
        return false; // Impede o envio do formulário
    }

    console.log("Formulário enviado com sucesso");
    return true; // Permite o envio do formulário
}



//carrossel
/*
let currentIndex = 0; // Índice da imagem atual
const totalItems = document.querySelectorAll('.carousel-item').length; // Total de imagens

// Função para mover o carrossel
function moveSlide(index) {
    const carousel = document.querySelector('.carousel');
    currentIndex = index;

    // Mover o carrossel para a posição correta
    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;

    // Atualizar os indicadores
    updateIndicators();
}

// Função para atualizar os indicadores
function updateIndicators() {
    const indicators = document.querySelectorAll('.indicator');
    indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
            indicator.classList.add('active'); // Marcar o indicador ativo
        } else {
            indicator.classList.remove('active'); // Remover a classe 'active' dos outros
        }
    });
}

// Inicializa o carrossel com o primeiro indicador ativo
updateIndicators();
*/