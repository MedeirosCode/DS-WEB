<h1>Produtos cadastrados</h1>

<table class="produtos">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $dado): ?>
            <tr>
                <td><?= $dado['nomeProduto'] ?></td>
                <td><?= $dado['precoProduto'] ?></td>
                <td><?= $dado['estoqueProduto'] ?></td>
                <td><a href="produto/<?= $dado['idProduto'] ?>"><button>Acessar</button></a></td>
                <td><a href="produto/excluir/<?= $dado['idProduto'] ?>"><button>Excluir</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="produto/cadastro"><button>Cadastrar produto</button></a>
