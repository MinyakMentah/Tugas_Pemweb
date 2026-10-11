<?php
    include 'koneksi-db.php';
    $title = 'Edit Murid';
    $active = 'dashboard';
    include 'includes/header.php';

    $id = $_GET['id'];

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM tb_murid WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $dataMurid = mysqli_stmt_get_result($stmt);
    $list = mysqli_fetch_array($dataMurid);
?>

<a href="index.php" class="text-sm text-slate-500 hover:text-blue-600 inline-flex items-center gap-1 mb-4">
    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
        <path d="M19 12H5M11 18l-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Kembali ke Dashboard
</a>

<?php if ($list): ?>
<div class="max-w-lg bg-white border border-slate-200 rounded-lg p-6">
    <h1 class="text-base font-semibold text-slate-900 mb-1">Edit Murid</h1>
    <p class="text-sm text-slate-500 mb-5">
        <span class="font-mono text-xs text-slate-400">MUR-<?= $list['id'] ?></span>
    </p>

    <form action="update.php" method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?= htmlspecialchars($list['id']) ?>">

        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required value="<?= htmlspecialchars($list['nama_lengkap']) ?>"
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">NIS</label>
            <input type="number" name="nis" required value="<?= htmlspecialchars($list['nis']) ?>"
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Alamat</label>
            <input type="text" name="alamat" required value="<?= htmlspecialchars($list['alamat']) ?>"
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-600 mb-1">Kelas</label>
            <input type="text" name="kelas" required value="<?= htmlspecialchars($list['kelas']) ?>"
                   class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
                class="w-full rounded-md bg-blue-600 text-white text-sm font-medium py-2 hover:bg-blue-700 active:scale-[0.98] transition">
            Simpan Perubahan
        </button>
    </form>
</div>
<?php else: ?>
<p class="text-slate-400">Data tidak ditemukan.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
