<?php
session_start();
include 'connection.php';

// Verifica se o ID foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID inválido!'); window.location.href='dashboard.php';</script>";
    exit();
}

$id = $_GET['id'];

try {
    // Verifica se o administrador existe antes de excluir
    $stmt = $db->prepare("SELECT * FROM administrador WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo "<script>alert('Administrador não encontrado!'); window.location.href='dashboard.php';</script>";
        exit();
    }

    // Exclui o administrador do banco de dados
    $deleteStmt = $db->prepare("DELETE FROM administrador WHERE id = :id");
    $deleteStmt->bindParam(':id', $id);
    $deleteStmt->execute();

    echo "<script>
            alert('Administrador excluído com sucesso!');
            window.location.href='dashboard.php';
          </script>";
} catch (PDOException $e) {
    echo "<script>alert('Erro ao excluir: " . $e->getMessage() . "'); window.location.href='dashboard.php';</script>";
}
?>
