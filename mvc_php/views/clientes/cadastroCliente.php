<style>
    /* Corrige alinhamento do botão "OK" do SweetAlert */
    .swal2-popup .swal2-confirm {
        position: static !important;
        margin: auto !important;
        display: inline-block !important;
    }
</style>

<div>
    <h1>Cadastro de Clientes</h1>
    <form action="" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
        <label>Nome do Cliente:</label>
        <input type="text" name="nomeCliente" >
        <br>
        <label>Email do Cliente:</label>
        <input type="text" name="emailCliente" >
        <br>
        <label>Senha do Cliente:</label>
        <input type="text" name="senhaCliente">
        <br>
        <input value="Enviar" type="submit">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function validarDadosCliente() {
    const formulario = document.forms["formulario"];
    const nomeCliente = formulario.nomeCliente.value.trim();
    const emailCliente = formulario.emailCliente.value.trim();
    const senhaCliente = formulario.senhaCliente.value.trim();
    let mensagemErro = "";

    // Validação do nome
    if (nomeCliente.length < 3) {
        mensagemErro = "Verifique se o nome do cliente possui mais do que 3 caracteres.";
    }
    // Validação do e-mail com expressão regular simples
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailCliente)) {
        mensagemErro = "Preencha o campo email corretamente! O email deve conter '.' e '@'.";
    }
    // Validação da senha (mínimo de caracteres)
    else if (senhaCliente.length < 4) {
        mensagemErro = "A senha deve conter pelo menos 4 caracteres.";
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
    return true; // Permite o envio
}
</script>
