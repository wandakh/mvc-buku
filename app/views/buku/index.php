<?php
/** @var array $buku */
/** @var array|null $flash */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Buku</h2>

        <?php require __DIR__ . '/../partials/flash.php'; ?>

        <a href="index.php?page=buku&action=create" class="btn btn-primary">Tambah Buku</a>

        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($buku)): ?>
                    <tr><td colspan="7" class="empty">Belum ada data buku.</td></tr>
                <?php endif; ?>
                <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?= htmlspecialchars($b['isbn']) ?></td>
                        <td><?= htmlspecialchars($b['judul']) ?></td>
                        <td><?= htmlspecialchars($b['penulis']) ?></td>
                        <td><?= htmlspecialchars($b['penerbit']) ?></td>
                        <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                        <td><?= htmlspecialchars($b['stok']) ?></td>
                        <td>
                            <a href="index.php?page=buku&action=edit&id=<?= (int) $b['id'] ?>" class="btn">Edit</a>
                            <form method="post"
                                  action="index.php?page=buku&action=delete"
                                  class="inline"
                                  onsubmit="return confirm('Hapus data buku ini?')">
                                <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
