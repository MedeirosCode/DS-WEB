<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<h1>Clientes cadastrados</h1>

<table class="produtos">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Altura</th>
            <th>Sexo</th>
            <th>Data de Desaparecimento</th>
            <th>Local de Desaparecimento</th>
            <th>Característica</th>
            <th>Raça</th>

            
             <th colspan="2"></th>
        
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $dado): ?>
            <tr>
                <td><?= $dado['nomeCliente'] ?></td>
                <td><?= $dado['emailCliente'] ?></td>
                <td><?= $dado['senhaCliente'] ?></td>
                <td><?= $dado['altura'] ?></td>
                <td><?= $dado['sexo'] ?></td>
                <td><?= $dado['data'] ?></td>
                <td><?= $dado['localizacao'] ?></td>
                <td><?= $dado['caracteristicas'] ?></td>
                <td><?= $dado['raca'] ?></td>

                <td><?= $dado['dataNascimento'] ?></td>
                <td><?= $dado['idadeAproximada'] ?></td>
                <td><?= $dado['dataDesaparecimento'] ?></td>
                <td><?= $dado['cidade'] ?></td>
                <td><?= $dado['estado'] ?></td>
                <td><?= $dado['pais'] ?></td>
                <td><?= $dado['ultimaRoupaVista'] ?></td>
                <td><?= $dado['nomeResponsavel'] ?></td>
                <td><?= $dado['telefoneResponsavel'] ?></td>
                <td><?= $dado['parentescoResponsavel'] ?></td>
                <td><?= $dado['observacao'] ?></td>
                
                <td><a href="cliente/<?= $dado['idCliente'] ?>"><button>Acessar</button></a></td>
                <td><a href="cliente/excluir/<?= $dado['idCliente'] ?>"><button>Excluir</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="cliente/cadastro"><button>Cadastrar Cliente</button></a>
