<h1>Clientes cadastrados</h1>

<table class="produtos">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
             <th colspan="2"></th>
        
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $dado): ?>
            <tr>
                <td><?= $dado['nomeCliente'] ?></td>
                <td><?= $dado['emailCliente'] ?></td>
                <td><?= $dado['senhaCliente'] ?></td>
                <td><a href="cliente/<?= $dado['idCliente'] ?>"><button>Acessar</button></a></td>
                <td><a href="cliente/excluir/<?= $dado['idCliente'] ?>"><button>Excluir</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="cliente/cadastro"><button>Cadastrar Cliente</button></a>
