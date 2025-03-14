//Função para validação dos dados do Cliente
function validarDadosCliente() {
    let mensagemErro = "";
    let valor = formulario.valor.value;

    if (formulario.nome.value.length < 3 || formulario.nome.value == "") {
        mensagemErro = "Verifique se o nome possui mais do que 3 caracteres.";
    } else if (valor == "" || (!valor.includes(",") && !valor.includes(".")) || (valor.includes(",") && valor.includes("."))) {
        mensagemErro = "Preencha o campo valor corretamente! O valor deve conter apenas uma vírgula ou apenas um ponto.";
    } else if (formulario.codigo.value.length !== 12) {
        mensagemErro = "O código deve conter exatamente 12 caracteres! Atualmente possui " + formulario.codigo.value.length + ".";
    }

    if (mensagemErro !== "") {
        Swal.fire({
            icon: "error",
            title: "Erro na validação",
            text: mensagemErro,
            confirmButtonColor: "#ff5722",
        });

        return false;
    }

    return true;
}
