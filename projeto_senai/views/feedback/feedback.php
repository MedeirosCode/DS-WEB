<?php
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
  <title>Deixe seu Feedback</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
      --bg-light: #f0f4f3;
      --bg-dark: #1e1e1e;
      --text-light: #2e7d32;
      --text-dark: #f1f1f1;
      --accent: #4caf50;
      --accent-dark: #388e3c;
    }

    body {
      background: var(--bg-light);
      color: var(--text-light);
      font-family: 'Segoe UI', sans-serif;
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode {
      background: var(--bg-dark);
      color: var(--text-dark);
    }

    .feedback-form {
      background: white;
      max-width: 600px;
      margin: 60px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: background 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .feedback-form {
      background: #2a2a2a;
    }

    .feedback-form h2 {
      text-align: center;
      color: var(--accent);
      margin-bottom: 20px;
    }

    .feedback-form textarea {
      width: 100%;
      height: 120px;
      padding: 12px;
      border: 1px solid #a5d6a7;
      border-radius: 8px;
      font-size: 1rem;
      background-color: #f9fff9;
      resize: vertical;
      color: inherit;
      transition: background 0.3s ease;
    }

    body.dark-mode .feedback-form textarea {
      background-color: #333;
      border-color: #66bb6a;
      color: #f1f1f1;
    }

    .feedback-form button {
      width: 100%;
      background-color: var(--accent);
      color: white;
      border: none;
      padding: 14px;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 15px;
    }

    .feedback-form button:hover {
      background-color: var(--accent-dark);
    }
  </style>
</head>
<body>

<?php if ($mensagem): ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: '<?= $tipo ?>',
      title: '<?= $tipo === "success" ? "Sucesso!" : "Atenção!" ?>',
      text: '<?= addslashes($mensagem) ?>',
      background: document.body.classList.contains('dark-mode') ? '#2a2a2a' : '#f9fff9',
      color: document.body.classList.contains('dark-mode') ? '#f1f1f1' : '#333',
      confirmButtonColor: '#2e7d32',
      iconColor: '<?= $tipo === "success" ? "#2e7d32" : "#fbc02d" ?>'
    });
  });
</script>
<?php endif; ?>

<form method="POST" class="feedback-form">
  <h2>Envie seu Feedback</h2>
  <textarea name="feedback" placeholder="Escreva seu feedback aqui..." required></textarea>
  <button type="submit">Enviar</button>
</form>

<script>
  window.onload = () => {
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark-mode');
    }
  };
</script>

</body>
</html>
