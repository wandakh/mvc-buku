<?php

class BukuController
{
    private const LIST_URL = 'index.php?page=buku';

    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku  = $this->model->getAll();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/buku/index.php';
    }

    public function create(): void
    {
        $old   = $this->pullOld();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/buku/create.php';
    }

    public function store(): void
    {
        $createUrl = self::LIST_URL . '&action=create';
        [$data, $error] = $this->validateInput($_POST);

        if ($error !== null) {
            $this->back($createUrl, $error, $_POST);
        }

        try {
            $this->model->insert($data);
        } catch (PDOException $e) {
            $this->back($createUrl, $this->dbErrorMessage($e), $_POST);
        }

        $this->flash('success', 'Data buku berhasil ditambahkan.');
        $this->redirect(self::LIST_URL);
    }

    public function edit(): void
    {
        $id   = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);

        if (!$buku) {
            $this->flash('error', 'Data buku tidak ditemukan.');
            $this->redirect(self::LIST_URL);
        }

        // Jika sebelumnya gagal validasi, tampilkan kembali input pengguna
        $buku  = array_merge($buku, $this->pullOld());
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/buku/edit.php';
    }

    public function update(): void
    {
        $id      = (int) ($_POST['id'] ?? 0);
        $editUrl = self::LIST_URL . '&action=edit&id=' . $id;
        [$data, $error] = $this->validateInput($_POST);

        if ($error !== null) {
            $this->back($editUrl, $error, $_POST);
        }

        try {
            $this->model->update($id, $data);
        } catch (PDOException $e) {
            $this->back($editUrl, $this->dbErrorMessage($e), $_POST);
        }

        $this->flash('success', 'Data buku berhasil diperbarui.');
        $this->redirect(self::LIST_URL);
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->flash('success', 'Data buku berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Data buku gagal dihapus. Silakan coba lagi.');
        }

        $this->redirect(self::LIST_URL);
    }

    /** Mengembalikan [data bersih, pesan error atau null]. */
    private function validateInput(array $input): array
    {
        $data = [
            'isbn'         => trim($input['isbn'] ?? ''),
            'judul'        => trim($input['judul'] ?? ''),
            'penulis'      => trim($input['penulis'] ?? ''),
            'penerbit'     => trim($input['penerbit'] ?? ''),
            'tahun_terbit' => trim($input['tahun_terbit'] ?? ''),
            'stok'         => trim($input['stok'] ?? ''),
        ];

        foreach ($data as $nilai) {
            if ($nilai === '') {
                return [$data, 'Semua field wajib diisi.'];
            }
        }

        if (!preg_match('/^[0-9-]{10,17}$/', $data['isbn'])) {
            return [$data, 'ISBN harus berupa angka (boleh memakai tanda hubung), 10-17 karakter.'];
        }

        $tahunMaks = (int) date('Y') + 1;
        if (!ctype_digit($data['tahun_terbit'])
            || (int) $data['tahun_terbit'] < 1000
            || (int) $data['tahun_terbit'] > $tahunMaks) {
            return [$data, "Tahun terbit harus berupa angka antara 1000 dan $tahunMaks."];
        }

        if (!ctype_digit($data['stok'])) {
            return [$data, 'Stok harus berupa angka bulat 0 atau lebih.'];
        }

        return [$data, null];
    }

    private function dbErrorMessage(PDOException $e): string
    {
        // Kode 1062 = duplicate entry (ISBN sudah ada)
        if (($e->errorInfo[1] ?? 0) === 1062) {
            return 'ISBN sudah terdaftar. Gunakan ISBN lain.';
        }
        return 'Terjadi kesalahan pada database. Silakan coba lagi.';
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }

    private function pullOld(): array
    {
        $old = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);
        return $old;
    }

    private function back(string $url, string $error, array $input): void
    {
        $this->flash('error', $error);
        $_SESSION['old'] = $input;
        $this->redirect($url);
    }

    private function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
