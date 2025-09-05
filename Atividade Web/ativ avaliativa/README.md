/* 1. Sistema de Login:
Tela de login funcional, com autenticação via banco de dados (tabela
de usuários) e armazenamento na session.


Redirecionamento para uma página inicial após login bem-sucedido.
Opção de logout.


Salvar dados do usuário nos Cookies.

2. CRUD (Create, Read, Update, Delete):
Usuários: Cadastro, listagem de usuários no sistema.
Produtos: Cadastro e listagem de produtos.

3. Banco de Dados:
Criar um banco de dados com tema de Floricultura.
Criar as tabelas necessárias no MySQL para armazenar as informações:
Tabela usuarios : ID, Nome, Email, Senha.
Tabela produtos : ID, Nome, Descrição, Preço.

1º Fiz essa parte do processo. Já criei esse banco de dados!


4. Estilização:
Adicionar classes ao HTML para aplicar estilos personalizados.
Utilizar CSS para criar um design agradável.*/

session_start();
   
            //Verifica se veio do Formulário
            if(isset($_POST['login'])){
                //Verifica se o login esta correto
                include_once('connection.php');
                $login = $_POST['medeiros'];
                $email = $_POST['medeiros@medeiros.com']
                $senha = $_POST['123'];
        
                $sql = "SELECT * FROM funcionario WHERE email = '$login' and senha = '$senha'";
                $resultado = mysqli_query($conexao, $sql);
        
                if(mysqli_num_rows($resultado) > 0) {
                    $linha = mysqli_fetch_assoc($resultado);
                    $_SESSION['login'] = $linha['medeiros'];
                    $_SESSION['login'] = $linha['medeiros@medeiros.com']
                    $_SESSION['senha'] = $linha['123'];
                }else{
                    $_SESSION['erro'] = "login ou senha inválida";
                }
            }
        
            if(isset($_SESSION['medeiros']) and isset($_SESSION['123']) and isset($_SESSION['medeiros@medeiros.com'])){
                echo '<br>';
                echo $_SESSION['login'];
                echo '<br>';
                echo $_SESSION['senha'];
                echo '<br><br>';
                echo $_SESSION['medeiros@medeiros.com'];
                echo '<br>';
                echo "<form action='cookie.php' method='POST'>
                        <input type='submit'>
                    </form>";
                echo '<a href="logout.php"><button>Logout</button></a>';
            }else{
                header('Location: index.php');
            }