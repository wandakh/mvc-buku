<?php
/** @var array $old */
/** @var array|null $flash */
$values      = $old;
$action      = 'index.php?page=buku&action=store';
$submitLabel = 'Simpan';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Buku</h2>
        <?php require __DIR__ . '/../partials/flash.php'; ?>
        <?php require __DIR__ . '/form.php'; ?>
    </div>
</body>
</html>
