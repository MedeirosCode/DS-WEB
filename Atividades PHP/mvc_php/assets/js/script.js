// Função para validação dos dados do Cliente
function validarDadosCliente() {
    let formulario = document.forms["formulario"];
    let mensagemErro = "";
    let nomeProduto = formulario.nomeProduto.value.trim();
    let precoProduto = formulario.precoProduto.value.trim();
    let estoqueProduto = formulario.estoqueProduto.value.trim();
  

    if (nomeProduto.length < 3) {
        mensagemErro = "Verifique se o nomeProduto possui mais do que 3 caracteres.";
    
    } else if (precoProduto === "" || (!precoProduto.includes(",") && !precoProduto.includes(".")) || (precoProduto.includes(",") && precoProduto.includes("."))) {
        mensagemErro = "Preencha o campo precoProduto corretamente! O precoProduto deve conter apenas uma vírgula ou um ponto.";
    
    } else {
        let valorConvertido = parseFloat(precoProduto.replace(",", "."));
        if (isNaN(valorConvertido) || valorConvertido < 0) {
            mensagemErro = "O precoProduto deve ser um número positivo.";
        }
    }

   
    if (mensagemErro === "") {
        let estoqueConvertido = parseInt(estoqueProduto);
        if (isNaN(estoqueConvertido) || estoqueConvertido < 0) {
            mensagemErro = "O estoqueProduto deve ser um número inteiro positivo ou zero.";
        }
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