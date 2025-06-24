<h1>Desaparecidos Cadastrados</h1>

<table class="produtos">
    <tr>
        <th>Nome:</th>
        <th>Email:</th>
        <th>Senha:</th>
        <th>Altura:</th>
        <th>Sexo:</th>
        <th>Data de Desaparecimento:</th>
        <th>Local de Desaparecimento:</th>
        <th>Caracteristicas:</th>
        <th>Raça:</th>
    </tr>
    <?php
        foreach($dados as $dado){
            extract($dado);
            echo "<tr>";
                echo "<td>$nomeCliente</td>";
                echo "<td>$emailCliente</td>";
                echo "<td>$senhaCliente</td>";
                echo "<td>$altura</td>";
                echo "<td>$sexo</td>";
                echo "<td>$data</td>";
                echo "<td>$local</td>";
                echo "<td>$caracteristicas</td>";
                echo "<td>$raca</td>";
                echo "<td><a href='cliente/$idCliente'><button>Acessar</button></a></td>";
                echo "<td><a href='cliente/excluir/$idCliente'><button>Excluir</button></a></td>";
            echo "</tr>";
        }
    ?>
</table>