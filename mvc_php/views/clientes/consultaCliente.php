<h1>Clientes cadastrados</h1>

<table class="produtos">
    <tr>
        <th>Nome:</th>
        <th>Email:</th>
        <th>Senha:</th>
    </tr>
    <?php
        foreach($dados as $dado){
            extract($dado);
            echo "<tr>";
                echo "<td>$nomeCliente</td>";
                echo "<td>$emailCliente</td>";
                echo "<td>$senhaCliente</td>";
            echo "</tr>";
        }
    ?>
</table>