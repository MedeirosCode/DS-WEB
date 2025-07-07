<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'mvc_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Inserção de feedback
$mensagem = null;
$tipo = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['feedback'] ?? '';

    if (!empty(trim($texto))) {
        $stmt = $pdo->prepare("INSERT INTO feedback (textFeedback) VALUES (:texto)");
        $stmt->bindParam(':texto', $texto);
        $stmt->execute();
        $mensagem = "Feedback enviado com sucesso!";
        $tipo = "success";
    } else {
        $mensagem = "Por favor, insira um feedback antes de enviar.";
        $tipo = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background:#f0f4f3; font-family:sans-serif;">

<?php if ($mensagem): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '<?= $tipo ?>',
            title: '<?= $tipo === "success" ? "Sucesso!" : "Atenção!" ?>',
            text: '<?= addslashes($mensagem) ?>',
            confirmButtonColor: '#2e7d32',
            background: '#f9fff9',
            iconColor: '<?= $tipo === "success" ? "#2e7d32" : "#fbc02d" ?>',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    });
</script>
<?php endif; ?>

<form method="POST" style="background:#ffffff; padding:30px; max-width:600px; margin:40px auto; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.05);">
    <h2 style="text-align:center; color:#2e7d32; margin-bottom:20px;">Envie seu Feedback</h2>
    <textarea name="feedback" placeholder="Escreva seu feedback aqui..." required style="width:100%; height:120px; padding:12px; border:1px solid #a5d6a7; border-radius:6px; resize:vertical; font-size:1rem; background-color:#f9fff9;"></textarea>
    <button type="submit" style="display:block; width:100%; background-color:#43a047; color:white; padding:12px; font-size:1rem; border:none; border-radius:6px; margin-top:15px; cursor:pointer; transition:background-color 0.3s ease;">Enviar</button>
</form>

</body>
</html>
