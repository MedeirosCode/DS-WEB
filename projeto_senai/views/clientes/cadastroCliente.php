<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <style>
        .swal2-popup .swal2-confirm {
            position: static !important;
            margin: auto !important;
            display: inline-block !important;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Clientes</h1>
    <form action="controllers\clientes.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
        <label>Nome do Cliente:</label>
        <input type="text" name="nomeCliente" required><br>

        <label>Email do Cliente:</label>
        <input type="text" name="emailCliente" required><br>

        <label>Senha do Cliente:</label>
        <input type="password" name="senhaCliente" required><br>

        <label>Altura do Cliente:</label>
        <input type="text" name="altura"><br>

        <label>Sexo do Cliente:</label>
        <select name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br>

        <label>Data de Desaparecimento:</label>
        <input type="date" name="data"><br>

        <label>Local de Desaparecimento:</label>
        <input type="text" name="localizacao"><br>

        <label>Característica do Cliente:</label>
        <input type="text" name="caracteristicas"><br>

        <label>Raça do Cliente:</label>
        <input type="text" name="raca"><br>

        <input value="Enviar" type="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function validarDadosCliente() {
        const formulario = document.forms["formulario"];
        const nomeCliente = formulario.nomeCliente.value.trim();
        const emailCliente = formulario.emailCliente.value.trim();
        const senhaCliente = formulario.senhaCliente.value.trim();
        let mensagemErro = "";

        if (nomeCliente.length < 3) {
            mensagemErro = "Verifique se o nome do cliente possui mais do que 3 caracteres.";
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailCliente)) {
            mensagemErro = "Preencha o campo email corretamente! O email deve conter '.' e '@'.";
        } else if (senhaCliente.length < 4) {
            mensagemErro = "A senha deve conter pelo menos 4 caracteres.";
        }

        if (mensagemErro !== "") {
            Swal.fire({
                icon: "error",
                title: "Erro na validação",
                text: mensagemErro,
                confirmButtonColor: "#ff5722"
            });
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
