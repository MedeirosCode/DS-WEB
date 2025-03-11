// Função para validação dos dados do Cliente
function validarDadosCliente() {
    let mensagemErro = "";
    let email = formulario.email.value;
    let observacao = formulario.observacao.value;

    if (formulario.nome.value.length < 3 || formulario.nome.value == "") {
        mensagemErro = "Verifique se o nome possui mais do que 3 caracteres.";
    } else if (email == "" || !email.includes("@") || !email.includes(".")) {
        mensagemErro = "Preencha o campo email corretamente! Deve conter um '@' e um domínio válido.";
    } else if (observacao.length > 1000) {
        mensagemErro = "A observação deve conter menos que 1000 palavras! Atualmente possui " + observacao.length + ".";
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
