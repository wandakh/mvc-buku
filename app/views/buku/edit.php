<?php
/** @var array $buku */
/** @var array|null $flash */
$values      = $buku;
$action      = 'index.php?page=buku&action=update';
$submitLabel = 'Update';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <?php require __DIR__ . '/../partials/flash.php'; ?>
        <?php require __DIR__ . '/_form.php'; ?>
    </div>
</body>
</html>
