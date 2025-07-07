<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Projeto SENAI' ?></title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Seus outros CSS aqui -->
</head>
<body>
    <?php include $content; ?>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Exibir notificação se houver mensagem na sessão
    <?php if (isset($_SESSION['toast'])): ?>
        Swal.fire({
            icon: '<?= $_SESSION['toast']['type'] ?>',
            title: '<?= $_SESSION['toast']['title'] ?>',
            text: '<?= $_SESSION['toast']['message'] ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
        <?php unset($_SESSION['toast']); ?>
    <?php endif; ?>
    </script>
</body>
</html>