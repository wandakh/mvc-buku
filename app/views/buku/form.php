<?php
?>
<form method="post" action="<?= htmlspecialchars($action) ?>" class="form">
    <?php if (isset($values['id'])): ?>
        <input type="hidden" name="id" value="<?= (int) $values['id'] ?>">
    <?php endif; ?>

    <label for="isbn">ISBN</label>
    <input type="text" id="isbn" name="isbn" required
           value="<?= htmlspecialchars($values['isbn'] ?? '') ?>">

    <label for="judul">Judul</label>
    <input type="text" id="judul" name="judul" required maxlength="150"
           value="<?= htmlspecialchars($values['judul'] ?? '') ?>">

    <label for="penulis">Penulis</label>
    <input type="text" id="penulis" name="penulis" required maxlength="100"
           value="<?= htmlspecialchars($values['penulis'] ?? '') ?>">

    <label for="penerbit">Penerbit</label>
    <input type="text" id="penerbit" name="penerbit" required maxlength="100"
           value="<?= htmlspecialchars($values['penerbit'] ?? '') ?>">

    <label for="tahun_terbit">Tahun Terbit</label>
    <input type="number" id="tahun_terbit" name="tahun_terbit" required min="1000"
           value="<?= htmlspecialchars($values['tahun_terbit'] ?? '') ?>">

    <label for="stok">Stok</label>
    <input type="number" id="stok" name="stok" required min="0"
           value="<?= htmlspecialchars($values['stok'] ?? '') ?>">

    <div class="actions">
        <button type="submit" class="btn btn-primary"><?= htmlspecialchars($submitLabel) ?></button>
        <a href="index.php?page=buku" class="btn">Kembali</a>
    </div>
</form>
