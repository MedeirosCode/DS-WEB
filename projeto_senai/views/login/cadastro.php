<form method="POST" action="/projeto_senai/cadastro" enctype="multipart/form-data">
    <label>Nome:
        <input type="text" name="nome" required>
    </label>

    <label>Email:
        <input type="email" name="email" required>
    </label>

    <label>Senha:
        <input type="password" name="senha" required>
    </label>

    <label>Foto de Perfil (opcional):
        <input type="file" name="foto">
    </label>

    <button type="submit">Cadastrar</button>
</form>
