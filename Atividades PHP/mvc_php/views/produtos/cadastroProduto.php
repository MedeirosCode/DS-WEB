<style>
        /* Corrige alinhamento do botão "OK" do SweetAlert */
        .swal2-popup .swal2-confirm {
            position: static !important;
            margin: auto !important;
            display: inline-block !important;
        }
    </style>
<div>
    <h1>Cadastro de Produto</h1>
    <form action="" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
        <label>Nome do Produto:</label>
        <input type="text" name="nomeProduto" >
        <br>
        <label>Preço:</label>
        <input type="number" name="precoProduto" step="0.01" >
        <br>
        <label>Estoque:</label>
        <input type="text" name="estoqueProduto" >
        <br>
        <input type="submit" value="Enviar" >
    </form>
</div>
<script>
     
    function validarDadosCliente() {
    let formulario = document.forms["formulario"];
    let mensagemErro = "";
    let nomeProduto = formulario.nomeProduto.value.trim();
    let precoProduto = formulario.precoProduto.value.trim();
    let estoqueProduto = formulario.estoqueProduto.value.trim();
  

    if (nomeProduto.length < 3) {
        mensagemErro = "Verifique se o nome Produto possui mais do que 3 caracteres.";
    
    } else if (precoProduto === "" || (!precoProduto.includes(",") && !precoProduto.includes(".")) || (precoProduto.includes(",") && precoProduto.includes("."))) {
        mensagemErro = "Preencha o campo preco Produto corretamente! O precoProduto deve conter apenas uma vírgula ou um ponto.";
    
    } else {
        let valorConvertido = parseFloat(precoProduto.replace(",", "."));
        if (isNaN(valorConvertido) || valorConvertido < 0) {
            mensagemErro = "O preco Produto deve ser um número positivo.";
        }
    }

   
    if (mensagemErro === "") {
        let estoqueConvertido = parseInt(estoqueProduto);
        if (isNaN(estoqueConvertido) || estoqueConvertido < 0) {
            mensagemErro = "O estoque Produto deve ser um número inteiro positivo ou zero.";
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
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>